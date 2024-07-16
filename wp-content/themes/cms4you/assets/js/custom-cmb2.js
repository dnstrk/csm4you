jQuery(document).ready(function($) {
    // Инициализация Air Datepicker для всех повторяемых полей с датами и временем
    function initAirDatepicker() {
        $('.cmb2-repeatable-group .cmb2-add-row-button').on('click', function() {
            setTimeout(function() {
                $('.cmb2-repeatable-group .cmb2-repeatable-field:last-child input[type="text"]').datepicker({
                    timepicker: true,
                    multipleDates: true,
                    multipleDatesSeparator: ', ',
                    dateFormat: 'yyyy-mm-dd',
                    timeFormat: 'hh:ii'
                });
            }, 100);
        });

        $('input[name^="custom_dates_times"]').datepicker({
            timepicker: true,
            multipleDates: true,
            multipleDatesSeparator: ', ',
            dateFormat: 'yyyy-mm-dd',
            timeFormat: 'hh:ii'
        });
    }

    initAirDatepicker();

    // Переинициализация после сортировки полей
    $(document).on('cmb2_add_row', function(event, instance) {
        initAirDatepicker();
    });
});