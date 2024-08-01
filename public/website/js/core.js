$(".owl-carousel").each(function(){var t=$(this).attr("data-items-large"),e=$(this).attr("data-items-small"),
  s=$(this).attr("data-is-autoplay"),
  a=$(this).attr("data-is-loop");
  var stage = $(this).attr("data-stage");
  $(this).owlCarousel({loop:false,margin:10,nav:!0,dots:!1,autoplay:!!s,autoplayTimeout:5e3,
 
    navText:["<img alt='left' width='33' height='33' src='/website/images/icons/slider_left.png'>","<img width='33' height='33' alt='left' src='/website/images/icons/slider_right.png'>"],
    responsive:{0:{items:e,stagePadding: !stage ? 40 : parseInt(stage)},600:{items:e,stagePadding:5},1e3:{items:t}}
  })}),$(".scroll-up").on("click",function(){$("html, body").animate({scrollTop:0},"slow")}),$(".header__actions_list_item").on("click",function(){var t=$(this).find(".header__actions_menu");t.toggle(),$(".header__actions_menu").not(t).hide()}),$(".type__filter ul li").on("click",function(){var t=$(this).find("input");t.prop("checked",!t.prop("checked")),$(this).toggleClass("active")}),$(".select-brand").on("change",function(){var t=$(this).val();$.ajax({url:"/brands/models?brand_id="+t,type:"get",success:function(t){$(".select-model").html("<option value=''>Choose Model</option>"),t.forEach(function(t){var e=`<option value="${t.id}">${t.title.en}</option>`;$(".select-model").append(e)})}})}),$(".order-by").on("change",function(){$(this).closest("form").submit()}),$(".search-cars").on("keyup",function(){var t=$(this).val();t.length>=3?$.ajax({url:"/cars/search?search="+t,type:"get",success:function(t){t.length>0?(console.log(t+"data"+t.length),$(".search__result ul").html(""),t.forEach(function(t){console.log(t);var e=`<li><a href="${t.url}">${t.keyword}</a></li>`;$(".search__result ul").append(e)}),$(".search__result").show()):$(".search__result").hide()}}):$(".search__result").hide()}),$(".read-more").click(function(){$(this).parent().find(".home__brands_desc").toggleClass("height-auto"),$(this).parent().find(".home__brands_desc").hasClass("height-auto")?$(this).html("Read less"):$(this).html("Read more")}),$('[data-toggle="tooltip"]').tooltip(),$(".wishlist-toggle").click(function(){var t=$(this).attr("data-auth");t&&"0"!=t||$("#signinModal").modal("show");var e=$(this),s=$(this).attr("data-id");$.ajax({url:"/wishlist/toggle?car_id="+s,type:"get",success:function(t){"success"==t.status&&("add"==t.action?e.html("Remove from wishlist"):e.html("Save to wishlist"))}})});

$(window).on("load",function(){
    // $(".loader").fadeOut()
    // var elm_g = $(".gr").attr('data-item')
    // $(".gr").append(`
    //     <iframe title="google" src='`+elm_g+`' frameborder='0' width='100%' height='1000'></iframe>
    // `)

    // var elm_f = $(".fb").attr('data-item')
    // $(".fb").append(`
    //     <iframe title="fb" src='`+elm_f+`' frameborder='0' width='100%' height='1000'></iframe>
    // `)
    console.log('loaded')
    $.ajax({
        url:"/iframes",
        type:"get",
        success:function(data){
            console.log(data)
            $(".gr").append(data.gr)
            $(".fb").append(data.fb)
        }
    })
    // $("body").css("opacity","1")
});
$('.owl-carousel').each(function() {
    //Find each set of dots in this carousel
  $(this).find('.owl-nav button').each(function(index) {
    //Add one to index so it starts from 1
    $(this).attr('aria-label', index + 1);
    $(this).removeAttr('role');
  });
});

$(".car-contact").on("click",function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    $.ajax({
        url:"/a/" + id +"?type="+type,
        type:"get",
        success:function(data){
            window.location.href = data.url
        }
    })
})

$(".navbar-toggler").on("click",function(){
    $(".navbar-collapse").toggleClass("show")
})

$(".open-auth").click(function(){
  $(".navbar-collapse").removeClass("show")
})
$(".close-menu").on("click",function(){
  $(".navbar-collapse").removeClass("show")
});
$(".toggle-search").on("click",function(){
    // $(".products-page__filter").slideToggle()
})

if($(window).width() < 768){
    $(".search-filter-keywoard").remove()
}

$(".read-more-page").click(function () {
  $(this).parent().find("p").toggleClass("height-auto"),
  $(this).parent().find("p").hasClass("height-auto") ? $(this).html("Read less") : $(this).html("Read more");
})

$(".search__filter_toggler").on("click",function(){
  $(this).hide();
  $(".products-page__filter").toggleClass("fixed-filter")
})

$(".close-fixed-filter").click(function(){
  $(".products-page__filter").removeClass("fixed-filter")
  $(".search__filter_toggler").css("display","flex")
})