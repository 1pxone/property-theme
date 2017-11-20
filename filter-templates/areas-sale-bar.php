<?php
/**
 * Top bar for houses rent
 *
 * @package understrap
 */

?>
<div class="container-fluid py-3" id="propType">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-5">
        <button class="btn btn-more circled" id="toggleFilters">Фильтры <i class="ion-ios-settings-strong"></i></button>
        <button class="btn btn-map" type="button" id="maplist"><?php if (isset($_GET['map']) && $_GET['map'] == TRUE ){echo "Показать cписком <i class='ion-grid h6'></i>";} else {echo "Показать на карте  <i class='ion-map h6'></i>";} ?></button>
          <!-- <button class="btn btn-sm btn-def-border btn-untoggled circled fw-light" id="cheapFirst">Сначала дешевые <i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
          <button class="btn btn-sm btn-def-border btn-untoggled circled fw-light" id="expensiveFirst">Сначала дорогие <i class="fa fa-sort-amount-desc" aria-hidden="true"></i></button> -->
          <!-- <button class="btn btn-sm btn-def-border btn-toggled circled fw-light " id="byDate">По дате <i class="fa fa-calendar" aria-hidden="true"></i></button> -->
      </div>
      <div class="col-12 col-md-4">
        <div class="btn-group mr-3 circled w-100">
            <a href="/sale/houses" class="btn circled btn-inactive w-100" id="houses">Дома</a>
            <a href="/sale/townhouses" class="btn btn-inactive circled w-100" id="townhouses">Таунхаусы</a>
            <a href="javascript:void(0)" class="btn circled btn-active btn-more w-100" id="areas">Участки</a>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="btn-group mr-3 circled w-100">
            <a href="javascript:void(0)" class="btn circled btn-active btn-more w-100">Продажа</a>
            <a href="/rent/areas" class="btn btn-inactive circled w-100">Аренда</a>
        </div>
      </div>
    </div>
  </div>
</div>
