function sizeContent() {
	var newHeight = $("html").height() - 30;
	newHeight = newHeight < bestOuterHeight ? bestOuterHeight : newHeight;

	if($(".content_page").length > 0 ){
		newHeight = newHeight < cpHeight ? cpHeight : newHeight;
		// console.log("html",$("html").height());
		// console.log("cpHeight",cpHeight);
		// console.log("newHeight",newHeight);
	}

	$(".bannerlink").css("height", newHeight);
	$(".main_container").css("height", newHeight);

	if (newHeight > bestOuterHeight && newHeight > cpHeight ){
		$(".sales_container").css("height", newHeight);
		$(".inside_container").css("height", newHeight);
	}
}

// var bestInnerHeight 	= 580;
var bestOuterHeight 	= 670;
var cpHeight 			= $(".content_page").outerHeight();

$(document).ready(function(){
  //
  // Top Navigation Bar - Car Models
  //
	$(window).bind('load', function(){
		cpHeight = $(".content_page").outerHeight();
		sizeContent();
		$(window).resize(sizeContent);
	})
  positionFooter();
  $(window).scroll(positionFooter);
  $(window).resize(positionFooter);
  $(window).load(positionFooter);

  var up = 0;
  	$('#model').hover(enter, leave);
	$('.model_popup').css({ display: 'block' });

	$(".slider").jCarouselLite({
		btnNext: ".next_model",
		btnPrev: ".prev_model",
		visible: 5,
		circular: false,
		speed: 400
	});
	$('.model_popup').hover(
		function() {
			if ($(this).data('closing')) {
				$(this).stop(true, true);
			}
		},
		leave
	);
	$('.model_popup').css({ display: 'none' });

	function enter(event) {
		$('.model_popup').data({ closing: false }).delay(200).fadeIn();
	};

	function leave(event) {
		$('.model_popup').data({ closing: true }).delay(400).fadeOut();
	};

	//
	// Bottom Slider
	//
	$(".flip").hover(

		function(){

		if( up == 0)
		{
			$(".panel").slideDown("medium", function(){
				$(".panel_content").show();
				up = 1;
			});

		}

		/*$(".panel").animate({
			opacity: 'toggle',
			height: 'toggle'
		}, 1000, function() {
			$(".panel_content").fadeIn(200);
		});*/
		},function () {


			//up = 1;
			//$(".panel_content").hide();
		}

	);

	$(".panel").hover(

		function(){





		/*$(".panel").animate({
			opacity: 'toggle',
			height: 'toggle'
		}, 1000, function() {
			$(".panel_content").fadeIn(200);
		});*/
		},function () {
			if(up == 1)
			{
		//	$(".panel_content").hide();
			$(".panel").slideUp("medium", function(){
		//	$(".panel_content").show();
			up = 0;

			});
			}
		}

	);

	/*
	$(".thumbnail").hover(function(){
		var rel = "#" + $(this).attr("rel");
		$(".banner").children().fadeOut("slow");
		$(rel).fadeIn("slow");
	});
	*/

});



$(window).bind("load", function() {
	$("div#my-folio-of-works").slideViewerPro({
		thumbs: 5,
		autoslide: true,
		asTimer: 3500,
		typo: true,
		galBorderWidth: 0,
		thumbsBorderOpacity: 0,
		buttonsTextColor: "#707070",
		buttonsWidth: 40,
		thumbsActiveBorderOpacity: 0.8,
		thumbsActiveBorderColor: "aqua",
		shuffle: true
	});
});


function flipup()
{
	$(".panel_content").hide();
		$(".panel").slideToggle("slow", function(){
			$(".panel_content").show();
		});

}

function search_js()
{
	var myvar = $('#search_value').val();
	if(myvar=='Search')
		$('#search_value').val('');
	else
	{
		if(myvar=='')
			$('#search_value').val('Search');
	}
}


function positionFooter() {
  var mFoo = $(".red_footer");
  if ((($(document.body).height() + mFoo.height()) < $(window).height() && mFoo.css("position") == "fixed") || ($(document.body).height() < $(window).height() && mFoo.css("position") != "fixed")) {
    mFoo.css({ position: "fixed", bottom: "0px" });
  }
  else {
    mFoo.css({ position: "static" });
  }
}