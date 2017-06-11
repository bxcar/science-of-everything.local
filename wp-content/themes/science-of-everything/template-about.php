<?php
/**
 * Template Name: about
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-info column small-12 large-10">
            <h1 class="title-0"><?php the_title(); ?></h1>
            <p class="text-sub"><?php the_field('about_description'); ?></p>
            <ul class="info-authors-list">
                <?php
                $admins = get_field('admins');
                if ($admins) {
                    foreach ($admins as $admin) {
                        ?>
                        <li>
                            <figure class="info-authors-list-photo"><img src="<?= $admin['admins_item_image'] ?>">
                            </figure>
                            <div class="info-authors-list-description">
                                <p class="title-4"><?= $admin['admins_item_name'] ?></p>
                                <p class="text-p"><?= $admin['admins_item_description'] ?></p>
                                <ul class="info-authors-list-description-links">
                                    <li class="info-authors-links-mail">
                                        <a>
                                            <i class="icon-mail"></i><span
                                                style="text-decoration: none;"><?= $admin['admins_item_email'] ?></span>
                                        </a>
                                    </li>
                                    <?php
                                    $socials = $admin['admins_item_socials'];
                                    if ($socials) {
                                        foreach ($socials as $social) {
                                            if ($social['admins_item_socials_item_image'] == 'fa-google-plus') {
                                                ?>
                                                <li class="info-authors-links-gp">
                                            <?php } else if ($social['admins_item_socials_item_image'] == 'fa-twitter') { ?>
                                                <li class="info-authors-links-tw">
                                            <?php } else if ($social['admins_item_socials_item_image'] == 'fa-facebook') { ?>
                                                <li class="info-authors-links-fb">
                                            <?php } else { ?>
                                                <li class="info-authors-links-vk">
                                            <?php } ?>
                                            <a target="_blank" href="<?= $social['admins_item_socials_item_link'] ?>">
                                                <i class="fa <?= $social['admins_item_socials_item_image'] ?>"
                                                   aria-hidden="true"></i>
                                                <span><?= $social['admins_item_socials_item_text'] ?></span>
                                            </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <ul class="info-categories">
                <?php
                $categories = get_field('about_categories');
                if ($categories) {
                    $i = 0;
                    foreach ($categories as $category) {
                        //line_color means category title
                        if ($i % 5 == 0) {
                            $line_color = 'astro';
                        } else if ($i % 5 == 1) {
                            $line_color = 'techno';
                        } else if ($i % 5 == 2) {
                            $line_color = 'psycho';
                        } else if ($i % 5 == 3) {
                            $line_color = 'books';
                        } else {
                            $line_color = 'future';
                        }
                        echo '<li class="info-categories-' . $line_color . '">' . $category['about_categories_item_category'] . '</li>';
                        $i++;
                    }
                }
                ?>
            </ul>
        </article>
    </div>
    <div class="l-lastDescription">
        <div class="mainWrap mainWrap-medium row">
            <div class="lastDescription-content column small-12 large-10">
                <a class="lastDescription-content-logo" href="<?= home_url(); ?>">
                    <img src="<?php the_field('bottom_description_image'); ?>">
                </a>
                <div class="lastDescription-content-text">
                    <?php the_field('bottom_description_text'); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery('.l-lastDescription .lastDescription-content-text h2').addClass("title-0");
        jQuery('.l-lastDescription .lastDescription-content-text strong').replaceWith('<span>' + jQuery('.l-lastDescription .lastDescription-content-text strong').html() +'</span>');
        jQuery('.l-lastDescription .lastDescription-content-text span').addClass("medium");
    </script>
<?php get_footer(); ?>