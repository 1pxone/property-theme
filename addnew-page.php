<?php /* Template Name: Add new */ ?>

<?php get_header(); ?>
<?php if(isset($_GET['status']) && $_GET['status'] == 'done') : ?>
  <div class="bg-e8 fw-400 whenDone">
      <div class="container pt-5 ">
        <div class="row">
            <div class="col-12">
              <?php if(isset($_GET['t']) && $_GET['t'] == 'houses') : ?>
                <h5>Ваше объявление об <strong>аренде дома</strong> создано и проверяется модераторами.</h5>
              <?php elseif( isset($_GET['t']) && $_GET['t'] == 'houses-sale') : ?>
                <h5>Ваше объявление о <strong>продаже дома</strong> создано и проверяется модераторами.</h5>
              <?php elseif( isset($_GET['t']) && $_GET['t'] == 'townhouses') : ?>
                <h5>Ваше объявление об <strong>аренде таунхауса</strong> создано и проверяется модераторами.</h5>
              <?php elseif( isset($_GET['t']) && $_GET['t'] == 'townhouses-sale') : ?>
                <h5>Ваше объявление о <strong>продаже таунхауса</strong> создано и проверяется модераторами.</h5>
              <?php elseif( isset($_GET['t']) && $_GET['t'] == 'areas') : ?>
                <h5>Ваше объявление об <strong>аренде участка</strong> создано и проверяется модераторами.</h5>
              <?php elseif( isset($_GET['t']) && $_GET['t'] == 'areas-sale') : ?>
                <h5>Ваше объявление о <strong>продаже участка</strong> создано и проверяется модераторами.</h5>
              <?php endif; ?>
            </div>
            <div class="col-12">
              <a href="/" class="btn btn-sm circled btn-more fw-100 px-3">Вернуться на главную</a>
              <a class="btn btn-sm circled btn-more fw-100 px-3" href="/create">Разместить еще одно объявление <i class="ion-plus h6"></i></a>
            </div>
        </div>
    </div>
  </div>
