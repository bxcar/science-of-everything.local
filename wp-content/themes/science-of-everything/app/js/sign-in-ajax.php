<script>
    jQuery(document).ready(function () {
        // this is the id of the form

        jQuery("#sign-in-popup-form").submit(function (e) {

            jQuery("#submit-sign-in-popup-form").html("").css(
                {
                    "background-image": "url(<?= get_template_directory_uri()?>/app/img/loader-form.gif)",
                    "background-size": "15%",
                    "background-repeat": "no-repeat",
                    "background-position-y": "50%",
                    "background-position-x": "50%"
                }
            );
            var url = "<?= get_template_directory_uri()?>/user-sign-in-ajax.php"; // the script where you handle the form input.

            var form = jQuery('#sign-in-popup-form')[0]; // You need to use standart javascript object here
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
                        jQuery("#submit-sign-in-popup-form").html("<?php _e('Вход выполнен', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        jQuery('#sign-in-popup-form')[0].reset();

                        setTimeout(func, 50);

                        function func() {
                            jQuery("#submit-sign-in-popup-form").css(
                                {"background-image": "none"}
                            );
                            location.reload();
                        }
                    } else {
                        jQuery("#submit-sign-in-popup-form").html("<?php _e('Указаны некорректные данные', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        setTimeout(func, 5500);

                        function func() {
                            jQuery("#submit-sign-in-popup-form").html("<?php _e('Войти', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    }
//                                            alert(data);
                },

                error: function (data) {
                    jQuery("#submit-sign-in-popup-form").html("<?php _e('Произошла ошибка__', 'science-of-everything') ?>").css(
                        {"background-image": "none"}
                    );

                    setTimeout(func, 3000);

                    function func() {
                        jQuery("#submit-sign-in-popup-form").html("<?php _e('Зарегистрироваться__', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );
                    }
                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>