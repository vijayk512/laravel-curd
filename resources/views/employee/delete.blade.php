<form method="POST" action="/delete/{{ $employee->id }}" class="form-ajax">
    <div class="alert alert-success" style="display: none;"></div>
    <div class="alert alert-danger _error_message" style="display: none;"></div>
    <div class="modal-header">
        <label>Are you sure you want to delete <strong>{{ $employee->name_prefix }} {{ $employee->first_name }} {{ $employee->last_name }}</strong> employee information</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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