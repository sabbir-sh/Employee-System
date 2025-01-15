<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('backend.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0', // Validate salary
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'salary' => $request->salary, // Include salary
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:employees,email,' . $id, // Ignore the current employee's email
            'position' => 'string|max:255',
            'salary' => 'numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'salary' => $request->salary,
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
