jQuery(document).ready(function($) {
    $('#appointmentForm').on('submit', function(e) {
        e.preventDefault();

        var orderInput = $('#orderInput').val();
        var doctorName = $('.card-mobile.selected input[name="doctor-name"]').val();
        var time = $('.select-time__item.selected input[name="time"]').val();
        var phone = $('#phone').val();
        var name = $('#name').val();
        var message = $('#message').val();

        if (!orderInput || !doctorName || !time || !phone || !name) {
            alert('Пожалуйста, заполните все поля.');
            return;
        }

        $.ajax({
            url: ajaxurl,
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