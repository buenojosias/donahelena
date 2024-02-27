// preloader
$(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets    
});

$(function() {
    new WOW().init();
    $('.templatemo-nav').singlePageNav({
    	offset: 70
    });

    /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
});

$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};
$('a[href="#vagas"]').on('click', function(){
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#vagas").offset().top
    }, 1000);
    return false;
});
$('.tel').mask(SPMaskBehavior, spOptions);

$('form').submit(function(e){
    e.preventDefault();
    $('.alert').remove();
    //$('.form-control').removeClass('form-erro');
    var action = $(this).attr('action');
    var lang = $('input#lang').val();
    var dados = $(this).serialize();
    $.ajax({
        type: "post",
        url: "ajax/form.php?action="+action,
        data: dados,
        dataType: "json",
        beforeSend: function(response){
            $('form[action="'+action+'"]').parents('.formulario').prepend('<div id="jqueryEasyOverlayDiv"><div id="jqueryOverlayLoad"><i class="fa fa-spin fa-spinner fa-3x"></i>&nbsp;</div></div>');
        },
        success: function(response){
            if(response.rtn=='success') {
                $('form[action="'+action+'"]').prepend('<div class="alert alert-success" role="alert">'+response.msg[lang]+'</div>');
                $('form[action="'+action+'"]')[0].reset();
            } else {
                $('form[action="'+action+'"]').prepend('<div class="alert alert-danger" role="alert">'+response.msg[lang]+'</div>');
            }
            $('#jqueryEasyOverlayDiv').remove();
        }
    });
});