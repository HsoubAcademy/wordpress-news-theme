<?php

/*
Template Name: Blog
*/

get_header();
?>

<main>
    <section class="news" style="margin-top:7rem;">
        <div class="container">
          <h2 class="section-title">
            جميع مقالات الرأي
          </h2>
          <div class="row">
              <?php
                while ( have_posts() ) : the_post();?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                        <a href="<?php the_permalink(); ?>"> 
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </a>
                        <div class="article-text mt-3">
                            <span class="article-category">
                                <?php the_author('، ')?>
                            </span>
                            <h5 class="article-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                            </h5>
                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="row mt-5">
                    <div class="pagination">
                        <?php 
                            echo paginate_links( array(
                                
                            ) );
                        ?>
                    </div>
                </div>
          </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>