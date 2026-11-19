@php
    $employee = App\Models\Employee::find(1);
    $evaluationType = App\Enums\EvaluationType::REFOUND;
    $workAptituded = App\Enums\WorkAptitude::UNFIT;
    $code = 'SSO-MED-001';
    $numberCertificate = 1;
    $restrictions = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla officia repudiandae ea incidunt labore? Accusantium reprehenderit nam praesentium nulla. Obcaecati consectetur rerum ullam sit praesentium, beatae perspiciatis et soluta error?';
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
            font-size: 8.5pt;
        }

        th {
            background-color: #d7e3f6;
            text-align: left;
        }

        th.accent {
            color: white;
            background-color: #0d1c35;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20pt 0;
        }

        td,
        th {
            border: 1pt solid gray;
            padding: 5px 7px;
        }

        .note {
            font-size: 8pt;
            color: gray;
            font-style: italic;
        }

        div.checkbox {
            width: 8pt;
            height: 8pt;
            display: inline-block;
            border: 0.5pt solid gray;
        }

        div.checkbox.checked {
            background-color: #0d1c35
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td style="width: 25%; padding: 0;" rowspan="2">
                    <img src="{{ public_path('img/sisag-logo.jpeg') }}" alt="Logo SISAG S.A.S."
                        style="width:100%;">
                </td>
                <td style="width: 50%;" rowspan="2">
                    <p style="text-align: center; font-weight: bold;">
                        CERTIFICADO DE EVALUACIÓN MÉDICA OCUPACIONAL
                    </p>
                    <p style="text-align: center; font-size: 8pt; color: gray;">
                        SISTEMA DE INFORMACIÓN DE SALUD EN EL TRABAJO (SISAT) - MSP / SUT
                        Acuerdo Ministerial MSP-00004-2026 | Ref. Formulario HCU-081
                    </p>
                </td>
                <th style="width: 25%;">
                    Codigo: SSO-MED-{{ $numberCertificate }}<br>
                    Version: 01-2026
                </th>
            </tr>
            <tr>
                <th>
                    Fecha: {{ now()->format('d') }} / {{ now()->format('M') }} / {{ now()->format('Y') }}<br>
                    N Cert.: {{ $numberCertificate }}
                </th>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="accent" colspan="4">A. IDENTIFICACION DE LA EMPRESA Y DEL TRABAJADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Razon Social Empresa</th>
                <td colspan="3">SEGSA S.A.S. / {{ $employee->company->name }}</td>
            </tr>
            <tr>
                <th>RUC Empresa</th>
                <td>{{ $employee->company->ruc }}</td>
                <th>Codigo CIIU</th>
                <td>{{ $employee->company->ciiu->code }}</td>
            </tr>
            <tr>
                <th>Apellidos y Nombres</th>
                <td colspan="3">{{ $employee->display_name(true) }}</td>
            </tr>
            <tr>
                <th>Cedula / Pasaporte</th>
                <td>{{ $employee->id_card }}</td>
                <th>Edad / Sexo</th>
                <td>{{ $employee->gender->label() }}</td>
            </tr>
            <tr>
                <th>Puesto de Trabajo / Cargo</th>
                <td>{{ $employee->position->name }}</td>
                <th>Area / Proceso</th>
                <td>{{ $employee->workspace->name }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="accent" colspan="4">B. TIPO DE EVALUACIÓN MÉDICA OCUPACIONAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach (App\Enums\EvaluationType::cases() as $et)
                    <td>
                        <div @class(['checkbox', 'checked' => $et === $evaluationType])></div>
                        {{ $et->label() }}
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="accent" colspan="2">C. CONCEPTO DE APTITUD LABORAL (CUMPLIMIENTO SISAT / SUT)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" class="note">
                    Con base en la historia clínica ocupacional, examen físico integral y análisis de exámenes
                    paraclínicos correlacionados con el profesiograma y factores de riesgo del puesto de trabajo, se
                    certifica que el/la trabajador(a) se encuentra:
                </td>
            </tr>
            @foreach (App\Enums\WorkAptitude::cases() as $wa)
                <tr>
                    <td>
                        <div @class(['checkbox', 'checked' => $wa === $workAptituded])></div>
                        {{ $wa->label() }}
                    </td>
                    <td>
                        {{ $wa->description() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="accent">D. RESTRICCIONES LABORALES, RECOMENDACIONES Y VIGILANCIA DE LA SALUD</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="note">
                    Especificar restricciones operativas, ergonómicas, uso de EPP específico o periodicidad de control
                    médico (NO incluir diagnósticos CIE-10):
                </td>
            </tr>
            <tr>
                <td>
                    {{ $restrictions }}
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="2" class="accent">E. CERTIFICACIÓN DEL MÉDICO OCUPACIONAL Y CONFORMIDAD DEL TRABAJADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 50%;">
                    PROFESIONAL MÉDICO OCUPACIONAL (MSP / SENESCYT)
                </th>
                <th style="width: 50%;">
                    CONFORMIDAD Y RECEPCIÓN DEL TRABAJADOR
                </th>
            </tr>
            <tr>
                <td>
                    <p>Nombres y Apellidos: _____________________________</p>
                    <p>Registro SENESCYT (SSO): _____________________________</p>
                    <p>REGISTRO MCP / ACESS: _____________________________</p>
                    <div style="width: 100%; margin-top: 50px;">
                        <p
                            style="width: 240px; margin: 0 auto; border-top: 1pt solid #000; padding-top: 4px; text-align: center;">
                            Firma y Sello Médico Ocupacional
                        </p>
                    </div>
                </td>
                <td>
                    <p>Declaro haber sido informado(a) de los resultados de mi evaluación médica ocupacional, aptitud
                        laboral y recomendaciones emitidas.</p>
                    <div style="width: 100%; margin-top: 50px;">
                        <p
                            style="width: 240px; margin: 0 auto; border-top: 1pt solid #000; padding-top: 4px; text-align: center;">
                            Firma / Huella Digital del Trabajador<br>
                            C.I.: {{ $employee->id_card }}
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <p class="note">
        NOTA DE CONFIDENCIALIDAD LEGAL: De conformidad con la Ley Orgánica de Protección de Datos Personales y el
        Acuerdo Ministerial MSP-00004-2026, este certificado constituye el único documento entregable al empleador para
        el expediente de Talento Humano y SUT. La Historia Clínica Ocupacional completa y resultados paraclínicos
        permanecen bajo custodia exclusiva del Médico Ocupacional.
    </p>
</body>

</html>