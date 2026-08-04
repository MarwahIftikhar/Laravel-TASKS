@extends('layouts.app')

@section('content')

<h2>Edit Department</h2>

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
    </ul>

@endif

<form action="/departments/{{ $department->id }}" method="POST">

    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ $department->name }}"><br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ $department->description }}</textarea><br><br>

    <button type="submit">Update Department</button>

</form>

@endsection