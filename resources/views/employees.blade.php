@extends('layouts.app')

@section('content')

<h2>Employees</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('employees.create') }}">Add Employee</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Department</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>

    @foreach($employees as $employee)

    <tr>

        <td>{{ $employee->id }}</td>

        <td>{{ $employee->department->name }}</td>

        <td>{{ $employee->name }}</td>

        <td>{{ $employee->email }}</td>

        <td>{{ $employee->salary }}</td>

        <td>

            <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>

            <form action="{{ route('employees.destroy', $employee->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection