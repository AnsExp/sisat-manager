<?php

use App\Enums\Gender;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Workspace;
use Flux\Flux;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {

    public string $workspace;
    public string $position;
    public string $first_name = '';
    public string $second_first_name = '';
    public string $last_name = '';
    public string $second_last_name = '';
    public string $id_card = '';
    public string $email = '';
    public string $gender = '';
    public int $company_id;
    public int $workspace_id;
    public int $position_id;

    #[On('form-employee')]
    public function formPosition(int|null $employee_id = null, int $company_id, int $workspace_id, int $position_id)
    {
        $this->company_id = $company_id;
        $this->workspace_id = $workspace_id;
        $this->position_id = $position_id;
        $this->position = Position::find($position_id)->name;
        $this->workspace = Workspace::find($workspace_id)->name;
        Flux::modal('form-employee')->show();
    }

    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'second_first_name' => ['nullable', 'string', 'max:255'],
            'second_last_name' => ['nullable', 'string', 'max:255'],
            'id_card' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'gender' => ['nullable', Rule::enum(Gender::class)],
            'company_id' => ['required', 'exists:companies,id'],
            'workspace_id' => ['required', 'exists:workspaces,id'],
            'position_id' => ['required', 'exists:positions,id'],
        ];
    }

    public function submit()
    {
        Log::info(1);
        $validated = $this->validate();
        Log::info(2);
        Employee::create($validated);
        Log::info(3);
        Flux::modal('form-employee')->close();
    }
};