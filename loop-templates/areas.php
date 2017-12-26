<?php
/**
 * Post rendering houses according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 equalheight px-2 mb-3"  data-lat="<?php the_field( 'широта' ); ?>" data-lon="<?php the_field( 'долгота' ); ?>" data-addr="<?php the_field('адрес'); ?>" data-link="<?php the_permalink(); ?>" data-price="<?php echo number_format(get_field('price'), 0, ',', ' ')  ?>" data-img="<?php echo the_post_thumbnail_url(); ?>">
  <article <?php post_class("card item"); ?> id="post-<?php the_ID(); ?>" date="<?php the_date(); ?>">
    <a href="<?php the_permalink(); ?>" target="_blank">
        <div style="background-image:url(<?php echo the_post_thumbnail_url(); ?>);" class="main-image"></div>
    </a>
    <div class="card-body productInfo py-2 px-3">
       <!-- <span class="address"><small><?php echo substr(get_field('адрес'), 0, 82); ?></small></span> -->
      <p class="price mb-2"><?php echo number_format(get_field('price'), 0, ',', ' ')  ?>
          <span>
          <?php if (is_numeric ( get_field('price') )): ?>
            руб./в мес.
            <?php else: ?>
            <?php endif ?>
          </span>
        </p>
        <p class="lotinfo mb-2"><span><?php the_field( 'сотки' ); ?> сот.</span> • <span><?php the_field( 'км_от_мкад' ); ?> км. от МКАД</span></p>
        <p class="lotinfo mb-2"><span><?php the_field( 'шоссе' ); ?></span></p>
         <h4 class="card-title mb-0 h5"><small><?php the_title(); ?></small></h4>

      <div class="d-flex justify-content-between card-bottom">
        <span class="dateAdded"><?php print_r(the_date()); ?></span>
      </div>
    </div>
    <ul class="list-group list-group-flush">
       <li class="list-group-item fade-end"> <span class="address"><small><?php echo substr(get_field('адрес'), 0, 82); ?></small></span></li>
     </ul>
  </article><!-- #post-## -->
</div>
