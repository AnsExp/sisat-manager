<?php

use App\Models\Employee;
use Livewire\Component;

new class extends Component {

    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return $this->view()->title($this->employee->first_name . ' ' . $this->employee->last_name);
    }
};