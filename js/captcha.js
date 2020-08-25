grecaptcha.ready(function () {
    grecaptcha.execute('6LdAOMMZAAAAABRtXZeyv_dVx8HSvll52o-9tnCZ', { action: 'contact' }).then(function (token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });
});