<?php if(get_post_type() == 'photos') {?>
<li class="articlesList-item-text columns column-block medium-6 small-12 large-4 articlesList-medium">
        <a
                class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>"><img
                    class="articlesList-item-img" src="<?php the_field('post_image'); ?>"></a><a
                class="title-3"
                href="<?php the_field('post_image'); ?>"><?php the_field('post_title'); ?></a>
        <div class="counters">
            <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
            <div class="counters-item"><i class="icon-comment"></i>113</div>
        </div>
        <p class="text-p"><?php echo mbCutString(strip_tags(get_field('post_description')), 155); ?>
        </p>
    </li>
<?php } elseif ((get_post_type() == 'videos') || (get_post_type() == 'video-collections')) { ?>
   <li class="articlesList-item-text columns column-block medium-6 small-12 large-4 articlesList-medium-plus">
                                <a class="articlesList-item-img-wrap articlesList-item-video"
                                   href="<?php the_permalink(); ?>"><!--
                                --><img class="articlesList-item-img" src="https://img.youtube.com/vi/<?php
                                    the_field('video_id'); ?>/0.jpg""></a><!--
                                    --><a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i
                                                class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p"><?= strip_tags(get_field('description')); ?>
                                </p>
                            </li>
<?php } ?>