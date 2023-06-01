$('.form').submit(function (e) {
    e.preventDefault();
    let th = $(this);
    $.ajax({
        url: 'vendor/action/tic.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == '2{"result":"error","resultfile":null,"status":null}') {
                $("#erconts").html("Неверный email");
            }
            if (data == '3') {
                setTimeout(function () {
                    th.trigger('reset');
                    $("#erconts").html("Ваше сообщение успешно отправлено");
                }, 1000)
            }
            if (data == '{"result":"error","resultfile":null,"status":null}') {
                $("#erconts").html("Ошибка отправки");
            }
        },
    })
})