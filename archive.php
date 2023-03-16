<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News-Hsoub
 */

get_header();
?>

<main >
	<section class="news mt-5">
        <div class="container">
            <div class="row">
                <h3 class="my-5">جميع الأخبار العائدة لتصنيف <?php the_category('،') ?></h3>
            </div>
            
            <div class="row">
                <?php
                    while ( have_posts() ) {
                        the_post();
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-5">
                    <a href="<?php the_permalink(); ?>" class="article-link">  
                        <?php if ( has_post_thumbnail() ) {?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                        <?php
                        } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                        <?php } ?>
                    </a>
                    <div class="article-text mt-3">
                        <span class="article-category">
                            <?php the_category('،') ?>
                        </span>
                        <h5 class="article-title article-link pb-4 text-dark">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                        </h5>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
    </section>
</main>

<?php

get_footer();
