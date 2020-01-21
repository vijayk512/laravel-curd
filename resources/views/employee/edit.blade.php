<form method="POST" action="/edit/{{ $employee->id }}" class="form-ajax">
    @csrf
    <div class="alert alert-success" style="display: none;"></div>
    <div class="alert alert-danger _error_message" style="display: none;"></div>
    <div class="modal-header">
        <h5 class="modal-title">Edit Employee Information | Employee ID #{{ $employee->emp_id }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="gender" class="col-form-label">Gender</label>
                <select name="gender" class="form-control" id="gender">
                    <option value="M" {{ old('gender', $employee->gender) == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('gender', $employee->gender) == 'F' ? 'selected' : '' }}>Female</option>
                </select>
                <small class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <label for="name_prefix" class="col-form-label">Name Prefix</label>
                <input type="text" name="name_prefix" class="form-control" id="name_prefix" value="{{ old('name_prefix', $employee->name_prefix) }}" />
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-3">
                <label for="first_name" class="col-form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name', $employee->first_name) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-3">
                <label for="middle_initial" class="col-form-label">Middle Initial</label>
                <input type="text" name="middle_initial" class="form-control" id="middle_initial" value="{{ old('middle_initial', $employee->middle_initial) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-3">
                <label for="last_name" class="col-form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name', $employee->last_name) }}"/>
                <small class="text-danger"></small>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label">E-mail Address</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $employee->email) }}" >
            <small class="text-danger"></small>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="father_name" class="col-form-label">Father Name</label>
                <input type="text" name="father_name" class="form-control" id="father_name" value="{{ old('father_name', $employee->father_name) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-4">
                <label for="mother_name" class="col-form-label">Mother Name</label>
                <input type="text" name="mother_name" class="form-control" id="mother_name" value="{{ old('mother_name', $employee->mother_name) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-4">
                <label for="mother_maiden" class="col-form-label">Mother Maiden</label>
                <input type="text" name="mother_maiden" class="form-control" id="mother_maiden" value="{{ old('mother_maiden', $employee->mother_maiden) }}"/>
                <small class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="date_of_birth" class="col-form-label">Date oF Birth</label>
                <input type="text" name="date_of_birth" class="form-control datetimepicker" id="date_of_birth"  readonly value="{{ old('date_of_birth', $employee->date_of_birth) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-6">
                <label for="date_of_joining" class="col-form-label">Date Of Joining</label>
                <input type="text" name="date_of_joining" class="form-control datetimepicker2" id="date_of_joining" readonly value="{{ old('date_of_joining', $employee->date_of_joining) }}"/>
                <small class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <label for="salary" class="col-form-label">Salary</label>
                <input type="number" name="salary" class="form-control" id="salary" value="{{ old('salary', $employee->salary) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-5">
                <label for="ssn" class="col-form-label">SSN</label>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="ssn_1" maxlength="3"  id="ssn-1" pattern="\d{3}" value="{{ explode('-', $employee->ssn)[0] }}"/>
                        <small class="text-danger"></small>

                    </div><label class="col-form-label">-</label>

                    <div class="col-sm-3">
                        <input type="text" name="ssn_2" class="form-control"  maxlength="2"  id="ssn-2" pattern="\d{2}" value="{{ explode('-', $employee->ssn)[1] }}"/>
                        <small class="text-danger"></small>

                    </div>
                    <label class="col-form-label">-</label>

                    <div class="col-sm-4">
                        <input type="text" name="ssn_3" class="form-control"  maxlength="3"  id="ssn-3" pattern="\d{3}" value="{{ explode('-', $employee->ssn)[2] }}"/>
                        <small class="text-danger"></small>

                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <label for="phone_no" class="col-form-label">Phone No</label>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" name="phone_no_1" class="form-control"  maxlength="3"  id="phone_no-1" pattern="\d{3}" value="{{ explode('-', $employee->phone_no)[0] }}">
                        <small class="text-danger"></small>

                    </div><label class="col-form-label">-</label>

                    <div class="col-sm-3">
                        <input type="text" name="phone_no_2" class="form-control"  maxlength="3"  id="phone_no-2" pattern="\d{3}" value="{{ explode('-', $employee->phone_no)[1] }}">
                        <small class="text-danger"></small>

                    </div>
                    <label class="col-form-label">-</label>

                    <div class="col-sm-4">
                        <input type="text" name="phone_no_3" class="form-control"  maxlength="4"  id="phone_no-3" pattern="\d{4}" value="{{ explode('-', $employee->phone_no)[2] }}">
                        <small class="text-danger"></small>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="city" class="col-form-label">City</label>
                <input type="text" name="city" class="form-control" id="city" value="{{ old('city', $employee->city) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-4">
                <label for="state" class="col-form-label">State</label>
                <input type="text" name="state" class="form-control" id="state" maxlength="2" pattern="\d{[A-Za-z]}" value="{{ old('state', $employee->state) }}"/>
                <small class="text-danger"></small>
            </div>
            <div class="col-sm-4">
                <label for="zip" class="col-form-label">Zip</label>
                <input type="text" name="zip" class="form-control" id="zip" maxlength="5"   pattern="\d{5}" value="{{ old('zip', $employee->zip) }}"/>
                <small class="text-danger"></small>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#" data-href="{{ $employee->id }}" id="delete-record" class="deleteText btn btn-danger">Delete record</a><br>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<script type="text/javascript">
    function callback(data) {
        $('.alert-success').html(data.message).fadeIn();
        setTimeout(function() {
            $('#modal').modal('hide');
            /* Need to do below since replacing modal-content */
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $('.data-table').DataTable().ajax.reload();
        }, 2000);

    }
</script>
