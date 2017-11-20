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

<div class="wrapper" id="archive-wrapper">
	<?php get_template_part( 'filter-templates/townhouses-rent-bar' ); ?>
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<?php get_template_part( 'filter-templates/houses-filters' ); ?>

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">
				<div id="filterresult" class="row bg-e8" >
					<div class="col-12 px-0 <?php if (isset($_GET['map']) && $_GET['map'] == TRUE ){echo "";} else {echo "hidden";} ?>" id="onmap">
						<div id="map"></div>
					</div>
					<div class="col-12 <?php if (isset($_GET['map']) && $_GET['map'] == TRUE ){echo "hidden";} else {echo "s";} ?> mt-3" id="listed">

						<div class="row px-2">
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'loop-templates/townhouses', get_post_format() );?>
								<?php endwhile; ?>
							<?php else : ?>
								<?php get_template_part( 'loop-templates/townhouses', 'none' ); ?>
							<?php endif; ?>
						</div>
					</div>
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
	var myMap;
	String.prototype.trimRight=function(){
		  var r=/\s+$/g;
		  return this.replace(r,'');
		};
	function initMap(){

		 var cords = [];
		 $.each($('.equalheight'),function(){
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

			myMap = new ymaps.Map("map", {
							center: [55.76, 37.64],
							zoom: 10,
							controls: [],
					});
					myMap.controls
			    .add('zoomControl')
			    .add('typeSelector');
					for(var i = 0; i<cords.length; i++){
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
										 '<a class="btn circled btn-sm btn-more btn-block" href=' + cords[i].link + '>Подробнее</a></div>',
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
		$('#maplist').click(function(){
			$('#onmap').toggleClass('hidden');
			$('#listed').toggleClass('hidden');
			var query = location.search;
			if($('#onmap').hasClass('hidden')){
        // Для уничтожения используется метод destroy.
        myMap.destroy();
				$('#maplist').html("Показать на карте <i class='ion-map h6'></i>");
			} else {
				initMap();
				$('#maplist').html("Показать cписком <i class='ion-grid h6'></i>")
			}
		});

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
				height: 80vh;
				z-index: 22;
				position: absolute;
		}
 </style>
 <!-- <div class="map " id="mapWrapper">

 </div> -->
<?php get_footer(); ?>
