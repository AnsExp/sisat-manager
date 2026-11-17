<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Nivel de riesgo</th>
            <th>Numero de empleados</th>
        </tr>
    </thead>
    <tbody>
        @foreach (App\Models\Company::all() as $company)
        <tr>
            <td>
                {{ $company->id }}
            </td>
            <td>
                {{ $company->name }}
            </td>
            <td>
                {{ $company->ciiu->level->label() }}
            </td>
            <td>
                {{ $company->employees()->count() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@php
    $company = App\Models\Company::find(2);
    $totalActivities = 0;
@endphp

<h1>{{ $company->name }}</h1>
<p>{{ $company->ciiu->code }}</p>
<p>{{ $company->ciiu->level->label() }}</p>
<p>Empleados: {{ $company->employees()->count() }}</p>
<ul style="list-style: none">
    @foreach (config('sisat') as $moduleCode => $module)
        <li>{{ $module['name'] }}</li>
        <ul>
            @foreach ($module['activities'] as $moduleActivity => $activity)
                @if(App\Modules\ModuleChecker::companyHasActivity($company, $moduleCode, $moduleActivity))
                    <li>{{ $activity['label']}}</li>
                    @php
                        $totalActivities++;
                    @endphp
                @endif
            @endforeach
        </ul>
    @endforeach
</ul>
<p>Total de actividades obligatorias: {{ $totalActivities }}</p>