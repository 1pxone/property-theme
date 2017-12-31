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

<div class="wrapper bg-e8" id="archive-wrapper">
	<?php get_template_part( 'filter-templates/townhouses-sale-bar' ); ?>
	<?php get_template_part( 'filter-templates/houses-filters' ); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 px-0 <?php if ($_GET['map'] == "true" ){echo "";} else {echo "hidden";} ?>" id="onmap">
				<div id="map"></div>
			</div>
		</div>
	</div>
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
				<main class="site-main " id="main">
					<div id="filterresult" class="row " >
						<div class="col-12 <?php if ($_GET['map'] == "true" ){echo "hidden";} else {echo "";} ?> mt-3" id="listed">
							<div class="row px-2">
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'loop-templates/townhouses-sale', get_post_format() );?>
								<?php endwhile; ?>
							<?php else : ?>
								<?php get_template_part( 'loop-templates/townhouses-sale', 'none' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</main>
			<!-- The pagination component -->
			<?php understrap_pagination(); ?>
			</div>
		</div>

<?php get_template_part( 'mapArchive' ); ?>
<?php get_footer(); ?>
