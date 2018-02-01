<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">



				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script>
var paramsToggled = false;
$("#moreParamsBtn").click(function() {
	paramsToggled = !paramsToggled;
	if(paramsToggled){
		$(this).html(`Меньше параметров <i class="ion-ios-arrow-up"></i>`);
	}else{
		$(this).html(`Больше параметров <i class="ion-ios-arrow-down"></i>`);
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
		return `/${q_whatfor}/${q_type}/?price_min=${q_priceFrom}&price_max=${q_priceTo}&road=${q_road}`
};

$('#navbarNavDropdownMobile').attr('style', 'display: none !important');
$('#toggleMenu').on('click', function(){
	$("#toggleMenu i").toggleClass("ion-navicon")
	$("#toggleMenu i").toggleClass("ion-android-close")
	$('#navbarNavDropdownMobile').slideToggle();
});

$.fn.equalHeights = function(){
	var max_height = 0;
	$(this).each(function(){
		max_height = Math.max($(this).height(), max_height);
	});
	$(this).each(function(){
		$(this).height(max_height);
	});
};

function getAllImagesDonePromise() {
    var d = $.Deferred();
    var imgs = $("img");
    imgs.one("load.allimages error.allimages", function() {
        imgs = imgs.not(this);
        if (imgs.length == 0) {
            d.resolve();
        }
    });
    var complete = imgs.filter(function() { return this.complete; });
    complete.off(".allimages");
    imgs = imgs.not(complete);
    complete = undefined;
    if (imgs.length == 0) {
        d.resolve();
    }
    return d.promise();
};

$( window ).resize(function() {
	if ($(window).width() > 575) {
		$('.equalheight .card').equalHeights();
		$('.equalheight .stepblock').equalHeights();
	} else {
		$('.equalheight .card').attr("width", "")
		$('.equalheight .stepblock').attr("width", "")
	}

	$('#navbarNavDropdownMobile').attr('style', 'display: none !important');
	if($("#toggleMenu i").hasClass("ion-android-close")){
		$("#toggleMenu i").toggleClass("ion-navicon")
		$("#toggleMenu i").toggleClass("ion-android-close")
	};
});

$(document).ready(function(){
	$(function(){
    $("[data-toggle=popover]").popover({
        html : true,
        content: function() {
          var content = $(this).attr("data-popover-content");
          return $(content).children(".popover-body").html();
        },
        title: function() {
          var title = $(this).attr("data-popover-content");
          return $(title).children(".popover-heading").html();
        }
    });
});
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})
	getAllImagesDonePromise().then(function() {
		var url = $("#bgsrc").attr("src");
		$("#points").css('background-image', 'url('+ url +')')
	});
	$('p:empty').remove();
	$('.equalheight .card').equalHeights();
	$('.equalheight .stepblock').equalHeights();
});


</script>
</body>

</html>
