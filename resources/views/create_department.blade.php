@extends('layouts.app')

@section('content')

<h2>Add Department</h2>

<form action="/departments" method="POST">

    @csrf

    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">
        Save Department
    </button>

</form>

@endsection