<?php else : ?>
  <div class="bg-e8 fw-400" id="createDiv">
    <form id="createForm">
      <div class="container pt-5 ">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
              <?php get_template_part( 'form-templates/person' ); ?>
            </div>
            <div class="col-12 mb-3 d-block d-md-none">
              <hr>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="createWrapper">
              <div class="row" >
                <div class="col-12 mb-3">
                    <label for="exampleFormControlTextarea1">Выберите категорию Вашего объявления:</label>
                  <div class="form-group" id="prop_type_wrapper">
                      <div class="btn-group w-100 wborder bg-white" data-toggle="buttons">
                        <label class="btn btn-inactive active circled w-100" id="showHouseForm">
                            <input type="radio" name="prop_type" id="prop_type0" autocomplete="off" value="0" checked>Дом
                        </label>
                        <label class="btn btn-inactive circled w-100" id="showTownHouseForm">
                            <input type="radio" name="prop_type" id="prop_type1" autocomplete="off" value="1">Таунхаус
                        </label>
                        <label class="btn btn-inactive circled w-100" id="toggleForm">
                            <input type="radio" name="prop_type" id="prop_type2" autocomplete="off" value="2">Участок
                        </label>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <label for="exampleFormControlTextarea1">Выберите тип Вашего объявления:</label>
                  <div class="form-group" id="sell_type_wrapper">
                      <div class="btn-group w-100 wborder bg-white" data-toggle="buttons">
                        <label class="btn btn-inactive active circled w-100">
                            <input type="radio" name="sell_type" id="sell_type0" autocomplete="off" value="0" checked>Продажа
                        </label>
                        <label class="btn btn-inactive circled w-100">
                            <input type="radio" name="sell_type" id="sell_type1" autocomplete="off" value="1">Аренда
                        </label>
                    </div>
                  </div>
                </div>
              </div>
              <?php get_template_part( 'form-templates/house' ); ?>
            </div>
          </div>
      </div>
    </form>
    <?php get_template_part( 'form-templates/area' ); ?>
    <form method="post" id="submitMe" class="hidden">
      <p><label for="cptTitle"><?php _e('Enter the Post Title:', 'mytextdomain') ?></label>
      <input type="text" name="cptTitle" id="cptTitle" /></p>
      <p> <label for="cptContent"><?php _e('Enter Some Content:', 'mytextdomain') ?></label>
      <textarea name="cptContent" id="cptContent" rows="4" cols="20"></textarea> </p>
      <button type="submit"><?php _e('Submit', 'mytextdomain') ?></button>
      <input type="hidden" name="cpt_post_type" id="post_type" value="houses" />
      <?php wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ); ?>
    </form>
  </div>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
  <script>
  var cur = 0;
  var photoCount = 15;
  function readURL(input) {
    cur++;
    if(photoCount >= cur){
       var reader = new FileReader();
       reader.onload = function (e) {
         var elem = `<div class="col-4"><label for="uploadbtn${cur}" class="uploadButton pt-5"><i class="ion-camera h1 pt-5"></i></label><input type="hidden" name="uploadImg${cur}" id="uploadImg${cur}" value=""><input style="opacity: 0; z-index: -1;" type="file" name="upload" id="uploadbtn${cur}" onchange="readURL(this);" class="w-0"></div>`;
         $(input).prev().prev()
             .css('background-image',`url(${e.target.result})`)
             .css('color',`transparent`);
         $(input).prev().val(e.target.result);
         if(cur < photoCount){
           $( ".photoRow" ).append( elem );
         }
       };
       reader.readAsDataURL(input.files[0]);
     }
   };
    $("#toggleMap").click(function(){
      $(this).attr("disabled", "disabled")
        $("#map").slideDown(0)
        ymaps.ready(init);
    });

    function init() {
        var myPlacemark,
            myMap = new ymaps.Map('map', {
                center: [55.753994, 37.622093],
                zoom: 9
            }, {
                searchControlProvider: 'yandex#search'
            });

        // Слушаем клик на карте.
        myMap.events.add('click', function(e) {
            var coords = e.get('coords');
            console.log(coords);
            $("#latitude").val(coords[0]);
            $("#longitude").val(coords[1]);
            $('#coords').val(coords);
            // Если метка уже создана – просто передвигаем ее.
            if (myPlacemark) {
                myPlacemark.geometry.setCoordinates(coords);
            }
            // Если нет – создаем.
            else {
                myPlacemark = createPlacemark(coords);
                myMap.geoObjects.add(myPlacemark);
                // Слушаем событие окончания перетаскивания на метке.
                myPlacemark.events.add('dragend', function() {
                    getAddress(myPlacemark.geometry.getCoordinates());
                });
            }
            getAddress(coords);
        });

        // Создание метки.
        function createPlacemark(coords) {
            return new ymaps.Placemark(coords, {
                iconCaption: 'поиск...'
            }, {
                preset: 'islands#violetDotIconWithCaption',
                draggable: true
            });
        }

        // Определяем адрес по координатам (обратное геокодирование).
        function getAddress(coords) {
            myPlacemark.properties.set('iconCaption', 'поиск...');
            ymaps.geocode(coords).then(function(res) {
                var firstGeoObject = res.geoObjects.get(0);
                console.log(firstGeoObject.getAddressLine());
                $('#address').val(firstGeoObject.getAddressLine());
                myPlacemark.properties
                    .set({
                        // Формируем строку с данными об объекте.
                        iconCaption: [
                            // Название населенного пункта или вышестоящее административно-территориальное образование.
                            firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                            // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                            firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                        ].filter(Boolean).join(', '),
                        // В качестве контента балуна задаем строку с адресом объекта.
                        balloonContent: firstGeoObject.getAddressLine()
                    });
            });
        }
    };
  </script>
  <style>
      html,
      .map,
      #map {
          width: 100%;
          height: 100%;
          padding: 0;
          margin: 0;
      }
      div#map {
          height: 50vh;
      }
  </style>

  <script>
  var post_types = {
    00:"houses-sale",
    01:"houses",
    10:"townhouses-sale",
    11:"townhouses",
    20:"areas-sale",
    21:"areas"
  };
  var postType = 00;
  var propType = 0;
  var sellType = 0;
  var hf = $("#house_form");
  var af = $("#area_form");

  $("#toggleForm").on("click", function(){
      hf.detach();
      af.appendTo($("#createWrapper"));
      if(af.hasClass("hidden")){
        af.removeClass("hidden");
      }

  });

  $("#showHouseForm").on("click", function(){
      af.detach();
      hf.appendTo($("#createWrapper"));
      if(!af.hasClass("hidden")){
        af.addClass("hidden");
      }
  });
  $("#showTownHouseForm").on("click", function(){
      af.detach();
      hf.appendTo($("#createWrapper"));
      if(!af.hasClass("hidden")){
        af.addClass("hidden");
      }
  });

  $("#prop_type_wrapper label").on("click", function(){
    propType = $(this).find("input").val();
    postType = `${propType}${sellType}`;
  });

  $("#sell_type_wrapper label").on("click", function(){
    sellType = $(this).find("input").val();
    postType = `${propType}${sellType}`;
  });

  $( "#createForm" ).on( "submit", function(e){
    e.preventDefault();
    var data = [],
        serialized = $( this ).serializeArray(),
        imgs = "",
        newData = "",
        regexp = /(uploadImg)\d{1,2}/g;
    function makeImg(data){
      imgs = imgs + `<img src=${data} width="200px"/>`;
    };
    function makeData(name,data){
      newData = newData + `<p>${name}: <b>${data}</b></p><br/>`;
    };
    for (var i=0; i<serialized.length; i++) {
      if (regexp.test(serialized[i].name) && serialized[i].value){
        makeImg(serialized[i].value);
      } else if(serialized[i].value != "") {
        makeData(serialized[i].name, serialized[i].value);
      }
    };
    var tpl = `<div>${newData}<hr />${imgs}</div>`;
    $("#post_type").val(post_types[postType*1]);
    $("#cptContent").val(tpl);
    $("#submitMe").submit();
  });
  </script>
<?php endif; ?>


<?php get_footer(); ?>
<!-- Ваш файл footer.php -->
