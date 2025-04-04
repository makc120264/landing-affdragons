document.addEventListener("click", function (event) {
    clickid = generateClickID(event.clientX, event.clientY);
});

$(document).ready(function () {
    $("#btn-st1").click(function () {
        const fordragoproApiUrl = 'http://fordragopro.com/papi/Serpkcae';

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
        // const apiUrl = fordragoproApiUrl + "/" + params;

        if (validatePhoneNumber(phone)) {
            $('.blok1 .text-error').css('display', 'block');
        }

        $.ajax({
            url: apiUrl,
            type: 'GET',
            success: function (data) {
                let result = JSON.parse(data);
                if (result.response == 'error') {
                    $('.blok1 .text-error').text(result.message);
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
