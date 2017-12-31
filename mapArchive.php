<?php
/**
 * map archive scriptt
 *
 * @package understrap
 */

?>
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
			 var currentpath = window.location.pathname;
			 var pricetype;
			 if (currentpath == "/sale/houses/" || currentpath == "/sale/townhouses/" || currentpath == "/sale/areas/"){
					pricetype = "руб."
			 } else {
				 pricetype = "руб./в мес."
			 };
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
								 	'<div style="background-image:url(' + cords[i].img + ');" class="main-image"></div>',
		 						  '<div class="card-body p-1">',
										'<p class="price mb-2">' + cords[i].price,
										'<span> '+ pricetype +'</span> </p>',
										 '<p class="card-text mb-1"><small>' + cords[i].name + '</small></p>',
										 '<div class="text-center">',
										 '<a class="btn circled btn-sm btn-c-primary btn-block" href=' + cords[i].link + '>Подробнее</a></div>',
		 						  '</div>'
							 ].join('')
	        }, {
						iconLayout: 'default#image',
						// Своё изображение иконки метки.
						iconImageHref: '/wp-content/themes/property-theme/img/point.png',
						// Размеры метки.
						iconImageSize: [25, 48],
						// Смещение левого верхнего угла иконки относительно
						// её "ножки" (точки привязки).
						iconImageOffset: [-11, -28],
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
			var mapstatus = $.query.get("map");
			 if(mapstatus === "true" || mapstatus === undefined){
				 myMap.destroy();
 				$('#maplist').html("Показать на карте <i class='ion-map h6'></i>");
				 location.search = $.query.set("map", "false");
			 } else {
				 initMap();
 				$('#maplist').html("Показать cписком <i class='ion-grid h6'></i>")
				 location.search = $.query.set("map", "true");
			 }
		});

	$(document).ready(function() {
    if($.query.get("map") === "true"){
      initMap();
    };
		$("#filter-block").find("form").attr("action", location.pathname);
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
