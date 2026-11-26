<?php

namespace App\Support;

use App\Enums\VerificationFrequency;
use App\Enums\VerificationOutcome;
use App\Enums\VerificationState;
use App\Models\SisatResult;
use Carbon\CarbonInterface;

/**
 * Cronograma de verificaciones de un sistema de control (literal 2.1.c), leído
 * del único registro del sistema:
 *
 *   results = [
 *     'system' => ['name' => …, 'frequency' => 3, 'start' => '2026-01'],
 *     'verifications' => [
 *       '2026-01' => ['date' => …, 'outcome' => 'conforming', 'findings' => …,
 *                     'document' => […]|null, 'at' => ISO8601, 'user_id' => …],
 *     ],
 *   ]
 *
 * Los meses van como 'Y-m'. Un mes está programado si es igual o posterior a
 * 'start' y la distancia en meses es múltiplo de la frecuencia.
 */
final class ControlSystemSchedule
{
    public function __construct(public readonly SisatResult $result) {}

    public function name(): string
    {
        return $this->result->results['system']['name'];
    }

    public function frequency(): VerificationFrequency
    {
        return VerificationFrequency::from($this->result->results['system']['frequency']);
    }

    public function start(): string
    {
        return $this->result->results['system']['start'];
    }

    public function isScheduled(string $month): bool
    {
        $distance = self::monthIndex($month) - self::monthIndex($this->start());

        return $distance >= 0 && $distance % $this->frequency()->value === 0;
    }

    /**
     * @return array{date: string, outcome: string, findings: ?string, document: ?array, at: string, user_id: ?int}|null
     */
    public function verification(string $month): ?array
    {
        return $this->result->results['verifications'][$month] ?? null;
    }

    public function state(string $month, ?CarbonInterface $today = null): VerificationState
    {
        if (! $this->isScheduled($month)) {
            return VerificationState::NONE;
        }

        if ($this->verification($month)) {
            return VerificationState::DONE;
        }

        $current = ($today ?? now())->format('Y-m');

        return match (true) {
            $month < $current => VerificationState::LATE,
            $month === $current => VerificationState::DUE,
            default => VerificationState::FUTURE,
        };
    }

    /**
     * Verificaciones exigibles y ejecutadas del año hasta hoy (indicador 2.1.c.1).
     * El mes en curso solo cuenta si ya se ejecutó: aún no está atrasado.
     *
     * @return array{executed: int, due: int}
     */
    public function compliance(int $year, ?CarbonInterface $today = null): array
    {
        $executed = 0;
        $due = 0;

        foreach (self::monthsOf($year) as $month) {
            $state = $this->state($month, $today);

            if ($state === VerificationState::DONE) {
                $executed++;
                $due++;
            } elseif ($state === VerificationState::LATE) {
                $due++;
            }
        }

        return ['executed' => $executed, 'due' => $due];
    }

    /**
     * Resultado de la verificación más reciente, de cualquier año.
     */
    public function latestOutcome(): ?VerificationOutcome
    {
        $verifications = $this->result->results['verifications'] ?? [];

        if ($verifications === []) {
            return null;
        }

        ksort($verifications);

        return VerificationOutcome::tryFrom(end($verifications)['outcome'] ?? '');
    }

    /**
     * @return list<string> Los 12 meses del año como 'Y-m'.
     */
    public static function monthsOf(int $year): array
    {
        return array_map(fn (int $month) => sprintf('%04d-%02d', $year, $month), range(1, 12));
    }

    private static function monthIndex(string $month): int
    {
        [$year, $number] = array_map('intval', explode('-', $month));

        return $year * 12 + $number - 1;
    }
}
