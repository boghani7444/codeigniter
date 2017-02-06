// JavaScript Document

$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
		/* top_middle */
        $('.top_middle').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1', 'top':'0'},1000);
			}
        });
		/* top_middle end here */
		
		/* left_left */
			$('.left_left').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1', 'left':'0'},1000);
			}
        }); 
		/*  left_left end here */
		 
		/* CENTER HEADING */
		$('.centerleft').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1', 'left':'30'},1000);
			}
        }); 
		/* center heading end here */
		
		/* right_right */
		$('.right_right').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1', 'right':'0'},1000);
			}
        });
		/* right_right end here */
		
		/* Hide */
		$('.hideme').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},1000);
			}
        });
		/* Hide end here */
		
		
    });
    
});

/* on page load  */
$(document).ready(function () {
	 $('.hideme_load').animate({'opacity':'1'},1000);
});
$(document).ready(function () {
	 $('.left_left_load').animate({'opacity':'1', 'left':'3%'},500);
	 $('.left_left_load').animate({'opacity':'1', 'left':'0'},300);
});
$(document).ready(function () {
 $('.right_right_load').animate({'opacity':'1', 'right':'3%'},500);
 $('.right_right_load').animate({'opacity':'1', 'right':'0'},300);
});