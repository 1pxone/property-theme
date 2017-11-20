<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>
<?php
print_r($_GET);
?>
<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<!-- <header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header> -->
					<div class="container mt-3">



            <div class="text-center pb-3">
              <div class="form-inline">
                <div class="btn-group mr-3 circled">
                    <a href="" class="btn circled btn-active btn-more" id="houses">Дома</a>
                    <a href="/townhouses" class="btn btn-inactive circled" id="townhouses">Таунхаусы</a>
                    <a href="/areas" class="btn circled btn-inactive" id="areas">Участки</a>
                </div>
                <div class="col text-right px-0" id="sortingBts">
                  <button class="btn btn-sm btn-def-border btn-untoggled circled fw-light" id="cheapFirst">Сначала дешевые <i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
                  <button class="btn btn-sm btn-def-border btn-untoggled circled fw-light" id="expensiveFirst">Сначала дорогие <i class="fa fa-sort-amount-desc" aria-hidden="true"></i></button>
                  <button class="btn btn-sm btn-def-border btn-toggled circled fw-light " id="byDate">По дате <i class="fa fa-calendar" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>

          </div>

					<div id="filterresult" class="row bg-e8" >
						<div class="col-12 col-sm-6 col-md-4 col-lg-2">
							<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

								<input id="pricerange" type="range"/>
								<script>$("#pricerange").ionRangeSlider({
								    type: "double",
								    grid: true,
								    min: 0,
								    max: 1000,
								    from: 200,
								    to: 800,
								    prefix: "$"
								});</script>
								<input type="hidden" name="type" value="houses" />
								<?php
									if( $terms = get_terms( 'category', 'orderby=name' ) ) : // to make it simple I use default categories
										echo '<select name="categoryfilter"><option>Select category...</option>';
										foreach ( $terms as $term ) :
											echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
										endforeach;
										echo '</select>';
									endif;
								?>
								<input type="text" name="price_min" placeholder="Min price" />
								<input type="text" name="price_max" placeholder="Max price" />
								<label>
									<input type="radio" name="date" value="ASC" /> Date: Ascending
								</label>



								<label>
									<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
								</label>
								<label>
									<input type="checkbox" name="featured_image" /> Only posts with featured image
								</label>
								<button>Apply filter</button>
								<input type="hidden" name="action" value="myfilter">
							</form>
							<div id="response"></div>
						</div>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/houses', get_post_format() );
							?>


						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/houses', 'none' ); ?>

					<?php endif; ?>
				</div>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->
<script>
jQuery(function($){
	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});
</script>
<?php get_footer(); ?>
