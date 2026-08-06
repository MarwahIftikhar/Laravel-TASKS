@extends('layouts.app')

@section('content')

<h2>Edit Employee</h2>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ $employee->name }}"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ $employee->email }}"><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary" value="{{ $employee->salary }}"><br><br>

    <label>Department:</label><br>

    <select name="department_id">

        @foreach($departments as $department)

            <option value="{{ $department->id }}"
                {{ $employee->department_id == $department->id ? 'selected' : '' }}>

                {{ $department->name }}

            </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">Update Employee</button>

</form>

@endsection