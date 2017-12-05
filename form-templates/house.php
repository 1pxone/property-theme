<?php
/**
 * add house tpl
 *
 * @package understrap
 */

?>
      <div class="row" id="house_form">
        <div class="col-12 col-sm-6 mb-3">
          <div class="form-group mt-3">
            <label>Количество этажей:</label>
          <div class="btn-group w-100" data-toggle="buttons">
              <label class="btn btn-inactive active w-100">
                  <input type="radio" name="floors" id="floor0" autocomplete="off" value="0 этажей" checked>0
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="floors" id="floor1" autocomplete="off" value="1 этаж" >1
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="floors" id="floor2" autocomplete="off" value="2 этажа">2
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="floors" id="floor3" autocomplete="off" value="3 этажа">3
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="floors" id="floor4" autocomplete="off" value="4+ этажа">4+
              </label>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 mb-3">
        <div class="form-group mt-3">
          <label>Количество спален:</label>
          <div class="btn-group w-100" data-toggle="buttons">
            <label class="btn btn-inactive active w-100">
                <input type="radio" name="bedrooms" id="bedroom0" autocomplete="off" value="нет спален" checked>0
            </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="bedrooms" id="bedroom1" autocomplete="off" value="1 спальня" >1
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="bedrooms" id="bedroom2" autocomplete="off" value="2 спальни">2
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="bedrooms" id="bedroom3" autocomplete="off" value="3 спальни">3
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="bedrooms" id="bedroom4" autocomplete="off" value="4+ спальни">4+
              </label>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
          <label>Количество санузлов:</label>
            <div class="btn-group w-100" data-toggle="buttons">
              <label class="btn btn-inactive active w-100">
                  <input type="radio" name="toilets" id="toilet0" autocomplete="off" value="нет санузлов" checked>0
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="toilets" id="toilet1" autocomplete="off" value="1 санузел">1
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="toilets" id="toilet2" autocomplete="off" value="2 санузла">2
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="toilets" id="toilet3" autocomplete="off" value="3 санузла">3
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio" name="toilets" id="toilet4" autocomplete="off" value="4+ санузла">4+
              </label>
          </div>
        </div>
        <div class="form-group mt-3">
          <label>Подвал:</label>
          <div class="btn-group w-100" data-toggle="buttons">
              <label class="btn btn-inactive active w-100">
                  <input type="radio"  name="basement" autocomplete="off" value="Нет" checked>Нет
              </label>
              <label class="btn btn-inactive  w-100">
                  <input type="radio"  name="basement" autocomplete="off" value="Да" >Да
              </label>
          </div>
        </div>
        <div class="form-group mt-3">
          <label>Кондиционер:</label>
          <div class="btn-group w-100" data-toggle="buttons">

              <label class="btn btn-inactive active w-100">
                  <input type="radio"  name="conditioner" autocomplete="off" value="Нет" checked>Нет
              </label>
              <label class="btn btn-inactive w-100">
                  <input type="radio"  name="conditioner" autocomplete="off" value="Да">Да
              </label>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <label for="material">Материал постройки:</label><br/>
              <?php $material= array(
                      "Дерево",
                      "Кирпич",
                      "Камень",
                      "Брус",
                      "Сруб",
                      "Бетон",
                      "Газобетонные блоки",
                      "Фанера",
                      "Металл",
                      "Сэндвич-панели"
                  );
              foreach($material as $key): ?>
                   <div class="btn-group mb-1" data-toggle="buttons">
                   <label class="btn btn-inactive ">
                       <input type="checkbox" class="" name="material" autocomplete="off" value="<?php echo $key; ?>" ><?php echo $key; ?>
                   </label>
                 </div>
              <?php endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <label for="electricity">Электроснабжение:</label>
            <select class="form-control" id="electricity" name="electricity">
              <?php $electricity= array(
                      "Центральное",
                      "Отсутствует",
                      "Автономное (генератор)"
                  );
              foreach($electricity as $key): ?>
                  <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Состояние:</label>
            <select class="form-control" id="status" name="status">
              <?php $status= array(
                      "Под ключ",
                      "Частичный ремонт",
                      "Без ремонта",
                      "Фундамент"
                  );
              foreach($status as $key): ?>
                  <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
      </div>
      <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <label for="water">Водоснабжение:</label>
            <select class="form-control" id="water" name="water">
              <?php $water= array(
                      "Отсутсвует",
                      "Колодец",
                      "Скважина",
                      "Центральное"
                  );
              foreach($water as $key): ?>
                  <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="area_type">Тип земли:</label>
            <select class="form-control" id="area_type" name="area_type">
              <?php $area_type= array(
                    "фермерское хозяйство",
                    "личное подсобное хозяйство",
                    "садоводство",
                    "ижс",
                    "промназначение",
                    "днп"
                  );
              foreach($area_type as $key): ?>
                  <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
              <?php endforeach; ?>
            </select>
        </div>
      </div>
    <div class="col-12 col-sm-6 mb-3">
      <div class="form-group">
          <label for="gas">Газ:</label>
          <select class="form-control" id="gas" name="gas">
            <?php $area_type= array(
                  "Отсутсвует",
                  "Центральный",
                  "Балон"
                );
            foreach($area_type as $key): ?>
                <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
            <?php endforeach; ?>
          </select>
      </div>
      <div class="form-group mb-3">
        <label for="road">Шоссе:</label><br/>
           <?php $roads= array(
                  "Алтуфьевское",
                  "Боровское",
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
               <div class="btn-group mb-1" data-toggle="buttons">
               <label class="btn btn-sm btn-inactive ">
                   <input type="checkbox" class="" name="road" autocomplete="off" value="<?php echo $key; ?>" ><?php echo $key; ?>
               </label>
             </div>
           <?php endforeach; ?>
           <div class="input-group">
             <span class="input-group-addon" id="basic-addon2">Другое</span>
             <input type="Текст" class="form-control" placeholder="" min="0"  aria-describedby="basic-addon2" id="road_input" name="road">
           </div>
      </div>
      <div class="form-group">
          <label for="kilometers">Километров от МКАД:</label>
          <div class="input-group">
            <input type="number" class="form-control" placeholder="" min="0"  aria-describedby="basic-addon2" id="kilometers" name="kilometers">
            <span class="input-group-addon" id="basic-addon2">км</span>
          </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 ">
      <div class="form-group">
          <label for="canalization">Канализация:</label>
          <select class="form-control" id="canalization" name="canalization">
            <option>Отсутствует</option>
            <option>Септик</option>
            <option>Центральная</option>
            <option>Яма</option>
          </select>
      </div>
      <div class="form-group">
          <label for="build_year">Год постройки:</label>
          <div class="input-group">
            <input type="number" class="form-control" placeholder="" min="0"  aria-describedby="basic-addon2" name="build_year" id="build_year">
            <span class="input-group-addon" id="basic-addon2">г.</span>
          </div>
      </div>
      <div class="form-group">
          <label for="footage">Площадь дома:</label>
          <div class="input-group">
            <input type="number" class="form-control" placeholder="" min="0"  aria-describedby="basic-addon2" id="footage" name="footage">
            <span class="input-group-addon" id="basic-addon2">м²</span>
          </div>
      </div>
      <div class="form-group">
          <label for="area_footage">Площадь участка:</label>
          <div class="input-group">
            <input type="number" class="form-control" placeholder="" min="0"  aria-describedby="basic-addon2" id="area_footage" name="area_footage">
            <span class="input-group-addon" id="basic-addon2">Сот.</span>
          </div>
      </div>
      <div class="form-group">
          <label for="price">Цена:</label>
          <div class="input-group">
            <input type="number" class="form-control" placeholder="" min="0"  aria-describedby="basic-addon2" name="price" id="price">
            <span class="input-group-addon" id="basic-addon2">Руб.</span>
          </div>
      </div>
      <div class="form-group w-100">
        <div class="input-group">
          <span class="input-group-addon">
            <input type="checkbox"  id="bargaining" name="bargaining">
          </span>
          <input type="text" class="form-control" disabled value="Торг уместен">
        </div>
      </div>
      <div class="form-group w-100">
        <div class="input-group">
          <span class="input-group-addon">
            <input type="checkbox"  id="no_price" name="no_price">
          </span>
          <input type="text" class="form-control" disabled value="По договоренности">
        </div>
      </div>
      <div class="form-group w-100">
        <div class="input-group">
          <span class="input-group-addon">
            <input type="checkbox"  name="house_securness" id="house_securness">
          </span>
          <input type="text" class="form-control" disabled value="Система охраны дома">
        </div>
      </div>
    </div>
    <div class="col-12 mb-3">
      <hr>
    </div>
    <div class="col-12 col-sm-6">
      <div class="form-group">
        <label for="region">Область:</label>
        <input type="text" class="form-control" id="region" name="region">
      </div>
      <div class="form-group w-100 pt-4">
        <div class="input-group">
          <span class="input-group-addon">
            <input type="checkbox" id="security" name="security">
          </span>
          <input type="text" class="form-control" disabled value="Охраняемая территория">
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6">
      <div class="form-group">
          <label for="village">Название поселка/ДНТ/СНТ/КП:</label>
          <input type="text" class="form-control" id="village"  name="village">
      </div>
      <div class="form-group">
          <label for="owner_type">Тип собственности:</label>
          <select class="form-control" id="owner_type" name="owner_type">
            <option>В собственности</option>
            <option>Частично (долевое владение)</option>
          </select>
      </div>
    </div>
    <div class="col-12 mb-3">
      <div class="form-check w-100">
          <label for="address">Адрес:</label>
          <div class="input-group">
             <input type="text" class="form-control" placeholder="Город, Улица, Номер дома/участка" id="address" name="address">
             <input type="hidden" name="latitude"  id="latitude">
             <input type="hidden" name="longitude" id="longitude">
             <span class="input-group-btn">
               <button class="btn btn-c-primary" type="button" id="toggleMap">Указать на карте</button>
             </span>
         </div>
       </div>
    </div>
    <div class="col-12" >
      <div id="map" style="display:none;" class="mb-3"></div>
    </div>
    <div class="col-12 mb-3">
      <hr>
    </div>
    <div class="col-12" >
      <div class="form-group">
        <label for="additional_info">Дополнительная информация</label>
        <textarea class="form-control" id="additional_info" rows="3" name="additional_info"></textarea>
      </div>
    </div>
    <div class="col-12 mb-3">
      <hr>
    </div>
    <div class="col-12" >
      <div class="form-group">
        <label>Фотографии</label>
        <div class="row photoRow">
            <div class="col-4">
              <label for="uploadbtn0" class="uploadButton pt-5"><i class="ion-camera h1"></i></label>
              <input type="hidden" name="uploadImg0" id="uploadImg0">
              <input style="opacity: 0; z-index: -1;" type="file" name="upload0" id="uploadbtn0" onchange="readURL(this);" class="w-0">
            </div>
        </div>
      </div>
    </div>
    <div class="col-12" >
          <button type="submit" class="btn btn-c-primary w-100 mb-5">Разместить</button>
    </div>
  </div>
