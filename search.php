<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package News-Hsoub
 */

get_header();
?>
    <main>
      <div class="container my-5">
        <div class="row">
          <div class="col-md-8">
		  	<div class="search-line">
				<h3 class=" mt-5">نتائج البحث عن "<?php echo get_search_query() ?>"</h3>
			</div>
		  	<?php if(have_posts()) : while(have_posts()) : ?>
        		<?php the_post(); ?>
				<div class="search-articles" id="search-articles">
					<div class="article-card">
						<a href="<?php the_permalink(); ?>" class="article-link">
							<div class="row">
								<div class="col-md-4">
									<a href="<?php the_permalink(); ?>"> 
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										} else { ?>
											<img src="<?php bloginfo('template_directory'); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
										<?php } ?>
                                	</a>
								</div>
								<div class="col-md-8">
									<h4><?php the_title(); ?></h4>
									<?php the_excerpt(); ?>
									<time datetime="<?php the_time('d/m/Y'); ?>"><?php the_time('j F Y'); ?></time>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endwhile; ?> 
			
			<?php else : ?>
				<div class="alert alert-danger mt-5" role="alert">
					للأسف لايوجد أخبار عن "<?php echo get_search_query() ?>"، يرجى البحث عن موضوع محدد أكثر
				</div>
			<?php endif; ?> 
          </div>
        </div>
      </div>
    </main>


<?php
get_footer();
