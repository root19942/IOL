(function($) {



    "use strict";



	



	



	/* ..............................................



	Loader 



    ................................................. */



	



	$(window).on('load', function() { 



		$('.preloader').fadeOut(); 



		$('#preloader').delay(550).fadeOut('slow'); 



		$('body').delay(450).css({'overflow':'visible'});



	});



    	



	/* ..............................................



    Navbar Bar



    ................................................. */



	



	$('.navbar-nav .nav-link').on('click', function() {



		var toggle = $('.navbar-toggler').is(':visible');



		if (toggle) {



			$('.navbar-collapse').collapse('hide');



		}



	});



	



	/* ..............................................



    Fixed Menu



    ................................................. */



    



	$(window).on('scroll', function () {



		if ($(window).scrollTop() > 50) {



			$('.top-header').addClass('fixed-menu');



		} else {



			$('.top-header').removeClass('fixed-menu');



		}



	});



	



	/* ..............................................



    Gallery



    ................................................. */



	



	$(document).ready(function() {



		uploadImage();

		uploadOfImage();







		$('.popup-gallery').magnificPopup({



			delegate: 'a',



			type: 'image',



			tLoading: 'Loading image #%curr%...',



			mainClass: 'mfp-img-mobile',



			gallery: {



				enabled: true,



				navigateByImgClick: true,



				preload: [0,1] // Will preload 0 - before current, and 1 after the current image



			},



			image: {



				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',



				titleSrc: function(item) {



					return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';



				}



			}



		});







		function uploadImage() {



			var button = $('.images .pic')



			var uploader = $('<input type="file" accept="image/*" />')



			var images = $('.images .autour')



			var buttonuploader = $('#uploadimg')



			



			button.on('click', function () {



			  uploader.click()



			})



			buttonuploader.on('click', function () {



				uploader.click()



			})



			



			uploader.on('change', function () {



				button.show();



				var reader = new FileReader()



				$('.images .img').remove();



				reader.onload = function(event) {



				  images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>Change</span></div>')



				  ;



				}



				reader.readAsDataURL(uploader[0].files[0])



				button.hide();



			 })



			



			images.on('click', '.img', function () {



			  uploader.click()



			})


		}

		function uploadOfImage() {



			var button = $('.img')			

			var uploader = $('<input type="file" accept="image/*" />')
			button.on('click', function () {
			  uploader.click()

			})

			uploader.on('change', function () {



				button.show();



				var reader = new FileReader()




				reader.onload = function(event) {



				  // button.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>Change</span></div>')

				  if (event.target.result && event.target.result!="") {$('.avatar .img').css("background-image", "url('" + event.target.result + "')"); }
				   



				}



				reader.readAsDataURL(uploader[0].files[0])






			 })



			



		}



	});



	



	/* ..............................................



    Smooth Scroll



    ................................................. */



	



	$('a[href*="#"]:not([href="#"])').on('click', function() {



		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {



		  var target = $(this.hash);



			  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');



			  if (target.length) {



				$('html,body').animate({



				  scrollTop: target.offset().top - 65,



				  }, 1000);



				  return false;



			  }



		}



	});



	



}(jQuery));