<?php
/*
Template Name: Single house
Template Post Type: houses
*/
?>

    <?php get_header(); ?>
      <div class="container-fluid px-0">
        <!-- <div class="lotGallery" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>)">

        </div> -->
        <div id="gallery">
          <img src="<?php echo the_post_thumbnail_url(); ?>" style="height: 400px;"/>
          <img src="<?php echo the_post_thumbnail_url(); ?>" style="height: 400px;"/>
          <img src="<?php echo the_post_thumbnail_url(); ?>" style="height: 400px;"/>
          <img src="<?php echo the_post_thumbnail_url(); ?>" style="height: 400px;"/>
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
        </script>
      </div>
  <div class="container">
    <div class="row">
      <div class="col-12 mainblock  pr-md-0" data-lat="<?php the_field( 'широта' ); ?>" data-lon="<?php the_field( 'долгота' ); ?>" data-addr="<?php the_field('адрес'); ?>" data-link="<?php the_permalink(); ?>" data-price="<?php echo number_format(get_field('price'), 0, ',', ' ')  ?>" data-img="<?php echo the_post_thumbnail_url(); ?>">
        <div class="card item obj mb-3">

          <div class="row card-body">
            <div class="col-md-4">
              <p class="obj-info">
                <span class="border-r pr-2"> <?php the_field( 'площадь' ); ?> м² </span>
                <span class="border-r px-2"> <?php the_field('сотки'); ?> сот. </span>
                <span class="pl-2"> <?php the_field('км_от_мкад'); ?> км
                  <small><?php the_field('шоссе'); ?></small>
                </span>
              </p>
              <p class="h3"></p>
            </div>
            <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <p class="price price-obj mb-3"><?php echo number_format(get_field('price'), 0, ',', ' ')  ?>
                    <span>
                      <?php if (is_numeric ( get_field('price') )): ?>
                        руб./в мес.
                        <?php else: ?>
                        <?php endif ?>
                    </span>
                  </p>
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
              </div>
          </div>
          <div class="row card-body productInfo py-2 px-3">
            <div class="col-md-8">
              <h2><?php the_title(); ?></h2>
              <?php the_post(); the_content(); ?>
            </div>
            <div class="col-md-4">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Газ</td>
                    <td>Да</td>
                  </tr>
                  <tr>
                    <td>Водоснабжение</td>
                    <td>Скважина</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-12 px-0" id="pointonmap">
            <div id="map"></div>
          </div>
        </div>

<!-- Modal -->
      <div class="modal fade" id="getPhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="http://activate.to/ucc" allowfullscreen></iframe>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row px-3 pt-5">
      <div class="col-12 px-0">
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
             					//  '$[[options.contentLayout observeSize minWidth=235 maxWidth=235 maxHeight=350]]' +
             						  // '<img class="card-img-top" src="..." alt="Card image cap">'+
             						  // '<div class="card-block">'+
             						  //   '<h4 class="card-title">Card title</h4>'+
             						  //   '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>'+
             						  //   '<a href="#" class="btn btn-primary">Go somewhere</a>'+
             						  // '</div>'+


             							 '<a class="close" href="#"><i class="ion-close-round"></i></a>' +
             							 '<div class="arrow"></div>' +

             							 '$[[options.contentLayout observeSize minWidth=235 maxWidth=235 maxHeight=350]]', {
             							 /**
             								* Строит экземпляр макета на основе шаблона и добавляет его в родительский HTML-элемент.
             								* @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/layout.templateBased.Base.xml#build
             								* @function
             								* @name build
             								*/
             							 build: function () {
             									 this.constructor.superclass.build.call(this);

             									 this._$element = $('.card', this.getParentElement());

             									 this.applyElementOffset();

             									 this._$element.find('.close')
             											 .on('click', $.proxy(this.onCloseClick, this));
             							 },

             							 /**
             								* Удаляет содержимое макета из DOM.
             								* @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/layout.templateBased.Base.xml#clear
             								* @function
             								* @name clear
             								*/
             							 clear: function () {
             									 this._$element.find('.close')
             											 .off('click');

             									 this.constructor.superclass.clear.call(this);
             							 },

             							 /**
             								* Метод будет вызван системой шаблонов АПИ при изменении размеров вложенного макета.
             								* @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
             								* @function
             								* @name onSublayoutSizeChange
             								*/
             							 onSublayoutSizeChange: function () {
             									 MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);

             									 if(!this._isElement(this._$element)) {
             											 return;
             									 }

             									 this.applyElementOffset();

             									 this.events.fire('shapechange');
             							 },

             							 /**
             								* Сдвигаем балун, чтобы "хвостик" указывал на точку привязки.
             								* @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
             								* @function
             								* @name applyElementOffset
             								*/
             							 applyElementOffset: function () {
             									 this._$element.css({
             											 left: -(this._$element[0].offsetWidth / 2),
             											 top: -(this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight)
             									 });
             							 },

             							 /**
             								* Закрывает балун при клике на крестик, кидая событие "userclose" на макете.
             								* @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/IBalloonLayout.xml#event-userclose
             								* @function
             								* @name onCloseClick
             								*/
             							 onCloseClick: function (e) {
             									 e.preventDefault();

             									 this.events.fire('userclose');
             							 },

             							 /**
             								* Используется для автопозиционирования (balloonAutoPan).
             								* @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/ILayout.xml#getClientBounds
             								* @function
             								* @name getClientBounds
             								* @returns {Number[][]} Координаты левого верхнего и правого нижнего углов шаблона относительно точки привязки.
             								*/
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

             							 /**
             								* Проверяем наличие элемента (в ИЕ и Опере его еще может не быть).
             								* @function
             								* @private
             								* @name _isElement
             								* @param {jQuery} [element] Элемент.
             								* @returns {Boolean} Флаг наличия.
             								*/
             							 _isElement: function (element) {
             									 return element && element[0] && element.find('.arrow')[0];
             							 }
             					 });
             			MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass(
             					//  '<h3 class="popover-title">$[properties.balloonHeader]</h3>' +
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

             	// 	$('#maplist').click(function(){
             	// 		$('#onmap').toggleClass('hidden');
             	// 		$('#listed').toggleClass('hidden');
             	// 		var query = location.search;
             	// 		if($('#onmap').hasClass('hidden')){
                //      // Для уничтожения используется метод destroy.
                //      myMap.destroy();
             	// 			$('#maplist').html("Показать на карте <i class='ion-map h6'></i>");
             	// 		} else {
             	// 			initMap();
             	// 			$('#maplist').html("Показать cписком <i class='ion-grid h6'></i>")
             	// 		}
             	// 	});

             	var queries = {};
             	if(document.location.search.length > 0){
             		$.each(document.location.search.substr(1).split('&'),function(c,q){
             		  var i = q.split('=');
             		  queries[i[0].toString()] = i[1].toString();
             		});
             	}

             	for (var key in queries) {
             		if(key === "road"){
             			$('select[name="road"]').val(queries["road"]);

             		};
             		$('input[name='+ key +']').val(queries[key]).change();
             	};
             	$(document).ready(function() {
             	  $(function() {
             	    $(document).trigger("enhance");
                  initMap();
             	  });
             	});
             	$('#toggleFilters').click(function() {
             	 $('#filter-block').slideToggle();
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
