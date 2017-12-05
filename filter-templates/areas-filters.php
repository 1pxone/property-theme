<?php
/**
 * Filters for houses
 *
 * @package understrap
 */

?>

<div class="col-12 filter-block py-4" id="filter-block" style="display:none;">
    <div class="container">
        <form action="/rent/houses" method="GET" id="filter">
              <div class="row">
                <div class="col-12 col-lg-4 col-xl-4">
                  <div class="row mb-3">
                    <div class="col-12">
                      <p>Стоимость, руб.:</p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="number" name="price_min" placeholder="от" class="form-control" aria-label="Text input with checkbox">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="number" name="price_max" placeholder="до" class="form-control" aria-label="Text input with radio button">
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4">
                  <div class="row mb-3">
                     <div class="col-12">
                      <p>Площадь участка, сот.:</p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="number" name="sot_min" placeholder="от" class="form-control" aria-label="Text input with checkbox">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="number" name="sot_max" placeholder="до" class="form-control" aria-label="Text input with radio button">
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4">
                  <div class="row mb-3">
                   <div class="col-12">
                     <p>Расстояние от МКАД, км:</p>
                   </div>
                   <div class="col-12 col-sm-6">
                       <input type="number" name="mkad_from" placeholder="от" class="form-control" aria-label="Text input with checkbox">
                   </div>
                   <div class="col-12 col-sm-6">
                       <input type="number" name="mkad_to" placeholder="до" class="form-control" aria-label="Text input with radio button">
                   </div>
                 </div>
               </div>
                <div class="col-12 col-lg-4 col-xl-4">
                  <div class="row">
                    <div class="col-12">
                     <p>Шоссе:</p>
                   </div>
                   <div class="col-12">
                     <select  class="form-control" name="road">
                       <option value="" disabled selected>Одно или несколько</option>
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
              </div>
              <div class="row justify-content-center">
                <!-- <div class="btn-group w-100" role="group" aria-label="Basic example"> -->
                  <button class="btn btn-c-primary-o circled mr-3 " type="reset" id="reset"><i class="icon ion-android-refresh"></i></button>
                  <button class="btn btn-c-primary circled  " type="submit" id="submit">Поиск <i class="icon ion-ios-search-strong"></i></button>
                <!-- </div> -->
              </div>
        </form>
  </div>
</div>
