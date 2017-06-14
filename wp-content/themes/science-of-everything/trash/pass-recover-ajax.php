<script>
    jQuery(document).ready(function () {
        // this is the id of the form

        jQuery("#pass-recover-popup-form").submit(function (e) {

            jQuery("#submit-pass-recover-popup-form").html("").css(
                {
                    "background-image": "url(<?= get_template_directory_uri()?>/app/img/loader-form.gif)",
                    "background-size": "15%",
                    "background-repeat": "no-repeat",
                    "background-position-y": "50%",
                    "background-position-x": "50%"
                }
            );
            var url = "<?= get_template_directory_uri()?>/user-pass-recover.php"; // the script where you handle the form input.

            var form = jQuery('#pass-recover-popup-form')[0]; // You need to use standart javascript object here
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
                        jQuery("#submit-pass-recover-popup-form").html("<?php _e('Пароль отправлен на вашу почту', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        jQuery('#pass-recover-popup-form')[0].reset();

                    } else {
                        jQuery("#submit-pass-recover-popup-form").html("<?php _e('Указаны некорректные данные', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );

                        setTimeout(func, 5500);

                        function func() {
                            jQuery("#submit-pass-recover-popup-form").html("<?php _e('Отправить', 'science-of-everything') ?>").css(
                                {"background-image": "none"}
                            );
                        }
                    }
//                                            alert(data);
                },

                error: function (data) {
                    jQuery("#submit-pass-recover-popup-form").html("<?php _e('Произошла ошибка__', 'science-of-everything') ?>").css(
                        {"background-image": "none"}
                    );

                    setTimeout(func, 3000);

                    function func() {
                        jQuery("#submit-pass-recover-popup-form").html("<?php _e('Отправить__', 'science-of-everything') ?>").css(
                            {"background-image": "none"}
                        );
                    }
                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>