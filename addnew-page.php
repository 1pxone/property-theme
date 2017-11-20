<?php
/*
Template Name: Add new
*/
?>

    <?php get_header(); ?>
    <div class="container-fluid pt-5 bg-e8">
    <div class="row pr-0">
      <div class="col-md-6">
        <p>
          Количество этажей:
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-more active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked>1
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option2" autocomplete="off">2
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option3" autocomplete="off">3
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option4" autocomplete="off">4+
          </label>
        </div>
        <p>
          Количество спален:
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-more active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked>1
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option2" autocomplete="off">2
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option3" autocomplete="off">3
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option4" autocomplete="off">4+
          </label>
        </div>
        <p>
          Количество санузлов:
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-more active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked>1
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option2" autocomplete="off">2
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option3" autocomplete="off">3
          </label>
          <label class="btn btn-more">
            <input type="radio" name="options" id="option4" autocomplete="off">4+
          </label>
        </div>
        <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      <div class="col-md-6">
        <p class="ml-5">
          Количество санузлов
        </p>
        <div class="btn-group ml-5">
            <button class="btn btn-success">1</button>
            <button class="btn btn-success">2</button>
            <button class="btn btn-success">3</button>
            <button class="btn btn-success">4</button>
            <button class="btn btn-success">5</button>
            <button class="btn btn-success">6</button>
            <input type="number" class="form-control"/>
        </div>
        <br />
        <p class="ml-5">
          Количество спален
        </p>
        <div class="btn-group ml-5">
            <button class="btn btn-success">1</button>
            <button class="btn btn-default">2</button>
            <button class="btn btn-default">3</button>
            <button class="btn btn-default">4</button>
            <button class="btn btn-default">5</button>
            <button class="btn btn-default">6</button>
            <input type="number" class="form-control"/>
        </div>
        <?php echo do_shortcode( '[contact-form-7 id="32" title="addnew"]' );?>
      </div>
      <div class="col-md-6">
 <div id="map"></div>
      </div>
              </div>
            </div>
             <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
             <script>

             ymaps.ready(init);

 function init() {
     var myPlacemark,
         myMap = new ymaps.Map('map', {
             center: [55.753994, 37.622093],
             zoom: 9
         }, {
             searchControlProvider: 'yandex#search'
         });

     // Слушаем клик на карте.
     myMap.events.add('click', function (e) {
         var coords = e.get('coords');
         console.log(coords);
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
             myPlacemark.events.add('dragend', function () {
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
         ymaps.geocode(coords).then(function (res) {
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

             </div>

            <?php get_footer(); ?>
                <!-- Ваш файл footer.php -->
