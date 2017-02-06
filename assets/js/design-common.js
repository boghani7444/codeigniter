$('.menu-tab').click(function(){
	$('.drop-nav').slideToggle();
      
});


$(window).resize(function(){
	if($(window).width()>900){
		$('.drop-nav').removeAttr('style');
	}
});

if(document.getElementById("portfolio-slider"))
	{
	$(document).ready(function() {
		$("#portfolio-slider").owlCarousel({
			lazyLoad : true,
			slideSpeed:1000,
			navigation:true,
		 navigationText: [
		  "<span class='prev'></span>",
		  "<span class='next'></span>"
		  ],
			items : 4,
			
			autoPlay:true,
			afterInit : function(elem){
				var that = this
				that.owlControls.prependTo(elem)
			}
			});
		});
}

$('li.dropdown').hover(function(){
		$(this).find('.drop-inner').slideDown();
	},
	function(){
		$(this).find('.drop-inner').stop(true,true).slideUp();
});

$('.drop-inner').hover(function(){
		$(this).prev().css('background','#2A7C95');
	},
	function(){
		$(this).prev().removeAttr('style');
});


/* scroll top */

$('a.scroll').click(function(){
    $('html, body').animate({
        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
    }, 1500);
    return false;
});

$(function(){
    //$('.tabs-data').hide();
//    $('#service-tabs a').bind('click', function(e){
//        $('#service-tabs a.current').removeClass('current');
//        $('.tabs-data:visible').hide();
//        $(this.hash).fadeIn().show();
//        $(this).addClass('current');
//        e.preventDefault();
//    }).filter(':first').click();
});

function resizeload() {
	if($(window).width()<680){
		if($('.hideme').hasClass('hideme')){
			$('.hideme').removeClass('hideme');	
		}
                
                if($('.right_right').hasClass('right_right')){
			$('.right_right').removeClass('right_right');	
		}
                
                if($('.left_left').hasClass('left_left')){
			$('.left_left').removeClass('left_left');	
		}
	}
}

resizeload(); // on load

$('.ftr-head').click(function(){
	$('.ftr-drop').slideToggle();
      
});


$(window).resize(function(){
	if($(window).width()>600){
		$('.ftr-drop').removeAttr('style');
	}
});

if(document.getElementById("scrl-tbl"))
{
	(function($){
			$(window).load(function(){
				
				$("#scrl-tbl").mCustomScrollbar({
					axis:"x",
					advanced:{
						autoExpandHorizontalScroll:true
					}
				});
			});
		})(jQuery);
}

if(document.getElementById("fancy"))
{
    $('.fancybox').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic'
        
    });
}

//$('.portfolio').mixItUp({
//	load: {
//		sort: 'random'
//	}
//});

(function(){
$.fn.customRadioCheck = function() {
return this.each(function() {

var $this = $(this);
var $span = $('<span/>');
$span.addClass('custom-'+ ($this.is(':checkbox') ? 'check' : 'radio'));
$this.is(':checked') && $span.addClass('checked'); // init
$span.insertAfter($this);

$this.parent('label').addClass('custom-label').attr('onclick', ''); // Fix clicking label in iOS
// hide by shifting left
$this.css({ position: 'absolute', left: '-9999px' });

// Events
$this.on({
    change: function() {
            if ($this.is(':radio')) {
                    $this.parent().siblings('label').find('.custom-radio').removeClass('checked');
            }
            $span.toggleClass('checked', $this.is(':checked'));
    },
    focus: function() { $span.addClass('focus'); },
    blur: function() { $span.removeClass('focus'); }
    });
    });
};
}());
$("input[name='requirement[]']").customRadioCheck();


if(document.getElementById("add_inquiry"))
{
	$("#add_inquiry").validate({
        rules: {
            fullname: { required: true},
            email: { required: true, email: true },
            mobile_no: { required: true, digits:true ,minlength: 10 },
        },
        messages: {
            fullname: {
                    required: "Please Enter Your Name",
            },
            email: {
                    required: "Please Enter Email Address",
                    email: "Please Enter Valid Email Address"
            },
            mobile_no: {
                    required: "Please Enter Your Contact No",
                    digits: "please enter only digits",
                    minlength: "Please Enter 10 Character",
            },
        },
	});
}

$( "span#description" ).find( "div" ).addClass( "abt-img" );