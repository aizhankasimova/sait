// var slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// function showSlides(n) {
//     var i;
//     var slides = document.getElementsByClassName("mySlides");

//     if (n > slides.length) {
//         slideIndex = 1
//     }
//     if (n < 1){
//         slideIndex=slides.length
//     }
//     for (i=0; i < slides.length; i++){
//         slides[i].style.display = "none";
//     }
//     slides[slideIndex-1].style.display = "block";
// }

// {
//     var popup = document.getElementById("myPopup");
//     popup.classList.toggle("show");
// }
// календарь
if ($('.zap').is(':visible')) {
    $.datepicker.regional['ru'] = {
        minDate: 0,
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        beforeShowDay: function (date) {
            var dayOfWeek = date.getDay();
            if (dayOfWeek == 0) {
                return [false];
            } else {
                return [true];
            }
        }
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $(document).ready(function () {
        $(".datepicker").datepicker({
            buttonText: "Выбрать дату" // "https://snipp.ru/demo/437/calendar.gif"
        });
    })
    //
}
// при выборе даты выводим время
const showTime = () => {
    $(document).off('change', '.datepicker').on('change', '.datepicker', function (e) {
        e.preventDefault();
        let th = $(this).closest('.form_feedback');
        let time = $(this).closest('.form_feedback').children('.time');
        $.ajax({
            url: 'vendor/components/time_masters.php',
            type: 'POST',
            data: th.serialize(),
            success: function (data) {
                $(time).html(data);
                $('.time').children('.enabled').first().prop('id', '');
                $(time).children('.enabled').first().prop('id', 'enabled_one');
            },
        })
    })
}
showTime();
//
// чекбокс услгуи
$('.service_check').click(function () {
    let nservice = $(this).children('.nservice');
    let serviceCheck = $(this).children('.serviceCheck');
    if ($(serviceCheck).is(':checked', true)) {
        $(nservice).prop('checked', true);
    } else {
        $(nservice).prop('checked', false);
    }
})
$('.service_check').mousedown(function () {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('active')
    }
})
//
// запись к мастеру

$(document).on('submit', '.form_feedback', function (e) {
    e.preventDefault();
    let th = $(this);
    let erconts = $(this).children('.erconts');
    $.ajax({
        url: 'vendor/action/carpet.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == 'err_dateerr_timeerr_serv') {
                $(erconts).html('Выберите услугу, дату и время')
            }
            if (data == 'err_timeerr_serv') {
                $(erconts).html('Выберите услугу и время')
            }
            if (data == 'err_serv') {
                $(erconts).html('Выберите услугу')
            }
            if (data == 'err_dateerr_time') {
                $(erconts).html('Выберите дату и время')
            }
            if (data == 'err_dateerr_serv') {
                $(erconts).html('Выберите дату и услугу')
            }
            if (data == 'err_time') {
                $(erconts).html('Выберите время')
            }
            if (data == 'err_date') {
                $(erconts).html('Выберите дату')
            }
            if (data == 'error') {
                $(erconts).html('На это время уже есть запись')
            }
            if (data == 'err_user') {
                $(erconts).html('Вы уже записаны на это число')
            }
            if (data == 'suc') {
                $(erconts).html('Вы записаны');
                setTimeout(function(){
                    window.location.href = 'zap.php?page=1';
                },800)
            }
            console.log(data)
        }
    })
})

// при выборе времени блок меняет класс
$(document).on('click', '.enabled', function (e) {
    e.preventDefault();
    $(this).parent().children().removeClass('active');
    $(this).addClass('active');
    let text = $(this).text();
    $(this).parent().parent().children('.time_input').val(text);
})
//
if($('.zap_teble').is(':visible')){

    const zap = () => {
        $.ajax({
            url: 'vendor/components/admin/zap.php',
            success:function(data){
                $('.zap_teble').html(data)
            }
        })
    }

    $(document).ready(function(){
        zap();
    })

    $(document).on('change', 'select', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let value = $(this).val();
        $.ajax({
            url: 'vendor/action/zap_upd.php',
            type: 'POST',
            data: {
                id: id,
                value: value,
            },
            success: function (data) {
                zap();
            },
        })
    })

    setInterval(() => zap(), 20000);

}

// показываем ответ админа

$('.add_rev').click(function () {
    let id = $(this).data('id');
    let rew = $('.answer_rew[data-id=' + id + ']');
    if ($(rew).is(':visible')) {
        $(rew).hide();
        $(this).val('Посмотреть ответ администратора');
    } else {
        $(rew).show();
        $(this).val('Скрыть');
    }
})