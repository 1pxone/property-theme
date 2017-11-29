<?php /* Template Name: Add new */ ?>

<?php get_header(); ?>
<div class="bg-e8 fw-400">
<form method="post">
  <p><label for="cptTitle"><?php _e('Enter the Post Title:', 'mytextdomain') ?></label>
  <input type="text" name="cptTitle" id="cptTitle" /></p>
  <p> <label for="cptContent"><?php _e('Enter Some Content:', 'mytextdomain') ?></label>
  <textarea name="cptContent" id="cptContent" rows="4" cols="20"></textarea> </p>
  <button type="submit"><?php _e('Submit', 'mytextdomain') ?></button>
  <input type="hidden" name="post_type" id="post_type" value="houses" />
  <?php wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ); ?>
</form>
<form id="createForm">
  <div class="container pt-5 ">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
          <?php get_template_part( 'form-templates/person' ); ?>
        </div>
        <div class="col-12 mb-3 d-block d-md-none">
          <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <div class="row">
            <div class="col-12 mb-3">
                <label for="exampleFormControlTextarea1">Выберите категорию Вашего объявления:</label>
              <div class="form-group" id="prop_type_wrapper">
                  <div class="btn-group w-100 wborder bg-white" data-toggle="buttons">
                    <label class="btn btn-inactive active circled w-100">
                        <input type="radio" name="prop_type" id="prop_type0" autocomplete="off" value="0" checked>Дом
                    </label>
                    <label class="btn btn-inactive circled w-100">
                        <input type="radio" name="prop_type" id="prop_type1" autocomplete="off" value="1">Таунхаус
                    </label>
                    <label class="btn btn-inactive circled w-100">
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
</div>

<script>
var post_types = {
  "00":"houses",
  "01":"houses-sale",
  "10":"townhouses",
  "11":"townhouses-sale",
  "20":"areas",
  "21":"areas-sale",
};

var postType = "00";

var propType = "0";
var sellType = "0";

$("#prop_type_wrapper label").on("click", function(){
  console.log($(this).find("input").val());
});

$("#sell_type_wrapper label").on("click", function(){
  console.log($(this).find("input").val());
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
  $("#post_type").val(postType);
  $("#cptContent").val(tpl);

});
</script>

<?php get_footer(); ?>
<!-- Ваш файл footer.php -->
