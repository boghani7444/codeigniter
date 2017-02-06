jQuery(document).ready(function($){
        $('.dot-net, .php, .java, .android, .apple').asProgress({
            'namespace': 'progress'
        });

    });
	
	$(document).ready(function() {
    
    
    $(window).scroll( function(){
    
        $('.dot-net').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).asProgress('go','85%');
			}
        });
		
		$('.php').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).asProgress('go','92%');
			}
        });
		
		$('.java').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).asProgress('go','85%');
			}
        });
		
		$('.android').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).asProgress('go','80%');
			}
        });
		
		$('.apple').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).asProgress('go','75%');
			}
        });
		
		
	});
});