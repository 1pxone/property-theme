<?php
/*
Template Name: Главная
*/
?>

    <?php get_header(); ?>



<div class="container-fluid" id="points">
  <div class="container text-center text-white pt-md-5">
    <div class="row ">
      <p class="main-phrase">
        ЗАГОРОДНАЯ НЕДВИЖИМОСТЬ <br>СТРОГО БЕЗ РИЕЛТОРОВ
      </p>
    </div>
    <div class="row mt-md-5 d-none d-md-flex">
      <div class="col-12 col-sm-6 col-lg-4 col-xl-4 d-flex d-sm-block">
          <i class="pointicon flaticon-house-1"></i>
        <h5 class="mt-2">Размещайте объявление совершенно бесплатно</h5>
      </div>
      <div class="col-12 col-sm-6 col-lg-4 col-xl-4 d-flex d-sm-block">
          <i class="pointicon flaticon-wallet"></i>
        <h5 class="mt-2">Только проверенные контакты владельцев недвижимости</h5>
      </div>
      <div class="col-12 col-sm-6 col-lg-4 col-xl-4 d-flex d-sm-block">
          <i class="pointicon flaticon-house"></i>
        <h5 class="mt-2">Работаем без посредников</h5>
      </div>
    </div>
    <div class="row mt-md-5 d-none d-md-flex">
        <div class="col-6 col-sm-6 col-lg-2 col-xl-2 d-none d-lg-block">
      </div>
      <div class="col-12 col-sm-6 col-lg-4 col-xl-4 d-flex d-sm-block">
          <i class="pointicon flaticon-house-4"></i>
        <h5 class="mt-2">Надежная защита от навязчивых риэлторов с помощью спам-фильтра</h5>
      </div>
      <div class="col-12 col-sm-6 col-lg-4 col-xl-4 d-flex d-sm-block">
          <i class="pointicon flaticon-piggy-bank"></i>
        <h5>Поможем оформить сделку в кратчайшие сроки</h5>
      </div>
    </div>
    <div class="row py-5">
      <div class="d-none d-md-block" id="querybar">
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
            <!-- <a href="#">Дома до 5 млн.</a><br />
            <a href="#">Участки по Новой риге</a> -->
          </div>
          <div class="col-6">
            <div class="d-inline float-right">
              <a href="/sale/houses?map=true" class="btn btn-c-primary btn-lg mr-1" id="_mapSearch">Показать на карте <i class="ion-ios-location"></i></a>
              <a href="/sale/houses" class="btn btn-c-primary btn-lg" id="_search">Поиск <i class="ion-android-search"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!--  mobile search-->
      <div class="mt-5 d-block d-md-none d-lg-none  d-xl-none" id="querybar_mobile">
        <div id="querywrapper_mobile">
          <div class="row">
            <div class="col-6  pr-2">
              <select  class="form-control form-control-lg mr-2"  name="for" id="_whatfor_mobile">
                  <?php $whatfor = array(
                         "sale" => "Купить",
                         "rent" => "Снять"
                      );
                  foreach($whatfor as $key => $val): ?>
                      <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <div class="col-6 pl-2">
              <select  class="form-control form-control-lg mr-2"  name="type" id="_type_mobile">
                  <?php $types = array(
                         "houses" => "Дом",
                         "areas" => "Участок",
                         "townhouses" => "Таунхаус"
                      );
                  foreach($types as $key => $val): ?>
                      <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-sm btn-link" id="moreParamsBtn">Больше параметров <i class="ion-ios-arrow-down"></i></button>
            </div>
            <div id="moreParams" class="row mt-2" style="display:none;">
              <div class="col-12">
                <label>Цена, руб.:</label>
              </div>
            <div class="col-6 pr-2">
              <input type="text" class="form-control form-control-lg rounded-left" aria-label="Text input with dropdown button" placeholder="от, руб." id="_priceFrom_mobile">
            </div>
            <div class="col-6 pl-2">
            <input type="text" class="form-control form-control-lg mr-2 rounded-right" aria-label="Text input with dropdown button" placeholder="до, руб." id="_priceTo_mobile">
          </div>
            <div class="col-12 mt-3">
              <select  class="form-control form-control-lg"  name="road" id="_road_mobile">
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
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-12">
              <a href="/sale/houses" class="btn btn-lg btn-block w-100 btn-c-primary" id="_search_mobile">Поиск <i class="ion-android-search"></i></a>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
<div class="container-fluid py-5" id="detailed">
  <div class="container">
    <?php if( have_posts() ){ while( have_posts() ){ the_post(); ?>
      <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"><?php the_content(); ?></div>
      <?php } /* конец while */ ?>
    <?php  }  else echo "";?>
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
  <script>
    var paramsToggled = false;
    $("#moreParamsBtn").click(function() {
      paramsToggled = !paramsToggled;
      if(paramsToggled){
        $(this).html(`Меньше параметров <i class="ion-ios-arrow-up"></i>`)
      }else{
        $(this).html(`Больше параметров <i class="ion-ios-arrow-down"></i>`)
      }
      $("#moreParams").slideToggle(300);
    });
    // inputs
    var _type = $('#_type');
    var _whatfor = $('#_whatfor');
    var _priceFrom = $('#_priceFrom');
    var _priceTo = $('#_priceTo');
    var _road = $('#_road');

    var _type_mobile = $('#_type_mobile');
    var _whatfor_mobile = $('#_whatfor_mobile');
    var _priceFrom_mobile = $('#_priceFrom_mobile');
    var _priceTo_mobile = $('#_priceTo_mobile');
    var _road_mobile = $('#_road_mobile');
    // query args
    var q_type = "houses";
    var q_whatfor = "sale";
    var q_priceFrom = "";
    var q_priceTo = "";
    var q_road = "";
    // targets
    var t_search = $("#_search");
    var t_mapSearch = $("#_mapSearch");

    var t_search_mobile = $("#_search_mobile");
    var t_mapSearch_mobile = $("#_mapSearch_mobile");

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
    _type_mobile.change(function(){
      q_type = $(this).val();
      makeQuery();
    });
    _whatfor_mobile.change(function(){
      q_whatfor = $(this).val();
      makeQuery();
    });
    _priceFrom_mobile.change(function(){
      q_priceFrom = $(this).val();
      makeQuery();
    });
    _priceTo_mobile.change(function(){
      q_priceTo = $(this).val();
      makeQuery();
    });
    _road_mobile.change(function(){
      q_road = $(this).val();
      makeQuery();
    });

    function makeQuery(){
        t_search.attr("href", `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}`);
        t_mapSearch.attr("href", `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}&map=true`);
        t_search_mobile.attr("href", `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}`);
        // t_mapSearch_mobile.attr("href", `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}&map=true`);
        return `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}`
    }
  </script>
<?php get_footer(); ?>
