<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package News-Hsoub
 */

get_header();
?>

<div class="header-news mt-5">
            <div class="container">
              <div class="row">
                <div class="col-lg-7">
                  <div class="carousel-news">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">1</button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2">2</button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3">3</button>
                      </div>
                      <?php 
                        $query = new WP_Query( array(
                            'post_type' => 'post', 
                            'posts_per_page' => 3,   
                            'tax_query' => array(
                            array(
                            'taxonomy' => 'front_position',
                            'field' => 'slug',
                            'terms' => 'image-slider',
                            ))
                        ));
                        while ( $query->have_posts() ) : $query->the_post();
                        if ($query->current_post == 0) {?>
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <a href="<?php the_permalink(); ?>"> 
                                      <?php if ( has_post_thumbnail() ) {
                                          the_post_thumbnail();
                                      } else { ?>
                                          <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                                      <?php } ?>
                                  </a>
                                  <div class="carousel-text">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  </div>
                              </div>
                              <?php 
                          }
                          else {?>
                              <div class="carousel-item">
                                  <a href="<?php the_permalink(); ?>"> 
                                      <?php if ( has_post_thumbnail() ) {
                                          the_post_thumbnail();
                                      } else { ?>
                                          <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                                      <?php } ?>
                                  </a>
                                  <div class="carousel-text">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  </div>
                              </div>
                          <?php 
                            }
                            endwhile; ?>  
                          </div>

                    </div>
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="header-articles">
                      <?php 
                        $query = new WP_Query( array(
                            'post_type' => 'post', 
                            'posts_per_page' => 3,   
                            'tax_query' => array(
                            array(
                            'taxonomy' => 'front_position',
                            'field' => 'slug',
                            'terms' => 'header-news',
                            ))
                        ));
                        while ( $query->have_posts() ) : $query->the_post();?>
                            <div class="row">
                              <div class="col-5">
                                <a href="<?php the_permalink(); ?>"> 
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                </a>
                              </div>
                              <div class="col-7">
                                <div class="article-text">
                                  <span class="article-category">
                                      <?php the_category('، ') ?>
                                  </span>
                                  <h5 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                </div>
                              </div>
                            </div>
                        <?php endwhile; ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
    </header>


    <main>
      <section class="news mt-5">
        <div class="container">
          <h2 class="section-title">
            الأخبار
          </h2>
          <div class="row">
              <?php 
                $query = new WP_Query( array(
                    'post_type' => 'post', 
                    'posts_per_page' => 8,   
                    'tax_query' => array(
                    array(
                    'taxonomy' => 'front_position',
                    'field' => 'slug',
                    'terms' => 'front-news',
                    ))
                ));
                while ( $query->have_posts() ) : $query->the_post();?>
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
                            <?php the_category('، ')?>
                        </span>
                        <h5 class="article-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                        </h5>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
          <div class="text-center mt-5">
            <a href="<?php echo site_url('/blog')?>" class="py-1 button">
              المزيد
            </a>
          </div>
        </div>
      </section>

      <section class="most-read">
        <div class="container">
          <h2 class="section-title">
            الأكثر قراءة
          </h2>
          <?php 
            $popularpost = new WP_Query( array( 'posts_per_page' =>  5,
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'  ) );
          ?>
          <?php while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
            <div class="card-news">
                <div class="row">
                  <div class="col-md-5">
                      <a href="<?php the_permalink(); ?>"> 
                          <?php if ( has_post_thumbnail() ) {
                              the_post_thumbnail();
                          } else { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                          <?php } ?>
                      </a>   
                  </div>
                  <div class="col-md-7">
                    <div class="card-text">
                      <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4> </a>
                      <p><?php the_excerpt(); ?></p>
                      <time datetime="<?php the_time('d/m/Y'); ?>"><?php the_time('j F Y'); ?></time>
                    </div>
                  </div>
                </div>
            </div>
          <?php endwhile; ?>
        </div>
      </section>

      <section class="opinions">
        <div class="container">
          <h2 class="section-title">
            مقالات الرأي
          </h2>

          <div class="row mt-4">
              <?php
                  $args = array(  
                    'post_type' => 'opinion',
                    'post_status' => 'publish',
                    'posts_per_page' => 8, 
                  );

                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post();?>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="card mb-4">
                              <div class="card-icons">
                                  <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) {
                                      the_post_thumbnail();
                                    } else { ?>
                                      <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                  </a>
                              </div>

                              <div class="card-body p-0">
                                  <p class="card-title p-2"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></p>
                              </div>

                              <div class="card-footer p-2">
                                  <small class="text-muted">
                                      <span class="me-2"><i class="fas fa-film me-1"></i> <span><?php echo getPostViews(get_the_ID()); ?> مشاهدة</span></span>
                                      <i class="fas fa-clock me-1"></i> <time datetime="<?php the_time('d/m/Y'); ?>"><?php the_time('j F Y'); ?></time>
                                  </small>
                              </div>
                              <a href="#"  class="p-2">
                                  <img class ="rounded-circle" style="width: 50px;height:50px; margin-top:5px" src="<?php print get_avatar_url(get_the_author_meta( 'ID' )); ?>" alt="...">
                                  <span class="card-text ms-2"><?php the_author(); ?></span>
                              </a>
                          </div>
                      </div>
                  <?php  endwhile; ?>
          </div>
          <div class="text-center mt-5">
              <a href="<?php echo get_post_type_archive_link( 'opinion' ); ?>" class="py-1 button">
                المزيد
              </a>
          </div>
        </div>


      </section>

      <section class="videos">
        <div class="container">
          <h2 class="section-title">
            فيديو
          </h2>

          <?php 
            $args = array(  
                'post_type' => 'video',
                'post_status' => 'publish',
                'posts_per_page' => 8,
            );

            $query = new WP_Query( $args ); 
          ?>
          
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="swiper-slide">
                  <a href="<?php the_permalink(); ?>" class="article-link">
                    <div class="slide-img">
                        <?php if ( has_post_thumbnail() ) {
                          the_post_thumbnail();
                        } else { ?>
                          <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                        <?php } ?>
                        <i class="fa-solid fa-play"></i>
                    </div>
                    <div class="slide-text">
                      <h5 class="article-title">
                          <?php the_title(); ?>
                      </h5>
                    </div>
                  </a>
                </div>
              <?php  endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
            <div class="text-center mt-5">
                <a href="<?php echo get_post_type_archive_link( 'video' ); ?>" class="py-1 button">
                  المزيد
                </a>
            </div>
        </div>
      </section>
      
      <section class="latest-news">
        <div class="container">
          <h2 class="section-title mb-4">
            أحدث الأخبار
          </h2>
          <div class="row">
              <?php $recent_query = new WP_Query( 'posts_per_page=4' );

              while ($recent_query -> have_posts()) : $recent_query -> the_post();


              if ($recent_query->current_post == 0)  { ?>
                <div class="col-md-6">
                  
                      <a href="<?php the_permalink(); ?>"> 
                          <?php if ( has_post_thumbnail() ) {
                              the_post_thumbnail();
                          } else { ?>
                              <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                          <?php } ?>
                      </a>  
                    <div class="card-text my-3">
                      <span class="article-category"><?php the_category('، '); ?></span>
                      <h5 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                </div>
              <?php } 
 
              elseif ($recent_query->current_post == 1) { ?>
            
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-6">
                        <a href="<?php the_permalink(); ?>"> 
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </a>  
                      </div>
                      <div class="col-sm-6">
                        <div class="card-text mb-3 card-text-2">
                          <span class="article-category">
                              <?php the_category('، '); ?>
                          </span>
                          <h5 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                      </div>
                    </div>
              <?php } 
 
              elseif  ($recent_query->current_post == 2) { ?>
                  <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="<?php the_permalink(); ?>"> 
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </a> 
                        <div class="card-text my-3">
                          <span class="article-category">
                            <?php the_category('، '); ?>
                          </span>
                          <h5 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                    </div>
              <?php } 
 
              else  { ?> 
                    <div class="col-sm-6">

                        <a href="<?php the_permalink(); ?>"> 
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </a> 
                        <div class="card-text my-3">
                          <span class="article-category">
                            <?php the_category('، '); ?>
                          </span>
                          <h5 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>

                    </div>
                  </div>
                </div>
          </div>
            <?php } ?>
          <?php endwhile;?>
          <div class="text-center mt-5">
            <a href="<?php echo site_url('/blog')?>" class="btn button">المزيد</a>
          </div>
        </div>
      </section>
    </main>

<?php

get_footer();
