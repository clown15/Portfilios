$(window).scroll(function () {
			var height = $(document).scrollTop();
			if(height!=0) {
				$(".navbar-inverse").css("background-color","green");
			}
			else {
				$(".navbar-inverse").css("background-color","black");	
			}
			
	});