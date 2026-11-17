<?php

use App\Models\Employee;
use Livewire\Component;

new class extends Component {
    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }
};