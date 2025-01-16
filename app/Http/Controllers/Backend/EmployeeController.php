<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch employees in descending order of creation date
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return view('backend.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('backend.employee.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:employees',
            'position' => 'required|string',
            'salary' => 'required|numeric',
            'department' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Handle file upload if an image is provided
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $imageName); // Save in the public/images directory
        } else {
            $imageName = null; // If no image, set it to null
        }

        // Create the employee record
        Employee::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'position' => $validatedData['position'],
            'salary' => $validatedData['salary'],
            'department' => $validatedData['department'],
            'profile_picture' => $imageName, // Save the image name
        ]);

        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:employees,email,' . $id,
            'position' => 'string|max:255',
            'salary' => 'numeric',
            'department' => 'string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Find the employee to update
        $employee = Employee::findOrFail($id);

        // Handle file upload if an image is provided
        if ($request->hasFile('profile_picture')) {
            // Delete the old image if it exists
            if ($employee->profile_picture && file_exists(public_path('images/' . $employee->profile_picture))) {
                unlink(public_path('images/' . $employee->profile_picture)); // Delete the old image
            }

            // Generate a new file name for the new image
            $imageName = time() . '.' . $request->profile_picture->extension();

            // Move the new image to the public/images directory
            $request->profile_picture->move(public_path('images'), $imageName);
        } else {
            $imageName = $employee->profile_picture; // Keep the old image if no new image is uploaded
        }

        // Update the employee record with the validated data
        $employee->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'position' => $validatedData['position'],
            'salary' => $validatedData['salary'],
            'department' => $validatedData['department'],
            'profile_picture' => $imageName, // Save the new image name
        ]);

        // Redirect to the employee index page with a success message
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully!');
    }



    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
