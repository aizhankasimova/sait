// registration
const erConts = document.querySelectorAll('#erconts');
$('.form_reg > form').submit(function (reg) {
    reg.preventDefault();
    let th = $(this);
    $.ajax({
        url: 'vendor/action/reg.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == '1') {
                $(erConts).html("Такая почта уже существует");
            }
            if (data == '2') {
                $(erConts).html("Такой номер телефона уже существует");
            }
            if (data == '12') {
                $(erConts).html("Такая почта и номер телефона уже существуют");
            }
            if (data == '3') {
                th.trigger('reset');
                $(erConts).html("Аккаунт создан");
                setTimeout(function () {
                window.location.href = 'index.php';
                },3000)
            }
        },
    })
}); 
// end registration

// Authorization

$(".form_autorization").submit(function(login){
    login.preventDefault();
    let logPass = $(this);
    $.ajax({
        url: 'vendor/action/login.php',
        type: 'POST',
        data: logPass.serialize(),
        success: function(data){
            if (data == '1') {
                $("#errLog").html("Неверные данные");
            }
            if (data == '3') {
                window.location.href = 'index.php';
            }
            if (data == '4') {
                $("#errLog").html("Ваш аккаун заблокирован");
            }
        },
    })
});
// end Authorization

//переключение форм авторизации/регистрации
if(document.querySelector('.form_autorization')){
    function show_hide(){
        const buttonLogOne = document.querySelector('#login_button_one');
        const buttonRegOne = document.querySelector('#reg_button_one');

        const buttonLogTwo = document.querySelector('#login_button_two');
        const buttonRegTwo = document.querySelector('#reg_button_two');

        const login_form = document.querySelector('.login_form');
        const registration_form = document.querySelector('.registration_form');


        buttonLogOne.addEventListener('click', function(){
            login_form.style.display = "block";
            registration_form.style.display = "none";
        });
        buttonRegOne.addEventListener('click', function(){
            login_form.style.display = "none";
            buttonLogTwo.style.fontWeight = "350";
            buttonLogTwo.style.boxShadow = "none";
            buttonRegTwo.style.fontWeight = "400";
            buttonRegTwo.style.boxShadow = "0px 2px 0px #BB8C5F";
            registration_form.style.display = "flex";
        });

        buttonLogTwo.addEventListener('click', function(){
            login_form.style.display = "block";
            registration_form.style.display = "none";
        });
        buttonRegTwo.addEventListener('click', function(){
            login_form.style.display = "none";
            registration_form.style.display = "flex";
        });
    }
    show_hide()
}