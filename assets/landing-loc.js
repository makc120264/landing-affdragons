document.addEventListener("click", function (event) {
    clickid = generateClickID(event.clientX, event.clientY);
});

$(document).ready(function () {
    const inputTel = document.getElementById("tel");
    const inputPin = document.getElementById("pin");

    inputPin.addEventListener("change", function() {
        $('#fpin .form-submit').css('background-color', '#0d6efd');
        $('#fpin button').css('color', '#ffffff');
    });

    inputTel.addEventListener("change", function() {
        $('#fnum .form-submit').css('background-color', '#0d6efd');
        $('#fnum button').css('color', '#ffffff');
    });

    $("#btn-st1").click(function () {
        let formData = {};
        $.each($("#fnum").serializeArray(), function (_, field) {
            formData[field.name] = field.value;
        });

        var data = formData.token;
        var userUA = navigator.userAgent;
        var userIp = "";
        var phone = formData.msisdn;
        var clickId = clickid;

        const params_1 = "&method=sendOtp&operator=etisalat&pid=1190&offer_id=15976&userIP=" + userIp;
        const params = "clickid=" + clickId + "&msisdn=" + phone + params_1 + "&userUA=" + userUA + "&data=" + data;

        const apiUrl = location.origin + "/app/papi.php?" + params;

        if (formData.msisdn === '' || validatePhoneNumber(formData.msisdn)) {
            $('.blok1 .text-error').css('display', 'block');
        }

        $.ajax({
            url: apiUrl,
            type: 'GET',
            success: function (data) {
                let result = JSON.parse(data);
                if (result.response == 'error') {
                    $('.blok1 .text-error').text('Error(s): ' + result.message);
                    $('.blok1 .text-error').css('display', 'block');
                } else {
                    $('.blok1').css('display', 'none');
                    $('.blok2').css('display', 'block');
                }
            }
        });
    });
});

function generateClickID(x, y) {
    return `click_${x}_${y}_${Date.now()}`;
}

function validatePhoneNumber(phone) {
    const regex = /^\+971[0-9]{9}$/;
    return regex.test(phone);
}
