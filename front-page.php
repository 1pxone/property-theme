<?php
/*
Template Name: Главная
*/
?>

    <?php get_header(); ?>



<div class="container-fluid" id="points">
  <div class="container text-center text-white pt-md-5">
    <div class="row pt-md-5 mt-md-5">
      <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
          <i class="pointicon flaticon-house-1"></i>
        <h5 class="mt-2">Первый сайт загородной недвижимости строго без риелторов.</h5>
      </div>
      <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
          <i class="pointicon flaticon-wallet"></i>
        <h5 class="mt-2">Комиссия риелтору остается в вашем кармане.</h5>
      </div>
      <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
          <i class="pointicon flaticon-house"></i>
        <h5 class="mt-2">Вы общаетесь с собственником напрямую без посредников.</h5>
      </div>
    </div>
    <div class="row mt-md-5">
        <div class="col-12 col-sm-12 col-lg-2 col-xl-2">
      </div>
      <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
          <i class="pointicon flaticon-house-4"></i>
        <h5 class="mt-2">Мы регулярно обновляем базу самостоятельно.</h5>
      </div>
      <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
          <i class="pointicon flaticon-piggy-bank"></i>
        <h5>Размещение объявления бесплатно.</h5>
      </div>
    </div>
    <div class="row py-md-5">
      <div class="mt-5" id="querybar">
        <div id="querywrapper">
          <div class="input-group ">
              <select  class="form-control form-control-lg mr-2"  name="for" id="_whatfor">
                  <?php $whatfor = array(
                         "sale" => "Купить",
                         "rent" => "Снять"
                      );
                  foreach($whatfor as $key => $val): ?>
                      <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                  <?php endforeach; ?>
              </select>
              <select  class="form-control form-control-lg mr-2"  name="type" id="_type">
                  <?php $types = array(
                         "houses" => "Дом",
                         "areas" => "Участок",
                         "townhouses" => "Таунхаус"
                      );
                  foreach($types as $key => $val): ?>
                      <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                  <?php endforeach; ?>
              </select>
            <input type="text" class="form-control form-control-lg rounded-left" aria-label="Text input with dropdown button" placeholder="от, руб." id="_priceFrom">
            <input type="text" class="form-control form-control-lg mr-2 rounded-right" aria-label="Text input with dropdown button" placeholder="до, руб." id="_priceTo">
              <select  class="form-control form-control-lg"  name="road" id="_road">
                  <option value="" disabled selected>Шоссе</option>
                  <?php $roads= array(
                         "Алтуфьевское",
                         "Боровское шоссе",
                          "Варшавское",
                          "Волоколамское",
                          "Дмитровское",
                          "Ильинское",
                          "Калужское",
                          "Каширское",
                          "Киевское",
                          "Куркинское",
                          "Ленинградское",
                          "Минское",
                          "Можайское",
                          "Новорижское",
                          "Новорязанское",
                          "Осташковское",
                          "Пятницкое",
                          "Рублево-Успенское",
                          "Симферопольское",
                          "Сколковское",
                          "Ярославское"
                      );
                  foreach($roads as $key): ?>
                      <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                  <?php endforeach; ?>
              </select>
            <br />
          </div>
        </div>
        <div class="row">
          <div class="col-6 text-left text-white" id="populars">
            <a href="#">Дома до 5 млн.</a><br />
            <a href="#">Участки по Новой риге</a>
          </div>
          <div class="col-6">
            <div class="d-inline float-right">
              <a href="/sale/houses?map=true" class="btn btn-c-primary btn-lg mr-1" id="_mapSearch">Показать на карте <i class="ion-ios-location"></i></a>
              <a href="/sale/houses" class="btn btn-c-primary btn-lg" id="_search">Поиск <i class="ion-android-search"></i></a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<script>
  // inputs
  var _type = $('#_type');
  var _whatfor = $('#_whatfor');
  var _priceFrom = $('#_priceFrom');
  var _priceTo = $('#_priceTo');
  var _road = $('#_road');
  // query args
  var q_type = "houses";
  var q_whatfor = "sale";
  var q_priceFrom = "";
  var q_priceTo = "";
  var q_road = "";
  // targets
  var t_search = $("#_search");
  var t_mapSearch = $("#_mapSearch");

  _type.change(function(){
    q_type = $(this).val();
    makeQuery();
  });
  _whatfor.change(function(){
    q_whatfor = $(this).val();
    makeQuery();
  });
  _priceFrom.change(function(){
    q_priceFrom = $(this).val();
    makeQuery();
  });
  _priceTo.change(function(){
    q_priceTo = $(this).val();
    makeQuery();
  });
  _road.change(function(){
    q_road = $(this).val();
    makeQuery();
  });

  function makeQuery(){
      t_search.attr("href", `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}`);
      t_mapSearch.attr("href", `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}&map=true`);
      return `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}`
  }

</script>
</div>
<div class="container-fluid py-5" id="detailed">
  <div class="container">
    <?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
      <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"><?php the_content(); ?></div>
      <?php } /* конец while */ ?>
    <?php  }  else echo "<h2>Записей нет.</h2>";?>
  </div>
</div>

<div class="container-fluid bg-e8 py-5" id="main-page">
  <div class="container" id="main-page">
      <div class="col-12 px-0">
           <h2 class="pb-3 fw-slim h1">Последние предложения</h2>
      </div>
</div>
  <div class="container" id="main-page">
  <div class="row pt-3 pb-3 p-3">
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
  </div>
<!--</div>-->

             <script>
            //  $("")
              //find max and min in array
              Array.prototype.max = function() {
                return Math.max.apply(null, this);
              };

              Array.prototype.min = function() {
                return Math.min.apply(null, this);
              };


              function hideMap() {
                $('#filterresult').toggleClass('hidden animated fadeIn');
                $('#mapWrapper').removeClass('animated fadeOut');
                $('#mapWrapper').toggleClass('hidden');
              };
              $('#toggleMap').on('click', function(){
                // $('#mapWrapper').toggleClass('hidden animated fadeIn');
                if($('#mapWrapper').hasClass('hidden')){
                  $('#toggleMap').html('Списком <i class="fa fa-list" aria-hidden="true"></i>');
                  $('#filterresult').removeClass('animated fadeIn');
                  $('#mapWrapper').toggleClass('hidden animated fadeIn');
                  $('#filterresult').toggleClass('hidden');
                  initMap();
                } else {
                  $('#toggleMap').html('На карте <i class="fa fa-map-marker" aria-hidden="true"></i>');
                  $('#mapWrapper').toggleClass('fadeIn fadeOut');
                  $('#filterresult').toggleClass('hidden animated fadeIn');
                  $('#mapWrapper').removeClass('animated fadeOut');
                  $('#mapWrapper').toggleClass('hidden');
                  // setTimeout(hideMap, 500);
                }

              });

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
                  obj.cords.push(that.attr('lon'),that.attr('lat'));
                  obj.name = that.attr('data');
                  obj.link = that.attr('link');
                  obj.img = that.attr('img');
                  cords.push(obj);
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
              };
             </script>


            <?php get_footer(); ?>
                <!-- Ваш файл footer.php -->
