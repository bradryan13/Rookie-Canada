// @codekit-append "semantic/checkbox.js"
// @codekit-append "semantic/dimmer.js"
// @codekit-append "semantic/dropdown.js"
// @codekit-append "semantic/modal.js"
// @codekit-append "semantic/transition.js"
// @codekit-append "semantic/form.js"

// @codekit-append "vendor/inputmask.js" 
// @codekit-append "vendor/royal-slider.js"
// @codekit-append "vendor/skrollr.js"
// @codekit-append "vendor/instagram.js"
// @codekit-append "vendor/cookie.js"



$( document ).ready(function() {

//modal 
    if ($.cookie('language') == null ){
        $('#language.modal')
            .modal('setting', 'transition', 'vertical flip')
            .modal('show')
        ;
    }

    $(".icon-close").click(function() {
        $('.modal').modal('hide');
    });

    $(".english").click(function() {
        $('#language.modal').modal('hide');
        $.cookie('language', 'english', { expires: 365 });
    });

    var s = skrollr.init();

    var header = $('header');

    $(window).scroll(function(e){
        if(header.offset().top !== 0){
            if(!header.hasClass('shadow')){
                header.addClass('shadow');
            }
        }else{
            header.removeClass('shadow');
        }
    });

    $(window).scroll(function() {
        var windscroll = $(window).scrollTop();
        if (windscroll >= 318) {
            $('.sub-menu').addClass('fixed');
        } else {

            $('.sub-menu').removeClass('fixed');
        }

    }).scroll();

    $(".card .inner").click(function(){
         window.location=$(this).find("a").attr("href"); 
         return false;
    });

    //slideout 
    
    $(".activity-trigger, #slide-out i.icon-close").click(function() {
        $("#slide-out, .panel-header").addClass("open");
        $('#page-wrapper').dimmer('toggle');
        $('.name').focus();
    });

    $('#page-wrapper')
    .dimmer({
        onHide: function(){
            $("#slide-out, .panel-header").removeClass("open");
        }
    });

});
