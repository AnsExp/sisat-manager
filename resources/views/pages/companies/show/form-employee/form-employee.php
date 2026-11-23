<?php

use App\Enums\Gender;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Workspace;
use Flux\Flux;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    public string $first_name = '';

    public string $second_first_name = '';

    public string $last_name = '';

    public string $second_last_name = '';

    public string $birthday = '';

    public string $id_card = '';

    public string $email = '';

    public string $gender = '';

    public int $workspace_id;

    public int $position_id;

    public string $maxBirthday;

    public Company $company;

    public Collection $workspaces;

    public Collection $positions;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->workspaces = $company->workspaces()->orderBy('name')->get();
        $this->positions = collect();

        $maxYear = now()->year - 18;
        $this->maxBirthday = Carbon::create($maxYear, 12, 31)->toDateString();
    }

    public function updatedWorkspaceId($value)
    {
        if ($value) {
            $this->positions = Workspace::find($value)->positions()->orderBy('name')->get();
            return;
        }
        $this->positions = collect();
    }

    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'second_first_name' => ['nullable', 'string', 'max:255'],
            'second_last_name' => ['nullable', 'string', 'max:255'],
            'id_card' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', "before_or_equal:{$this->maxBirthday}"],
            'email' => ['nullable', 'email', 'max:255'],
            'gender' => ['required', Rule::enum(Gender::class)],
            'workspace_id' => ['required', 'exists:workspaces,id'],
            'position_id' => ['required', 'exists:positions,id'],
        ];
    }

    public function submit()
    {
        $validated = $this->validate();
        $validated['company_id'] = $this->company->id;
        Employee::create($validated);
        Flux::modal('form-employee')->close();
    }
};
