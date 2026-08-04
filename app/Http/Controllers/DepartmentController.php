<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('departments', compact('departments'));
    }

    public function create()
    {
        return view('create_department');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Department::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/departments')
            ->with('success', 'Department added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $department = Department::find($id);

        return view('edit_department', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $department = Department::find($id);

        $department->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/departments')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(string $id)
    {
        $department = Department::find($id);

        $department->delete();

        return redirect('/departments')
            ->with('success', 'Department deleted successfully.');
    }
}