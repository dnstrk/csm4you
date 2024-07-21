jQuery(document).ready(function($) {
    var monthsContainers = {}; // Объект для хранения созданных контейнеров месяцев
    var currentMonth = new Date().toISOString().slice(0, 7); // Текущий месяц в формате YYYY-MM

    var monthsMap = {
        'Январь': 1,
        'Февраль': 2,
        'Март': 3,
        'Апрель': 4,
        'Май': 5,
        'Июнь': 6,
        'Июль': 7,
        'Август': 8,
        'Сентябрь': 9,
        'Октябрь': 10,
        'Ноябрь': 11,
        'Декабрь': 12
    };

    function showMonthContainer(yearMonth) {
        // Скрыть все контейнеры
        $('.time-slots-container').hide();
        // Показать контейнер для выбранного месяца
        $('#' + yearMonth).show();
    }

    function updateCurrentMonth() {
        // Получаем текущий год и месяц из заголовка календаря
        let headerText = $('.air-datepicker-nav--title').text().trim();
        let monthName = headerText.split(' ')[0];
        let year = new Date().getFullYear(); // Используем текущий год

        let month = monthsMap[monthName]; // Используем объект monthsMap для получения номера месяца

        if (month) {
            currentMonth = `${year}-${String(month).padStart(2, '0')}`;
            showMonthContainer(currentMonth);
        } else {
            console.error("Ошибка: не удалось определить месяц из заголовка календаря.");
        }
    }

    function createTimeSlotElement(dateStr, slotTimes) {
        let dateId = 'date-' + dateStr.replace(/-/g, '-'); // Создаем id для даты, заменяя дефисы на дефисы
        let timeSlotsHtml = '<div id="' + dateId + '">';
        timeSlotsHtml += '<h4>' + dateStr + '</h4>';
        for (let i = 8; i <= 18; i++) {
            let timeSlot = ('0' + i).slice(-2) + ':00';
            let checked = slotTimes && slotTimes.includes(timeSlot) ? 'checked' : '';
            timeSlotsHtml += '<label><input type="checkbox" name="time_slots[' + dateStr + '][]" value="' + timeSlot + '" ' + checked + '>' + timeSlot + '</label><br>';
        }
        timeSlotsHtml += '</div>';
        return timeSlotsHtml;
    }

    // Инициализация календаря
    new AirDatepicker('#doctor-schedule-calendar', {
        onSelect: function({formattedDate, date, inst}) {
            if (date) {
                let formattedDateStr = date.toISOString().split('T')[0]; // Преобразуем дату в строку формата YYYY-MM-DD
                let yearMonth = date.toISOString().slice(0, 7); // Получаем год и месяц в формате YYYY-MM
                let dateId = 'date-' + formattedDateStr.replace(/-/g, '-'); // Создаем id для даты

                // Если контейнер для месяца ещё не создан
                if (!monthsContainers[yearMonth]) {
                    let template = $('#month-template').html(); // Получаем HTML-шаблон для месяца
                    template = template.replace('month-id', yearMonth).replace('Month Year', date.toLocaleString('default', { month: 'long', year: 'numeric' })); // Заменяем placeholders
                    $('#months-container').append(template); // Добавляем шаблон в контейнер
                    monthsContainers[yearMonth] = true; // Помечаем контейнер как созданный
                }

                // Проверяем наличие блока для выбранной даты
                if ($('#' + dateId).length == 0) {
                    let timeSlotsHtml = createTimeSlotElement(formattedDateStr);
                    $('#' + yearMonth + ' .slots').append(timeSlotsHtml); // Добавляем слоты в контейнер месяца
                }

                // Показываем контейнер для выбранного месяца
                showMonthContainer(yearMonth);
            }
        }
    });

    // Обработчики для кнопок смены месяца в календаре
    $(document).on('click', '[data-action="prev"], [data-action="next"]', function() {
        setTimeout(updateCurrentMonth, 10); // Задержка для корректного обновления
    });

    // Загрузка сохраненных данных
    if (typeof savedTimeSlots === 'object') {
        $.each(savedTimeSlots, function(dateStr, slotTimes) {
            let date = new Date(dateStr);
            let yearMonth = date.toISOString().slice(0, 7); // Получаем год и месяц в формате YYYY-MM
            let dateId = 'date-' + dateStr.replace(/-/g, '-'); // Создаем id для даты

            // Если контейнер для месяца ещё не создан
            if (!monthsContainers[yearMonth]) {
                let template = $('#month-template').html(); // Получаем HTML-шаблон для месяца
                template = template.replace('month-id', yearMonth).replace('Month Year', date.toLocaleString('default', { month: 'long', year: 'numeric' })); // Заменяем placeholders
                $('#months-container').append(template); // Добавляем шаблон в контейнер
                monthsContainers[yearMonth] = true; // Помечаем контейнер как созданный
            }

            let timeSlotsHtml = createTimeSlotElement(dateStr, slotTimes);
            $('#' + yearMonth + ' .slots').append(timeSlotsHtml); // Добавляем слоты в контейнер месяца
        });

        // Показываем контейнер для текущего месяца
        showMonthContainer(currentMonth);
    }
});