@extends('layouts.app')

@section('content')

<h2>Departments</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
    </tr>

    @foreach($departments as $department)
    <tr>
        <td>{{ $department->id }}</td>
        <td>{{ $department->name }}</td>
        <td>{{ $department->description }}</td>
    </tr>
    @endforeach

</table>

@endsection