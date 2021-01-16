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
  
  $(document).ready(function(){

	function ajax(type,url,data,processData)
	{
		var results;
		$.ajax
		  ({
		  type: type, 
		  url: url,
		  dataType: 'json',
		  data: data,
		  async:false, //stop untill the ajax request done
		  processData: processData,
		  contentType: false,
		  success: function (data) 
		  {
			//console.log(data);
			results = data;
		  },
		  error:function(data)
		  { 
			//console.log(data);
			results = data;
		  }
		  });
		//console.log(results);
		return results;
	}
	
	$(document).on("click",".delete",function(){
		event.preventDefault();
		var url = $(this).attr("href");
		var res = ajax("GET",url,[],true);
		console.log(res);
		if(res.success == "success")
		{
			
			swal(res.message, 
			{
			  icon: "success",
			  buttons: false,
			  timer: 1500,
			});
			console.log(res.message);
			
		}
		$("#section-table").load(location.href+' #content-table');
		
	});
	
	
	
	
});
 