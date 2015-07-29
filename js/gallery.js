$(document).ready(function() {  
        
		    //when hover over the div with class=photo,   
		    //find the caption and change its css bottom property from the original value = -100px to 0px    
		    $('.photo').hover(function() {  
		      $(this).find('.caption').stop().animate({ bottom: '0' }, { duration: 1600, easing: 'easeOutQuart' });  
		    }, function() {  
		      $(this).find('.caption').stop().animate({ bottom: '-100px' }, { duration: 1600, easing: 'easeOutQuart' });  
		    });  
	  
		});  
