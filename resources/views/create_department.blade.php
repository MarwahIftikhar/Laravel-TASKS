@extends('layouts.app')

@section('content')

<h2>Add Department</h2>

@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

<form id="departmentForm" action="{{ route('departments.store') }}" method="POST">

    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ old('description') }}</textarea><br><br>

    <button type="submit">Save Department</button>

</form>

@endsection