$(document).ready(function() {
    feather.replace();

    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    if ($('.alert').css('display') === 'none') {
        $('.alert').fadeIn(1000).delay(2000).fadeOut(2000);
    }

    $('#modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var modal = $(this);

        modal.find('.modal-content').load(button.data('remote'));
    });

    $.initialize('.datetimepicker', function(){
        $(this).datetimepicker({
            step: 30,
            lang: 'en',
            todayButton: false,
            format: 'd/m/Y',
            maxDate: new Date(),
            maxTime: new Date(),
            disabledTimeIntervals: [
                [moment(), moment().hour(24).minutes(0).seconds(0)]
            ],
        });
    });

    $.initialize('.datetimepicker2', function(){
        $(this).datetimepicker({
            step: 30,
            lang: 'en',
            todayButton: false,
            format: 'd/m/Y',
        });
    });

    $(document).on("click", "a.deleteText", function() {
        if (confirm('Are you sure ?')) {
            $(this).prev('span.text').remove();
        }
    });

});

$(document).on('submit','form.form-ajax', function(e) {
    e.preventDefault();
    $('input').removeClass('is-invalid');
    $('.text-danger').html('');

    $subButton = $(this).find(':submit');
    $subButton.prop('disabled', true);

    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: 'json'
    }).done(function(data) {
        // Success
        $subButton.prop('disabled', false);
        callback(data);
    }).fail(function (xhr, json) {
        var data = JSON.parse(xhr.responseText); //xhr.responseJSON
        var html = '';
        $subButton.prop('disabled', false);
        $.each(data.errors, function(key, value) {
            console.log(key);
            console.log(value);
            if(key == '_error_message'){
                $('._error_message').html(value).fadeIn();
            }else {
                $('input[name=' + key + '], select[name=' + key + ']').addClass('is-invalid');
                $('input[name=' + key + '], select[name=' + key + ']').parent().find('.text-danger').html(value);
            }

        });
    });

    return false;
});
