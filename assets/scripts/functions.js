var accountsFunc = {
    AddFormData: function () {
        jQuery(".submit-form-data").on('click', function (e) {
            e.preventDefault();
            jQuery(".res-success").addClass("fancytree-helper-hidden");
            var _loader = '<i class="fa fa-refresh ajax-loader text-white fa-spin"></i>',
                _this = jQuery(this),
                _btn = _this,
                _redirectURL = _this.attr('data-redirect'),
                _formName = _this.attr('data-form-name'),
                _routeName = _this.attr('data-route'),
                formData = new FormData(jQuery(`#${_formName}`)[0]),
                URL = jQuery(`#${_routeName}`).val();

            jQuery.ajax({
                type: "POST",
                url: URL,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                datatype: "json",
                beforeSend: function () {
                    //_btn.prop("disabled", true);
                    _btn.after(_loader);
                },
                success: function (msg) {
                    jQuery(".ajax-loader").remove();
                    if (msg.error != undefined) {
                        var i, text = "";
                        for (i = 0; i < msg.error.length; i++) {
                            text += msg.error[i] + "<br>";
                        }
                        jQuery(".error-validation").removeClass("fancytree-helper-hidden");
                        jQuery(".error-validation span").html(text);
                        jQuery('html, body').animate({
                            scrollTop: jQuery(".error-validation").offset().top
                        }, 500);
                        setTimeout(function () {
                            jQuery(".error-validation").addClass("fancytree-helper-hidden");
                        }, 9000);
                        //_btn.prop("disabled", false);
                    } else if (msg.success != undefined) {
                        jQuery(".res-success").removeClass("fancytree-helper-hidden");
                        jQuery(".res-success span").text(msg.success);
                        jQuery('html, body').animate({
                            scrollTop: jQuery(".error-validation").offset().top
                        }, 500);
                        setTimeout(function () {
                            jQuery(".res-success").addClass("fancytree-helper-hidden");
                            jQuery(`form#${_formName}`)[0].reset();
                            if (_redirectURL != undefined) {
                                window.location.href = _redirectURL
                            }
                        }, 9000);
                    }
                },
            });
        });
    }
}

jQuery(document).ready(function () {
    accountsFunc.AddFormData();
    jQuery('input').attr('autocomplete', 'off')
})