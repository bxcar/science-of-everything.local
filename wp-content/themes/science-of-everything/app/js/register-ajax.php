<script>
    jQuery(document).ready(function () {
        // this is the id of the form

        jQuery("#register-popup-form").submit(function (e) {

            jQuery("#submit-register-popup-form").html("").css(
                {
                    "background-image": "url(<?= get_template_directory_uri()?>/app/img/loader-form.gif)",
                    "background-size": "15%",
                    "background-repeat": "no-repeat",
                    "background-position-y": "50%",
                    "background-position-x": "50%"
                }
            );
            var url = "<?= get_template_directory_uri()?>/user-ajax-register.php"; // the script where you handle the form input.

            var form = jQuery('#register-popup-form')[0]; // You need to use standart javascript object here
            var formData = new FormData(form);

            jQuery.ajax({
                url: url,
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    if (data == 1) {
                        jQuery("#submit-register-popup-form").html("<?php _e('Регистрация прошла успешно, теперь вы можете войти в свой аккаунт', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        jQuery('#register-popup-form')[0].reset();

                        setTimeout(func, 20000);

                        function func() {
                            jQuery("#submit-register-popup-form").html("<?php _e('Зарегистрироваться', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    } else if (data == 2) {
                        jQuery("#submit-register-popup-form").html("<?php _e('Поле \"Логин\" обязательно', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        setTimeout(func, 3000);

                        function func() {
                            jQuery("#submit-register-popup-form").html("<?php _e('Зарегистрироваться', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    } else if (data == 3) {
                        jQuery("#submit-register-popup-form").html("<?php _e('Данный логин уже зарегистрирован', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        setTimeout(func, 3000);

                        function func() {
                            jQuery("#submit-register-popup-form").html("<?php _e('Зарегистрироваться', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    } else if (data == 4) {
                        jQuery("#submit-register-popup-form").html("<?php _e('Данный email уже зарегистрирован', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        setTimeout(func, 3000);

                        function func() {
                            jQuery("#submit-register-popup-form").html("<?php _e('Зарегистрироваться', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    } else {
                        jQuery("#submit-register-popup-form").html("<?php _e('Произошла ошибка', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        setTimeout(func, 3000);

                        function func() {
                            jQuery("#submit-register-popup-form").html("<?php _e('Зарегистрироваться', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    }
//                                            alert(data);
                },

                error: function (data) {
                    jQuery("#submit-register-popup-form").html("<?php _e('Произошла ошибка', 'science-of-everything') ?>").css(
                        {"background-image": "none"}
                    );

                    setTimeout(func, 3000);

                    function func() {
                        jQuery("#submit-register-popup-form").html("<?php _e('Зарегистрироваться', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );
                    }
                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>