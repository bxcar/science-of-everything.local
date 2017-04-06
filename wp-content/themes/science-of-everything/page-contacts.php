<?php
/**
 * Template Name: contacts
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <div class="l-contacts column small-12">
            <address class="contacts-details"><a class="contacts-details-main white" href="#"><?php the_field('mail_email'); ?></a>
                <p class="contacts-details-second white"><?php the_field('address'); ?></p>
                <p class="contacts-details-third white"><?php the_field('phone'); ?></p>
            </address>
            <ul class="contacts-authors">
                <?php
                $site_admins = get_field('site_admins');
                if ($site_admins) {
                    foreach ($site_admins as $site_admin) {
                        ?>
                        <li>
                            <figure class="contacts-authors-photo"><img src="<?= $site_admin['site_admins_item_image'] ?>"></figure>
                            <p class="contacts-authors-name white"><?= $site_admin['site_admins_item_name_surname'] ?></p>
                            <p class="contacts-authors-status white"><?= $site_admin['site_admins_item_position'] ?></p><a class="contacts-authors-address"
                                                                                         href="#"><?= $site_admin['site_admins_item_email'] ?></a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>