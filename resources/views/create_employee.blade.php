@extends('layouts.app')

@section('content')

<h2>Add Employee</h2>

<div id="successMessage" style="color:green;"></div>
<div id="errorMessage" style="color:red;"></div>

<form id="employeeForm" action="{{ route('employees.store') }}" method="POST">

    @csrf

    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary"><br><br>

    <label>Department:</label><br>

    <select name="department_id">
        <option value="">Select Department</option>

        @foreach($departments as $department)
            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Save Employee</button>

</form>

@endsection

@push('scripts')

<script>

$(document).ready(function () {

    $('#employeeForm').submit(function (e) {

        e.preventDefault();

        $('#successMessage').html('');
        $('#errorMessage').html('');

        $.ajax({

            url: "{{ route('employees.store') }}",
            type: "POST",
            data: $(this).serialize(),
contentType: false,
                processData: false,
            success: function (response) {

                $('#successMessage').html(response.success);

                $('#employeeForm')[0].reset();

            },

            error: function (xhr) {

                let errorText = '';

                if (xhr.responseJSON && xhr.responseJSON.errors) {

                    $.each(xhr.responseJSON.errors, function (key, value) {

                        errorText += value[0] + "<br>";

                    });

                } else {

                    errorText = "Something went wrong.";

                }

                $('#errorMessage').html(errorText);

            }

        });

    });

});

</script>

@endpush