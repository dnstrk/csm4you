jQuery(document).ready(function($) {
    $('#appointmentForm').on('submit', function(e) {
        e.preventDefault();

        var orderInput = $('#orderInput').val();
        var doctorName = $('.card-mobile.selected input[name="doctor-name"]').val();
        var time = $('.select-time__item.selected input[name="time"]').val();
        var phone = $('#phone').val();
        var name = $('#name').val();
        var message = $('#message').val();

        if (!orderInput ) {
            alert('Нет даты.');
            return;
        }
		if (!doctorName ) {
            alert('Нет врача.');
            return;
        }
		if (!time ) {
            alert('Нет времени.');
            return;
        }
		if (!phone ) {
            alert('Нет телефона.');
            return;
        }
		if (!name ) {
            alert('Нет имени.');
            return;
        }

        $.ajax({
             url: my_ajax_object.ajaxurl,
            type: 'POST',
            data: {
                action: 'submit_appointment',
                orderInput: orderInput,
                doctorName: doctorName,
                time: time,
                phone: phone,
                name: name,
                message: message
            },
            success: function(response) {
                if (response.success) {
                    alert('Запрос успешно отправлен.');
                    location.reload();
                } else {
                    alert('Произошла ошибка. Попробуйте еще раз.');
                }
            }
        });
    });
});