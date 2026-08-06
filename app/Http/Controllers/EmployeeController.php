<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('department')->get();

        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('create_employee', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name'          => 'required',
            'email'         => 'required|email',
            'salary'        => 'required|numeric',
        ]);

        Employee::create([
            'department_id' => $request->department_id,
            'name'          => $request->name,
            'email'         => $request->email,
            'salary'        => $request->salary,
        ]);

        // AJAX Request
        if ($request->ajax()) {

            return response()->json([
                'success' => 'Employee added successfully.'
            ]);

        }

        // Normal Request
        return redirect()->route('employees.index')
                         ->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);

        $departments = Department::all();

        return view('edit_employee', compact('employee', 'departments'));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name'          => 'required',
            'email'         => 'required|email',
            'salary'        => 'required|numeric',
        ]);

        $employee = Employee::find($id);

        $employee->update([
            'department_id' => $request->department_id,
            'name'          => $request->name,
            'email'         => $request->email,
            'salary'        => $request->salary,
        ]);

        return redirect()->route('employees.index')
                         ->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Employee deleted successfully.');
    }
}