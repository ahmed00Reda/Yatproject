

$(document).ready(function(){
		
		
			/** add classes bootstrap **/
		$("#register-form input").wrap("<div class='form-group'></div>");
		$("input:not([type='checkbox'],[type='submit'])").addClass("form-control");
		/// //$(".form-control").parent().prev().css("border","2px solid red");
		// //$(".form-control").parent().prev().prependTo(".form-group");// bad
		$(".form-control").parent().prev().each(function(index,item){
			//console.log(item);
			$(this).addClass("form-control-label");
			let next = $(this).next();
			$(this).prependTo(next);
		});
		let checkContainer = $("input[type='checkbox']").parent();
		checkContainer.next().appendTo(checkContainer);
		
		$("input[type='submit']").addClass("btn btn-primary");
		$("input[type='submit']").parent().	addClass("text-right");
		
			// /** add tooltip attribute and popover **/
			
			//$('[data-toggle="tooltip"]').tooltip();

			
		$("input:not([type='submit'])").attr("data-toggle","tooltip");
		$('[data-toggle="tooltip"]').tooltip({ //activating tooltip
			placement:"left",
			html:true,
		});
		
		
		
		// $("#register-form").on("submit",function(){
			// event.preventDefault();
		// });
		
		// $("input[type='submit']").attr("data-toggle","popover");
		
		// $('[data-toggle="popover"]').popover({ //activating tooltip
			// placement:"left",
			// html:true,
		// });
		
		// /**validation**/
		$("#register-form input:not([type='submit'])").on("focus",function(){
			$(this).css("border","2px solid cyan");
		});
		
		$("#register-form input:not([type='submit'])").on("blur",function(){toValidate($(this))});
		
		$("#register-form").on("submit",function(){
			//let inputs = $(this).children().children("input:not([type='submit'])");
			let inputs = $(this).find("input:not([type='submit'])");
			var valid = true;
			inputs.each(function()
			{
				if(!toValidate($(this)))
				{
					$(this).css("border","2px solid red");
					$(this).tooltip('show');
					valid = false;
				}
			});
			if(!valid)
			{
				console.log(valid);
				event.preventDefault();
			}
			
		});
		
		function toValidate(el)
		{
			console.log(el);
			if(!validate(el))
			{
				el.css("border","2px solid red");
				el.tooltip('show');
				return false;
			}
			else
			{
				el.css("border","2px solid green");
				el.tooltip('hide');
				return true;
			}
		}
		
		
		function validate(el)
		{
			//console.log(el.attr("name"));
			if(el.attr("name") == "name_ar")
			{
				if(el.val().trim().match(/^[\u0621-\u064A ]+$/) == null)//only arabic letters
				return false;
			}
			else if(el.attr("name") == "name_en")
			{
				if(el.val().trim().match(/^[a-zA-Z ]+$/) == null)
				return false;
			}
			else if(el.attr("name") == "email")
			{
				if(el.val().trim().match(/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/) == null)
				return false;
			}
			else if(el.attr("name") == "address")
			{
				if(el.val().trim().match(/^([\u0621-\u064A0-9\-, ]{3,})|([a-zA-Z0-9\-, ]{3,})+$/) == null)
				return false;
			}
			else if(el.attr("name") == "phone")
			{
				if(el.val().trim().match(/^\+?\d{10,}$/) == null)
				return false;
			}
			else if(el.attr("name") == "password")
			{
				if(el.val().trim().length < 8 )
				return false;
			}
			else if(el.attr("name") == "confirm-password")
			{
				if(el.val().trim().length < 8)
					return false;
				if(el.val().trim() != $("#register-form input[name='password']").val().trim())
					return false;
			}
			else if(el.attr("name") == "agree")
			{
				if(!el.is(":checked"))
				return false;
			}
			else if(el.has("required").val() == "")
			{
				return false;
			}
			return true;
		}
		
		

		/** delegation **/
		
		$("button[data-color='addBlack']").on("click",function(){
			$(this).before("<button data-color='black'>black</black>")
		});
		
		// $("button[data-color='black']").on("click",function(){
			// $(".square").css("backgroundColor","black");
		// }); 
		
		$(document).on("click","button[data-color='black']",function(){
			$(".square").css("backgroundColor","black");
		});
		
		
		
		
		
		
			
	
	
	function getAJAX(url)
	{
		var results;
		$.ajax
		  ({
			type: 'GET', 
			url: url,
			dataType: 'json',
			data: {},
			async:false,
			success: function (data) 
			{
			  //console.log(data);
			  results = data;
			},
			error:function(data)
			{ 
			  console.log(data);
			  results = data;
			}
		  });
		return results;
	}
	
	var language= $("html").attr("lang"); //get language from html set lang="en" or lang ="ar" if you don't set it
	
		/** countries **/
	var conutriesURL = 'http://api.geonames.org/countryInfoJSON?q=&country=&lang=en&username=abdulnaser_mohsen'; //url that get your conuntries
	var countries = getAJAX(conutriesURL); // the importance of async test without aync or aync is true
	//console.log(countries);
	//console.log(countries.geonames);
	$(countries.geonames).each(function(index,item){
		//console.log(item.countryName , item.geonameId);
		var selectOption = $("<option>")
		selectOption.attr("value",item.geonameId).append(item.countryName);
		$('#countryId').append(selectOption);
	});


		/** states **/
	$(document).on("change","#countryId",function(){
		
		$('#stateId option:not(option:first)').remove(); // clear states
		
		var geonameid= $(this).val(); //get country id
		var statesURL = 'http://api.geonames.org/childrenJSON?lang='+language+'&geonameId='+geonameid+'&username=abdulnaser_mohsen'; //url that get your states
		
		var states = getAJAX(statesURL); 
		//console.log(states);
		//console.log(states.geonames);
		
		$(states.geonames).each(function(index,item){
			//console.log(item.name , item.geonameId);
			var selectOption = $("<option>")
			selectOption.attr("value",item.geonameId).append(item.name);
			$('#stateId').append(selectOption);
		});
	});


	$(document).on("change","#stateId",function(){
		$('#cityId option:not(option:first)').remove(); // clear cities
		
		var geonameid= $(this).val(); //get country id
		var citiesURL = 'http://api.geonames.org/childrenJSON?lang='+language+'&geonameId='+geonameid+'&username=abdulnaser_mohsen'; //url that get your cities
		
		var cities = getAJAX(citiesURL); 
		//console.log(cities);
		//console.log(cities.geonames);
		
		$(cities.geonames).each(function(index,item){
			//console.log(item.name , item.geonameId);
			var selectOption = $("<option>")
			selectOption.attr("value",item.geonameId).append(item.name);
			$('#cityId').append(selectOption);
		});
	});
	






		
		

});	

		
		




		
		




		
		
		
		







