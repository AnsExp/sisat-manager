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
    $company = App\Models\Company::find(15);
    $totalActivities = 0;
@endphp

<h1>{{ $company->name }}</h1>
<p>{{ $company->ciiu->code }}</p>
<p>{{ $company->ciiu->level->label() }}</p>
<p>Empleados: {{ $company->employees()->count() }}</p>
<ul>
    @foreach (App\Models\SisatModule::all() as $module)
        <li>{{ $module->name }}</li>
        <ul>
            @foreach (App\Modules\ModuleChecker::activitiesForModule($company, $module) as $activity)
                <li>{{ $activity->name }}</li>
                @php
                    $totalActivities++;
                @endphp
            @endforeach
        </ul>
    @endforeach
</ul>