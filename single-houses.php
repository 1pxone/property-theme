<?php
/*
Template Name: Single house
Template Post Type: houses
*/
?>

    <?php get_header(); ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/swipebox/css/swipebox.css"/>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/swipebox/js/jquery.swipebox.js"></script>
      <div class="container-fluid px-0">
        <div id="gallery">
          <a href="<?php echo the_post_thumbnail_url(); ?>" class="swipebox">
            <img src="<?php echo the_post_thumbnail_url(); ?>" style="height: 400px;"/>
          </a>
          <?php if ( get_field( 'img0') ) { ?>
          <a href="<?php the_field( 'img0' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img0' ); ?>"  style="height: 400px;" />
          </a>
          <?php } ?>
          <?php if ( get_field( 'img1') ) { ?>
            <a href="<?php the_field( 'img1' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img1' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img2') ) { ?>
            <a href="<?php the_field( 'img2' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img2' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img3') ) { ?>
            <a href="<?php the_field( 'img3' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img3' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img4') ) { ?>
            <a href="<?php the_field( 'img4' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img4' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img5') ) { ?>
            <a href="<?php the_field( 'img5' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img5' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img6') ) { ?>
            <a href="<?php the_field( 'img6' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img6' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img7') ) { ?>
            <a href="<?php the_field( 'img7' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img7' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img8') ) { ?>
            <a href="<?php the_field( 'img8' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img8' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img9') ) { ?>
            <a href="<?php the_field( 'img9' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img9' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img10') ) { ?>
            <a href="<?php the_field( 'img10' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img10' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img11') ) { ?>
            <a href="<?php the_field( 'img11' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img11' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img12') ) { ?>
            <a href="<?php the_field( 'img12' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img12' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img13') ) { ?>
            <a href="<?php the_field( 'img13' ); ?>" class="swipebox">
          	<img src="<?php the_field( 'img13' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
          <?php if ( get_field( 'img14') ) { ?>
            <a href="<?php the_field( 'img14' ); ?>" class="swipebox">
            	<img src="<?php the_field( 'img14' ); ?>"  style="height: 400px;" />
            </a>
          <?php } ?>
        </div>
      </div>
      <script>
        $('#gallery').slick({
          dots: false,
          infinite: true,
          arrows: true,
          speed: 300,
          slidesToShow: 1,
          centerMode: true,
          variableWidth: true,
          adaptiveHeight: true
        });
        ( function( $ ) {
      	   $( '.swipebox' ).swipebox();
        })( jQuery );
      </script>
  <div class="container">
    <div class="row">
      <div class="col-12 mainblock  pr-md-0" data-lat="<?php the_field( 'широта' ); ?>" data-lon="<?php the_field( 'долгота' ); ?>" data-addr="<?php the_field('адрес'); ?>" data-link="<?php the_permalink(); ?>" data-price="<?php echo number_format(get_field('price'), 0, ',', ' ')  ?>" data-img="<?php echo the_post_thumbnail_url(); ?>">
        <div class="card item obj mb-3">

          <div class="row card-body">
            <div class="col-md-6 col-lg-5">
              <p class="obj-info ">
                <span class="border-r pr-2"> <?php the_field( 'площадь' ); ?> м² </span>
                <span class="border-r px-2"> <?php the_field( 'этажей' ); ?> эт. </span>
                <span class="border-r px-2"> <?php the_field('сотки'); ?> сот. </span>
                <span class="pl-2"> <?php the_field('км_от_мкад'); ?> км </span>
              </p>
              <p class="">
                <a href="#map">
                  <small>
                    <i class="ion-ios-location"></i>
                    <?php if ( get_field( 'шоссе') ) { ?>
                    <?php the_field('шоссе'); ?> ш.,
                    <?php } ?>
                    <?php if ( get_field( 'область') ) { ?>
                    <?php the_field( 'область' ); ?> обл.,
                    <?php } ?>
                    <?php if ( get_field( 'поселок') ) { ?>
                    <?php the_field( 'поселок' ); ?>,
                    <?php } ?>
                    <?php if ( get_field( 'адрес') ) { ?>
                    <?php the_field( 'адрес' ); ?>
                    <?php } ?>




                  </small>
                </a>
              </p>
            </div>
            <div class=" col-lg-3 d-md-none d-none d-lg-block">
              </div>
              <div class="col-md-6 col-lg-4">
                <p class="price price-obj mb-2"><?php echo number_format(get_field('price'), 0, ',', ' ')  ?>
                    <span>
                      <?php if (is_numeric ( get_field('price') )): ?>
                        руб./в мес.
                        <?php else: ?>
                        <?php endif ?>
                    </span>
                  </p>
                  <?php if ( get_field( 'торг') ) { ?>
                    <p class="text-center p-0 mb-2">
                      <small>Торг уместен</small>
                    </p>
                  <?php } ?>
              <?php if( isset($_GET["secret"]) && $_GET["secret"] == get_field( 'secret' )) : ?>
                <a href="tel:<?php the_field( 'phone' ); ?>" class="btn btn-c-primary circled btn-block">
                  <?php
                    $str = strval(get_field( 'phone' ));
                    $str = '+'.substr($str, 0, 1).'('.substr($str, 1, 3).')'.substr($str, 4, 3).'-'.substr($str, 7, 2).'-'.substr($str, 9, 2);
                    echo $str;
                  ?>
                </a>
              <?php else : ?>
                <button class="btn btn-c-primary circled btn-block" data-toggle="modal" data-target="#getPhone"><i class="icon ion-android-call"></i> Телефон владельца</button>
              <?php endif ?>
              <div class="row">
                <?php if ( get_field( 'call_from') && get_field( 'call_to')  ) { ?>
                  <div class="col-12 text-center mt-2">
                    <small>Звонить с: <b><?php the_field( 'call_from' ); ?></b></small>
                    <small>до: <b><?php the_field( 'call_to' ); ?></b></small>
                  </div>
                <?php } ?>
                </div>
              </div>
          </div>
          <div class="row card-body productInfo py-2 px-3">
            <div class="col-md-12 col-lg-8">

              <h2><?php the_title(); ?></h2>
              <div class="row my-3">
                <div class="col-12 col-sm-6">
                  <h5>Удобства</h5>
                  <table class="table  table-sm">
                    <tbody>
                      <?php if ( get_field( 'интернет') ) { ?>
                          <tr>
                            <td>Интернет:</td>
                            <td><?php the_field( 'интернет' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'телефония') ) { ?>
                          <tr>
                            <td>Телефония:</td>
                            <td><?php the_field( 'телефония' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'телевидение') ) { ?>
                          <tr>
                            <td>Телевидение:</td>
                            <td><?php the_field( 'телевидение' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'материал') ) { ?>
                          <tr>
                            <td>Материал постройки:</td>
                            <td><?php the_field( 'материал' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'спальни') ) { ?>
                          <tr>
                            <td>Спальни:</td>
                            <td><?php the_field( 'спальни' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'охрана') ) { ?>
                          <tr>
                            <td>Охрана:</td>
                            <td><?php the_field( 'охрана' ); ?></td>
                          </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-12 col-sm-6">
                  <h5>Коммуникации</h5>
                  <table class="table  table-sm">
                    <tbody>
                      <?php if ( get_field( 'водоснабжение') ) { ?>
                          <tr>
                            <td>Водоснабжение:</td>
                            <td><?php the_field( 'водоснабжение' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'Газ') ) { ?>
                          <tr>
                            <td>Газ:</td>
                            <td><?php the_field( 'газ' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'канализация') ) { ?>
                          <tr>
                            <td>Канализация:</td>
                            <td>  <?php the_field( 'канализация' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'электричество') ) { ?>
                          <tr>
                            <td>Электричество:</td>
                            <td><?php the_field( 'электричество' ); ?></td>
                          </tr>
                      <?php } ?>
                      <?php if ( get_field( 'отопление') ) { ?>
                          <tr>
                            <td>Отопление:</td>
                            <td><?php the_field( 'отопление' ); ?></td>
                          </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>
              <hr/>
              <?php the_post(); the_content(); ?>
            </div>
            <div class="col-md-12 col-lg-4">
              <!-- Ads -->
            </div>
          </div>
          <div class="col-12 px-0" id="pointonmap">
            <div id="map"></div>
          </div>
        </div>
      <!-- Modal -->
      <div class="modal fade mt-3" id="getPhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php the_field( 'buy_link' ); ?>" allowfullscreen></iframe>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row px-3 pt-3 pb-5">
      <div class="col-12 px-2">
           <h2 class="pb-3 fw-slim h1">Последние предложения</h2>
      </div>
        <?php $loop = new WP_Query(array( 'post_type' => array('houses'),'showposts' => '3')); if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php get_template_part( 'loop-templates/houses', get_post_format() ); ?>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 equalheight px-2 mb-3">
              <div class="card item">
                  <div class="card-body text-center d-flex flex-column justify-content-around">
                    <i class="pointicon flaticon-house-1" id="findyours"></i><br/>
                    <h5 class="card-title fw-slim">Найдите свой дом</h5>


                    <p class="card-text">используя гибкие фильтры</p>

                    <a href="/rent/houses" class="btn circled btn-active btn-c-primary">Все предложения</a>
                  </div>
                </div>
            </div>
    </div>
  </div>

             <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
             <script>
             	var myMap;
             	String.prototype.trimRight=function(){
             		  var r=/\s+$/g;
             		  return this.replace(r,'');
             		};
             	function initMap(){

             		 var cords = [];
             		 $.each($('.mainblock'),function(){
             				var obj = {
             					cords:[],
             					name:"",
             					link:"",
             					img:"",
             					description:"",
             					price:"",
             				};
             				var that = $(this);
             				obj.cords.push(that.attr('data-lon'),that.attr('data-lat'));
             				obj.name = that.attr('data-addr');
             				obj.link = that.attr('data-link');
             				obj.img = that.attr('data-img');
             				obj.price = that.attr('data-price');
             				cords.push(obj);
             			}
             		 );

             		ymaps.ready(init);
             		function init() {
             			MyBalloonLayout = ymaps.templateLayoutFactory.createClass(
             					'<div class="card card-baloon" style="min-width:235px">'+
                            '<a class="close" href="#"><i class="ion-close-round"></i></a>' +
             							 '<div class="arrow"></div>' +

             							 '$[[options.contentLayout observeSize minWidth=235 maxWidth=235 maxHeight=350]]', {

             							 build: function () {
             									 this.constructor.superclass.build.call(this);

             									 this._$element = $('.card', this.getParentElement());

             									 this.applyElementOffset();

             									 this._$element.find('.close')
             											 .on('click', $.proxy(this.onCloseClick, this));
             							 },

             							 clear: function () {
             									 this._$element.find('.close')
             											 .off('click');

             									 this.constructor.superclass.clear.call(this);
             							 },

             							 onSublayoutSizeChange: function () {
             									 MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);

             									 if(!this._isElement(this._$element)) {
             											 return;
             									 }

             									 this.applyElementOffset();

             									 this.events.fire('shapechange');
             							 },

             							 applyElementOffset: function () {
             									 this._$element.css({
             											 left: -(this._$element[0].offsetWidth / 2),
             											 top: -(this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight)
             									 });
             							 },

             							 onCloseClick: function (e) {
             									 e.preventDefault();

             									 this.events.fire('userclose');
             							 },

             							 getShape: function () {
             									 if(!this._isElement(this._$element)) {
             											 return MyBalloonLayout.superclass.getShape.call(this);
             									 }

             									 var position = this._$element.position();

             									 return new ymaps.shape.Rectangle(new ymaps.geometry.pixel.Rectangle([
             											 [position.left, position.top], [
             													 position.left + this._$element[0].offsetWidth,
             													 position.top + this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight
             											 ]
             									 ]));
             							 },

             							 _isElement: function (element) {
             									 return element && element[0] && element.find('.arrow')[0];
             							 }
             					 });
             			MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
             							 '$[properties.balloonContent]'
             			 );
                  var mapcenter;
                  for(var i = 0; i<cords.length; i++){
                    mapcenter = cords[i].cords;

                  };
             			myMap = new ymaps.Map("map", {
             							center: mapcenter,
             							zoom: 15,
             							controls: [],
             					});
             					myMap.controls
             			    .add('zoomControl')
             			    .add('typeSelector');
             					for(var i = 0; i<cords.length; i++){
                        center = cords[i].cords;
             						var price = cords[i].price;
             					myMap.geoObjects
             					.add(new ymaps.Placemark(
             							cords[i].cords, {
             	            balloonContent: [
             								 	'<img class="img-fluid"  src=' + cords[i].img + ' />',
             		 						  '<div class="card-body p-1">',
             										'<p class="price mb-2">' + cords[i].price,
             										'<span> руб./в мес.</span> </p>',
             										 '<p class="card-text mb-1"><small>' + cords[i].name + '</small></p>',
             										 '<div class="text-center">',
             										 '<a class="btn circled btn-sm btn-c-primary btn-block" href=' + cords[i].link + '>Подробнее</a></div>',
             		 						  '</div>'
             							 ].join('')
             	        }, {
             						iconLayout: 'default#image',
             						// Своё изображение иконки метки.
             						iconImageHref: 'https://png.icons8.com/?id=46471&size=280',
             						// Размеры метки.
             						iconImageSize: [42, 42],
             						// Смещение левого верхнего угла иконки относительно
             						// её "ножки" (точки привязки).
             						iconImageOffset: [-5, -38],
             	            balloonShadow: true,
             	            balloonLayout: MyBalloonLayout,
             	            balloonContentLayout: MyBalloonContentLayout,
             	            balloonPanelMaxMapArea: 0
             						}
             					)
             				)};
             			}
             		};

             	$(document).ready(function() {
             	  $(function() {
             	    $(document).trigger("enhance");
                  initMap();
             	  });
             	});

              </script>
              <style>
             		 html, .map, #map {
             				 width: 100%; height: 100%; padding: 0; margin: 0;
             		 }
             		 div#map {
             				height: 30vh;
             				z-index: 22;
             				position: absolute;
             		}
              </style>
              <!--
             <div class="map hidden" id="mapWrapper">
               <div id="map"></div>
             </div> -->
   </div>
            <?php get_footer(); ?>
                <!-- Ваш файл footer.php -->
