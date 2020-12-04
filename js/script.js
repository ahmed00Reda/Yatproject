$('.autoplay').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,
  });

  $('.items').slick({
	infinite: true,
	slidesToShow: 2,
	slidesToScroll: 2
  });
  $('.all').slick({
	centerMode: true,
	centerPadding: '60px',
	slidesToShow: 3,
	responsive: [
	  {
		breakpoint: 768,
		settings: {
		  arrows: false,
		  centerMode: true,
		  centerPadding: '40px',
		  slidesToShow: 3
		}
	  },
	  {
		breakpoint: 480,
		settings: {
		  arrows: false,
		  centerMode: true,
		  centerPadding: '40px',
		  slidesToShow: 1
		}
	  }
	]
  });
 