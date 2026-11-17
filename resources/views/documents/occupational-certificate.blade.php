@php
/**
* @var App\Models\Employee $employee
* @var App\Enums\ConclutionType $conclutionType
* @var string $conclutionDetails
* @var App\Enums\EvaluationType $evaluationType
* @var array $recommendations
*/
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
            font-size: 10pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 7pt 0;
        }

        th {
            background-color: rgb(150, 171, 190);
        }

        th,
        td {
            padding: 2pt 4pt;
            border: 4px rgb(204, 204, 204) solid;
        }

        td.accent {
            background-color: rgb(150, 190, 155);
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="6">
                    CERTIFICADO - EVALUACIÓN MÉDICA OCUPACIONAL
                </th>
            </tr>
            <tr>
                <th colspan="6">
                    A. DATOS DEL ESTABLECIMIENTO - DATOS DEL USUARIO
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="accent">INSTITUCIÓN DEL SISTEMA</td>
                <td class="accent">RUC</td>
                <td class="accent">CIIU</td>
                <td class="accent">ESTABLECIMIENTO /CENTRO DE TRABAJO</td>
                <td class="accent">NÚMERO DE FORMULARIO</td>
                <td class="accent">NÚMERO DE ARCHIVO</td>
            </tr>
            <tr>
                <td>{{ $employee->company->name }}</td>
                <td>{{ $employee->company->ruc }}</td>
                <td>H5210</td>
                <td>CONSULTORIO DE LA EMPRESA</td>
                <td>925850570</td>
                <td>VIBR570</td>
            </tr>
            <tr>
                <td class="accent">PRIMER APELLIDO</td>
                <td class="accent">SEGUNDO APELLIDO</td>
                <td class="accent">PRIMER NOMBRE</td>
                <td class="accent">SEGUNDO NOMBRE</td>
                <td class="accent">SEXO</td>
                <td class="accent">PUESTO DE TRABAJO</td>
            </tr>
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->second_first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->second_last_name }}</td>
                <td>{{ $employee->gender->label() }}</td>
                <td>{{ $employee->position->name }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th colspan="2">
                    B. DATOS GENERALES
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="accent">FECHA DE EMISIÓN:</td>
                <td>{{ now()->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <td class="accent">EVALUACIÓN:</td>
                <td>{{ $evaluationType->label() }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th colspan="2">
                    C. APTITUD MÉDICA PARA EL TRABAJO
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="accent">Después de la valoración médica ocupacional se certifica que la persona en mención,
                    es calificada como:</td>
                <td>{{ $conclutionType->label() }}</td>
            </tr>
            <tr>
                <td class="accent" colspan="2">DETALLE DE OBSERVACIONES:</td>
            </tr>
            <tr>
                <td colspan="2">{{ $conclutionDetails }}</td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>
                    D. RECOMENDACIONES/OBSERVACIONES
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recommendations as $recommendation)
            <tr>
                <td>
                    {{ $recommendation }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td class="accent">
                    Conestedocumentocertificoqueel trabajadorsehasometidoalaevaluaciónmédicarequeridapara(el
                    ingreso/laejecución/el reingresoyretiro)alpuestolaboralyselehainformado sobre los riesgos
                    relacionados con el trabajo emitiendo recomendaciones relacionadas con su estado de salud.
                </td>
            </tr>
            <tr>
                <td>
                    La presente certificación se expide con base en el formulario de Evaluación Ocupacional , el cual
                    tiene carácter de confidencial.
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th colspan="6">
                    E. DATOS DEL PROFESIONAL
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="accent">
                    NOMBRE Y APELLIDO
                </td>
                <td>
                    MARÍA GABRIELA REMACHE ABRIGO
                </td>
                <td class="accent">
                    CÓDIGO MÉDICO
                </td>
                <td>
                    1040-2022-2531433
                </td>
                <td class="accent">
                    FIRMA Y SELLO
                </td>
                <td style="width: 150px;">
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>
                    F. FIRMA DEL USUARIO
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>