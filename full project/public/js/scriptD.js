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
		if(res.success == "success")
		{
			swal(res.message, 
			{
			  icon: "success",
			  buttons: false,
			  timer: 1500,
			});
			console.log(res.message);
			$("#section-table").load(location.href+' #content-table');
		}
		
	});
	
	
	
	if($("html").attr("dir") == "rtl")
	{
		$('.big-banner').slick({
		  infinite: true,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoPlay: true,
		  rtl:true,
		  dots:true,
		  arrows:true,
		  
		});
	}
	else
	{
		$('.big-banner').slick({
		  infinite: true,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoPlay: true,
		});
		
	}
	

});