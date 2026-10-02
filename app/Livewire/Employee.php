<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee as EmployeeModel;

class Employee extends Component
{
    public $employee_number = '';
    public $position = '';
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $hire_date = '';

    protected function rules()
    {
        return [
            'employee_number' => 'required|string|max:50|unique:employees,employee_number',
            'position' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|string|max:30',
            'hire_date' => 'required|date',
        ];
    }

    public function addEmployee()
    {
        $this->validate();

        EmployeeModel::create([
            'employee_number' => $this->employee_number,
            'position' => $this->position,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'hire_date' => $this->hire_date,
        ]);

        $this->reset([
            'employee_number',
            'position',
            'first_name',
            'last_name',
            'email',
            'phone',
            'hire_date',
        ]);

        session()->flash('message', 'Employee added successfully!');
    }

    public function editEmployee($id)
{
    $employee = EmployeeModel::findOrFail($id);

    $this->editingEmployeeId = $employee->id;
    $this->employee_number = $employee->employee_number;
    $this->first_name = $employee->first_name;
    $this->last_name = $employee->last_name;
    $this->email = $employee->email;
    $this->phone = $employee->phone;
    $this->position = $employee->position;

    $this->hire_date = $employee->hire_date
        ? $employee->hire_date->format('Y-m-d')
        : '';

    $this->resetValidation();
    $this->showModal = true;
}
    public function deleteEmployee($id)
    {
        EmployeeModel::findOrFail($id)->delete();

        session()->flash('message', 'Employee deleted successfully!');
    }

    public function render()
    {
        return view('livewire.employee', [
            'employees' => EmployeeModel::latest()->get(),
        ]);
    }
}