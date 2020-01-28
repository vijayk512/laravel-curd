<div class="modal-header">
    <h5 class="modal-title">Edit Employee Information | Employee ID #{{ $employee->emp_id }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="gender" class="col-form-label">Gender: </label>
            {{ $employee->gender=='M' ? 'Male': 'Female' }}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <label for="name_prefix" class="col-form-label">Name: </label>
            {{ $employee->name_prefix }} {{ $employee->first_name }} {{ $employee->middle_initial }} {{ $employee->last_name }}
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label for="email" class="col-form-label">E-mail Address</label>
         {{ $employee->email }}
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="father_name" class="col-form-label">Father Name: </label>
            {{ $employee->father_name }}
        </div>
        <div class="col-sm-12">
            <label for="mother_name" class="col-form-label">Mother Name: </label>
            {{ $employee->mother_name }}
        </div>
        <div class="col-sm-12">
            <label for="mother_maiden" class="col-form-label">Mother Maiden: </label>
            {{ $employee->mother_maiden }}
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="date_of_birth" class="col-form-label">Date oF Birth: </label>
            {{ $employee->date_of_birth }}
        </div>
        <div class="col-sm-6">
            <label for="date_of_joining" class="col-form-label">Date Of Joining: </label>
            {{ $employee->date_of_joining }}
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="salary" class="col-form-label">Salary (USD): $</label>
            {{ $employee->salary }}
        </div>
        <div class="col-sm-6">
            <label for="ssn" class="col-form-label">SSN: </label>
            {{ $employee->ssn }}
        </div>
        <div class="col-sm-6">
            <label for="phone_no" class="col-form-label">Phone No: </label>
            {{ $employee->phone_no }}
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="city" class="col-form-label">Address:</label><br>
            {{ $employee->city }}, {{ $employee->state }} -  {{ $employee->zip }}

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
