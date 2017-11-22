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
<form method="post">
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
              <div class="btn-group mr-md-3 circled w-100 wborder bg-white">
                  <a href="javascript:void(0)" class="btn circled btn-active btn-more w-100" id="houses">Дом</a>
                  <a href="/rent/townhouses" class="btn btn-inactive circled w-100" id="townhouses">Таунхаус</a>
                  <a href="/rent/areas" class="btn circled btn-inactive w-100" id="areas">Участок</a>
              </div>
            </div>
            <div class="col-12 wborder mb-3">
              <label for="exampleFormControlTextarea1">Выберите тип Вашего объявления:</label>
              <div class="btn-group mr-md-3 circled w-100 wborder bg-white">
                <a href="javascript:void(0)" class="btn circled btn-active btn-more w-100">Продажа</a>
                <a href="/sale/houses" class="btn btn-inactive circled w-100">Аренда</a>
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

$( "form" ).on( "submit", function( event ) {

  var data = [],
        serialized = $( this ).serializeArray(),
        i;
    for (i=0; i<serialized.length; i+=2) {
        var tmpObj = {};
        tmpObj[ serialized[i].name ] = serialized[i].value;
        tmpObj[ serialized[i+1].name ] = serialized[i+1].value;
        data.push(tmpObj);
    }
  var data1 = JSON.stringify($( this ).serializeArray() );
  console.log(data1);
  $( this ).append(`<code>${data}</code>`);
  event.preventDefault();
});
</script>

<?php get_footer(); ?>
<!-- Ваш файл footer.php -->
