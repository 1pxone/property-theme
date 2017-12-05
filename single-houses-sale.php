<?php
/*
Template Name: Single houses-sale
Template Post Type: houses-sale
*/
?>

    <?php get_header(); ?>
    <div class="container-fluid bg-e8">
    <div class="row">

      <div class="col-md-9 mainblock  pr-md-0">
        <div class="card item mt-3 mb-3">
          <div class="lotGallery" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>)">
              
          </div>

            
<!--
            <div class="glr">
            
            <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-fluid col-3 rounded-top" />
            <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-fluid col-3 rounded-top" />
            <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-fluid col-3 rounded-top" />
            <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-fluid col-3 rounded-top" />
            </div>
-->
            
            <script>
                $(document).ready(function(){
 $('.glr').slick({
                  dots: true,
                  infinite: true,
                  speed: 300,
                  slidesToShow: 1,
                  centerMode: true,
                  variableWidth: true
                });
});
		
                
            </script>
            
            <?php the_content(); ?>
          <!-- <img class="card-img-top" src="<?php echo the_post_thumbnail_url(); ?>" alt="Card image cap"> -->
          <div class="card-body productInfo py-2 px-3">
              
            <?php echo get_the_ID();?><br />
            <?php the_title(); ?><br />

            <?php the_field( 'долгота' ); ?><br />
            <?php the_field( 'широта' ); ?><br />
            <?php the_field( 'шоссе' ); ?><br />
            <?php echo the_post_thumbnail_url(); ?><br />
            <?php the_field( 'площадь' ); ?><br />
            <?php the_field( 'price' ); ?><br />
            <?php the_field( 'phone' ); ?><br />
            <?php the_date(); ?><br />
            <h4 class="card-title mb-0 h5"><small><?php the_title(); ?></small></h4>
            <p class="price"><?php the_field('price'); ?></p>
            <span class="address"><small><?php the_field('адрес'); ?></small></span>
            <!-- <div class="d-flex justify-content-between card-bottom"><span class="dateAdded"></span> <button class="btn btn-c-primary circled order">Подробнее</button> </div> -->
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mt-3">
          <img class="card-img-top" src="<?php echo the_post_thumbnail_url(); ?>" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <!-- <a href="#" class="btn btn-primary">Показать номер +7 (916) <span class="num">•••-••-••</span></a> -->
            <?php if( isset($_GET["secret"]) && $_GET["secret"] == "CODE") : ?>
            <span class="num"><?php the_field( 'phone' ); ?></span>
            <?php else : ?>


              <a href="#" class="btn btn-c-primary circled">Показать номер
                <span class="num">+7 (916) XXX-XX-XX</span>
              </a>
          <?php endif ?>
            <span>Платная услуга</span>
          </div>
        </div>
      </div
  </div>
  </div>

             <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
             <script>
              //find max and min in array
              Array.prototype.max = function() {
                return Math.max.apply(null, this);
              };

              Array.prototype.min = function() {
                return Math.min.apply(null, this);
              };
              //?query string
              function getUrlVars(){
                  var vars = [], hash;
                  var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                  for(var i = 0; i < hashes.length; i++)
                  {
                      hash = hashes[i].split('=');
                      vars.push(hash[0]);
                      vars[hash[0]] = hash[1];
                  }
                  return vars;
              };
              var key = getUrlVars();
              console.log(key.key);
              if (key.key === '<?php the_field('secret'); ?>'){
                console.log(true);
                $('.num').html(<?php the_field('phone'); ?>)
              };
              //price filter
              function filterSystem(minPrice, maxPrice) {
                  $("#allHouses div.equalheight").hide().filter(function () {
                      var price = parseInt($(this).data("price"), 10);
                      return price >= minPrice && price <= maxPrice;
                  }).show();
              };
              //sort by price
              function sortByPrice(fromto){
                  var $wrapper = $('#allHouses');
                  switch (fromto) {
                    case "cheapFirst":
                      $wrapper.find('.equalheight').sort(function (a, b) {
                          return +a.dataset.price - +b.dataset.price;
                      })
                      .appendTo( $wrapper );
                      break;
                    case "expensiveFirst":
                      $wrapper.find('.equalheight').sort(function (a, b) {
                          return +b.dataset.price - +a.dataset.price;
                      })
                      .appendTo( $wrapper );
                      break;
                    default:
                      break;
                  }
              };
              // $('.btn-def-border').on('click', function(e){
              //
              //   $.each($(this), function() {
              //     var that = $(this);
              //     if ($(this).hasClass('btn-toggled')){
              //         that.toggleClass('btn-toggled btn-untoggled');
              //     }
              //     });
              //     function toggleActive(){
              //       $(this).toggleClass('btn-toggled btn-untoggled')
              //     };
              //     setTimeout(toggleActive,1000);
              //   });
              $('#expensiveFirst').on('click', function(e){
                sortByPrice("expensiveFirst");
                if($(this).hasClass('btn-toggled')){

                } else {
                  $(this).toggleClass('btn-toggled btn-untoggled');
                  if($('#cheapFirst').hasClass('btn-toggled')){
                    $('#cheapFirst').toggleClass('btn-toggled btn-untoggled');
                  } else if ($('#byDate').hasClass('btn-toggled')){
                    $('#byDate').toggleClass('btn-toggled btn-untoggled');
                  };

                }
              });
              $('#cheapFirst').on('click', function(e){
                sortByPrice("cheapFirst");
                if($(this).hasClass('btn-toggled')){

                } else {
                  $(this).toggleClass('btn-toggled btn-untoggled');
                  if($('#expensiveFirst').hasClass('btn-toggled')){
                    $('#expensiveFirst').toggleClass('btn-toggled btn-untoggled');
                  } else if ($('#byDate').hasClass('btn-toggled')){
                    $('#byDate').toggleClass('btn-toggled btn-untoggled');
                  };

                }
              });

              //area range slider
              $('#areaRange').ionRangeSlider({
                   type: "double",
                   min: 20,
                   max: 400,
                   grid: true,
                   onChange: function (data) {
                       console.log(data.to);
                   },
               });
               var prices = [];
               $.each($('.equalheight'),function(){
                 var date = $(this).attr('date').replace(/\./g, "");
                 var price = $(this).attr('data-price').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ')
                 $(this).find('.dateAdded').html(moment(date, "DDMMYYYY").fromNow());
                 $(this).find('.price').html(price + " руб.");
                 prices.push($(this).attr('data-price'));
                 console.log(moment(date, "DDMMYYYY").fromNow());
               });
               //price range slider
               $('#priceRange').ionRangeSlider({
                    type: "double",
                    min: prices.min(),
                    max: prices.max(),
                    grid: true,
                    onChange: function (data) {
                        console.log(data.to);
                        filterSystem(data.from, data.to);
                    },
                });








             function hideFilters() {
               $('#filters').addClass('hidden');
               $('#filters').removeClass('animated fadeOut');
               $('#filters').find('.filter-col').removeClass('animated slideOutLeft')
             };
              function hideMap() {
                $('#allHouses').toggleClass('hidden animated fadeIn');
                $('#mapWrapper').removeClass('animated fadeOut');
                $('#mapWrapper').toggleClass('hidden');
              };
              $('#toggleMap').on('click', function(){
                // $('#mapWrapper').toggleClass('hidden animated fadeIn');
                if($('#mapWrapper').hasClass('hidden')){
                  $('#toggleMap').html('Списком <i class="fa fa-list" aria-hidden="true"></i>');
                  $('#allHouses').removeClass('animated fadeIn');
                  $('#mapWrapper').toggleClass('hidden animated fadeIn');
                  $('#allHouses').toggleClass('hidden');

                } else {
                  $('#toggleMap').html('На карте <i class="fa fa-map-marker" aria-hidden="true"></i>');
                  $('#mapWrapper').toggleClass('fadeIn fadeOut');
                  $('#allHouses').toggleClass('hidden animated fadeIn');
                  $('#mapWrapper').removeClass('animated fadeOut');
                  $('#mapWrapper').toggleClass('hidden');
                  // setTimeout(hideMap, 500);
                }

              });
             $('.toggleFilters').on('click', function(){
               if($('#filters').hasClass('hidden')){
                 $('#filters').toggleClass('hidden animated fadeIn');
                 $('#main-page').toggleClass('blured');
                 $('body').toggleClass('overflowhidden');
                 $('#filters').find('.filter-col').toggleClass('animated slideInLeft')
               } else {
                 $('#filters').find('.filter-col').toggleClass('slideInLeft slideOutLeft')
                 $('#filters').toggleClass('fadeIn fadeOut');
                 $('#main-page').toggleClass('blured');
                 $('body').toggleClass('overflowhidden');
                 setTimeout(hideFilters, 500);
               }

             });
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
                obj.cords.push(that.attr('lon'),that.attr('lat'));
                obj.name = that.attr('data');
                obj.link = that.attr('link');
                obj.img = that.attr('img');
                cords.push(obj);
                console.log(cords);
              }
             );
            ymaps.ready(init);
            function init() {
              var myMap = new ymaps.Map("map", {
                      center: [55.76, 37.64],
                      zoom: 10
                  }, {
                      searchControlProvider: 'yandex#search'
                  });
                for(var i = 0; i<cords.length; i++){
                myMap.geoObjects
                .add(new ymaps.Placemark(

                    cords[i].cords, {
                      // balloonContent: cords[0].name

                      balloonContentHeader: "Балун метки",
                      // balloonContentBody: "Содержимое <em>балуна</em> метки",
                      balloonContentFooter: "Подвал",
                      hintContent: "Хинт метки",
                      balloonContentBody: [
                        //  '<address>',
                         '<img class="img-fluid" width="30%" src=' + cords[i].img + ' />',
                         '<br /><strong>' + cords[i].name + '</strong>',
                         '<br/>',
                         'Адрес: 119021, Москва, ул. Льва Толстого, 16',
                         '<br/>',
                         '<a class="btn circled btn-c-primary" href=' + cords[i].link + '>ПОДРОБНЕЕ</a>',
                        //  '</address>'
                     ].join('')
                  }, {
                      preset: 'islands#icon',
                      iconColor: '#0095b6'
                  }

                )
              )};
              }
             </script>
             <style>
                 html, .map, #map {
                     width: 100%; height: 100%; padding: 0; margin: 0;
                 }
                 div#map {
                    height: 70vh;
                }
             </style>
             <div class="map hidden" id="mapWrapper">
               <div id="map"></div>
             </div>
   </div>
            <?php get_footer(); ?>
                <!-- Ваш файл footer.php -->
