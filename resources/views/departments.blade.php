@extends('layouts.app')

@section('content')

<h2>Departments</h2>

@if(session('success'))

    <p style="color: green;">
        {{ session('success') }}
    </p>

@endif

<a href="/departments/create">Add Department</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    @foreach($departments as $department)

    <tr>
        <td>{{ $department->id }}</td>
        <td>{{ $department->name }}</td>
        <td>{{ $department->description }}</td>

        <td>
            <a href="/departments/{{ $department->id }}/edit">Edit</a>

            <form action="/departments/{{ $department->id }}"
                  method="POST"
                  style="display:inline;"
                  onsubmit="return confirm('Are you sure you want to delete this department?');">

                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>

            </form>
        </td>

    </tr>

    @endforeach

</table>

@endsection