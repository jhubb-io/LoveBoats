var $ = jQuery.noConflict();
$(document).ready(function() {
	
    $(".file-selector").on('change',function(){
        readURL(this);
    });
    
    var options = {
        beforeSubmit:   showRequest,
        success:        showResponse,
        url:            obj.ajaxurl
    }; 
    $('.love-form').ajaxForm(options); 
    
    updateCountdown();
    $('.enter-message').change(updateCountdown);
    $('.enter-message').keyup(updateCountdown);
    
    
    $('.btn-textarea').on('click', function(){
        var message = $('.enter-message').val();
        $('.template-text-left,.template-text-right, .boat-view-container .starboard  p, .boat-view-container .portview p').text( message );
        $('body.home, .mbg').css({'overflow-x':'visible'});
        $('.second-page').html2canvas({
            width: 1290,
            height: 940,
            padding: 0,
            margin: 0,
            onrendered: function (canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                // Convert and download as image 
                //Canvas2Image.saveAsPNG(canvas); 
                //$("#img-out").append(canvas);
                //Set hidden field's value to image data (base-64 string)
                $('#img_val').val(canvas.toDataURL("image/png"));
                
                //Submit the form manually
                //document.getElementById("myForm").submit();
            }
        });
        $('body.home, .mbg').css({'overflow-x':'hidden'});
    });
    /*lori*/
	$('header .logo').on('click', function(){
		$('.wrapper .content').removeClass().addClass('content , step1');
	
	});
	
	var maincontainerstep = $('.wrapper .content');

	/* start boat build - starts */
	$('button.createaboat , .gallerey button.createaboat').on('click', function(){
		$(maincontainerstep).removeClass('step1 , gallery').addClass('step2');
		$('menu div:nth-child(1)').addClass('active');
		
		
		
		/* random template variant - starts here */
		function stringGen(len)
		{
			var text = "";
			var charset = "abc";
			for( var i=0; i < len; i++ )
				text += charset.charAt(Math.floor(Math.random() * charset.length));
			return text;
		}
		var templatev = (stringGen(1));
		/* random template variant - ends here */
		/* adding template variant - starts here */
		
		$('.boat-wrapper.portview').removeClass('template-a , template-b , template-c').addClass('template-'+templatev);
		$('.boat-wrapper.starboard').removeClass('template-a , template-b , template-c').addClass('template-'+templatev);
		$('.print-template-wrapper .second-page').removeClass('template-a , template-b , template-c').addClass('template-'+templatev);
		
		$('.boat-wrapper.portview img.boat-texture').attr("src",obj.theme + "/images/boat-layers/boat-" + templatev + "-right-port-view-texture.png");
		$('.boat-wrapper.starboard img.boat-texture').attr("src",obj.theme + "/images/boat-layers/boat-" + templatev + "-left-starboard-view-texture.png");
		$('.print-template-wrapper .second-page img.texture').attr("src",obj.theme + "/images/template-layers/template-page-second-texture-" + templatev + ".png");
		
		
		$('.boat-wrapper.portview img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-" + templatev + "-right-port-view-color-pink.png");
		$('.boat-wrapper.starboard img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-" + templatev + "-left-starboard-view-color-pink.png");
		$('.print-template-wrapper .second-page img.color').attr("src",obj.theme + "/images/template-layers/template-" + templatev + "-page-second-color-pink.png");
		
		
		$('.colorx-holder input.template-variant').val(templatev);
		/* adding template variant - ends here */
		/* adding the first color on restarts */
		$('.colorx-holder div').removeClass().addClass('pink');
		$('.colorx-holder input.selected-color').val('pink');
		
		/* reseting menu if user restarts the customization widouth refresh */
		$('menu div').removeClass('active');
		$('menu div:nth-child(1)').addClass('active');
		
		
		
	});
	/* start boat build - ends */
	
	
	$('.button-holder button.btn-next').on('click', function(){
		var stepNr = $('div.content').attr('class').match(/\d+$/)[0];
		var next = 1;
		var stepNrNext = parseInt(stepNr) + parseInt(next);
		var menu = parseInt(stepNr);
		
		
		if($(this).hasClass('download')||$(this).hasClass('submit')){
			//SUBMIT STEP HERE
		}else{
			$('div.content').removeClass('step'+stepNr).addClass('step'+stepNrNext);
			$('menu div:nth-child('+menu+')').addClass('active');
		}
	});
	
	$('.button-holder button.btn-back').on('click', function(){
		
		var stepNr = $('div.content').attr('class').match(/\d+$/)[0];
		var previous = 1;
		var stepNrPrev = parseInt(stepNr) - parseInt(previous);
		var menu = parseInt(stepNr) - parseInt(previous);

			$('div.content').removeClass('step'+stepNr).addClass('step'+stepNrPrev);
			$('menu div:nth-child('+menu+')').removeClass('active');
		
	});
	
	$( "menu div").each(function() {
		$(this).on("click", function(){
			if($(this).hasClass('active')){
				var menuStepNr = $(this).attr('class').split(" ")[0];
				var menuNr = menuStepNr.match(/\d+$/)[0];
				var menuNrF = parseInt(menuNr) + 1;
				$('div.content').removeClass('step2 step3 step4 step5 step6 step7').addClass('step'+menuNrF);
				$(this).nextAll().removeClass('active');
			}
		});
	});
	
	$('').on('click', function(){
		
	});
	
	/* pick color - starts here */
	
	
	$( ".color-box .color-row .color").each(function() {
		$(this).on("click", function(){

			var color = $(this).attr('class').split(" ")[1];
			var colorxclass = $('.colorx-holder div').attr('class');
			
			$('.colorx-holder div').removeClass().addClass(color);
			$('.colorx-holder .selected-color').val(color);
			
			/* changing the boat color */
			/* tempalet A */
			$('.boat-wrapper.template-a.portview img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-a-right-port-view-color-" + color + ".png");
			$('.boat-wrapper.template-a.starboard img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-a-left-starboard-view-color-" + color + ".png");
			/* tempalet B */
			$('.boat-wrapper.template-b.portview img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-b-right-port-view-color-" + color + ".png");
			$('.boat-wrapper.template-b.starboard img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-b-left-starboard-view-color-" + color + ".png");
			/* tempalet C */
			$('.boat-wrapper.template-c.portview img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-c-right-port-view-color-" + color + ".png");
			$('.boat-wrapper.template-c.starboard img.boat-color').attr("src",obj.theme + "/images/boat-layers/boat-c-left-starboard-view-color-" + color + ".png");
			
			
			/* tempalet A */
			$('.second-page.template-a img.color').attr("src",obj.theme + "/images/template-layers/template-a-page-second-color-" + color + ".png");
			/* tempalet B */
			$('.second-page.template-b img.color').attr("src",obj.theme + "/images/template-layers/template-b-page-second-color-" + color + ".png");
			/* tempalet C */
			$('.second-page.template-c img.color').attr("src",obj.theme + "/images/template-layers/template-c-page-second-color-" + color + ".png");
			
			
		});
	});
	
	/* pick color - ends here */
	
	/* carousel settings - starts */
	$('menu div:last-child a').on('click', function(){

		
//		if(!$(this).hasClass('download')){
//			$('div.content').removeClass('step1 , step2 , step3 , step4 , step5 , step6 , step7 , step8').addClass('gallery');
//		}
		

		
		
	});
	
	
	$('section.slider').carouFredSel({ 
		circular: true,            // Determines whether the carousel should be circular. 
		infinite: true,            // Determines whether the carousel should be infinite. Note: It is possible to create a non-circular, infinite carousel, but it is not possible to create a circular, non-infinite carousel. 
		responsive: false,         // Determines whether the carousel should be responsive. If true, the items will be resized to fill the carousel. 
		direction: "right",         // The direction to scroll the carousel. Possible values: "right", "left", "up" or "down". 
		width: null,               // The width of the carousel. Can be null (width will be calculated), a number, "variable" (automatically resize the carousel when scrolling items with variable widths), "auto" (measure the widest item) or a percentage like "100%" (only applies on horizontal carousels) 
		height: null,              // The height of the carousel. Can be null (width will be calculated), a number, "variable" (automatically resize the carousel when scrolling items with variable heights), "auto" (measure the tallest item) or a percentage like "100%" (only applies on vertical carousels) 
		align: "center",           // Whether and how to align the items inside a fixed width/height. Possible values: "center", "left", "right" or false. 
		padding: null,             // Padding around the carousel (top, right, bottom and left). For example: [10, 20, 30, 40] (top, right, bottom, left) or [0, 50] (top/bottom, left/right). 
		synchronise: null,         // Selector and options for the carousel to synchronise: [string selector, boolean inheritOptions, boolean sameDirection, number deviation] For example: ["#foo2", true, true, 0] 
		cookie: false,             // Determines whether the carousel should start at its last viewed position. The cookie is stored until the browser is closed. Can be a string to set a specific name for the cookie to prevent multiple carousels from using the same cookie. 
		onCreate: null,             // Function that will be called after the carousel has been created. Receives a map of all data.
		fx:"scroll",
		scroll: {
						items: 1,
						duration: 20000,
						timeoutDuration: 0,
						easing: 'linear',
						
						
					}
	});
	
	/*
        $(".center").slick({
	
		infinite: true,
		speed: 10000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: -1,
        variableWidth: false,
		rtl: false,
        dots: false,
        centerMode: false,
		accessibility: false,
		centerMode:false,
		,
		initialSlide: 1,
        

	
		arrows:false,
		rtl: false,
		autoplaySpeed: 0,
		speed: 10000,
        autoplay: true,
		
        slidesToScroll: -1,
		easing: 'linear',
		cssEase: 'linear',
		variableWidth: true,
		loop:false,
		infinite: true
		  });*/
	/* carousel settings - ends */
	
	
	
	/* flag select - strarts here */
	$('select.country-flag').prop('selected', function() {
        return this.defaultSelected;
    });
	
	$('select.country-flag').on('change keyup', function () {
		var countryflag = $('select.country-flag').val();
		$('.country .flag-holder .flag img').attr("src",obj.theme + "/images/flags/" + countryflag + ".png");
		
		$('.boat-wrapper .boat-flag img').attr("src",obj.theme + "/images/flags/" + countryflag + ".png");
		$('.second-page .flag-container img').attr("src",obj.theme + "/images/flags/" + countryflag + ".png");
		
	});
	/* flag select - ends here */
	
	/* boat preview boat side change - starts */
	$( ".boatview .boat-view-container").each(function() {
		$(this).on("click", function(){
			$(this).removeClass('minimized').siblings('.boat-view-container').addClass('minimized');
		});
	});
	/* boat preview boat side change - ends */
	
	
	
});


$(window).ready(function() {
/* max height of divs starts here */

function checkPageHeight() {
   var headerH = $('header').height();
	var menuH = $('.content menu').height();
	var footerH = $('footer').height();
	var contentH = $('form .page-content.submit').height();
	var elemntsH = headerH + menuH + footerH + contentH - 10;
	var windowH = window.innerHeight;

	if(windowH >= elemntsH){
		$('.wrapper').addClass('fit');
	}else{
		$('.wrapper').removeClass('fit');
	}
}
checkPageHeight();

function resizedw(){
    checkPageHeight();
}

var doit;
window.onresize = function(){
  clearTimeout(doit);
  doit = setTimeout(resizedw, 100);
};



/* create glow,reflection of boat - starts */
$( ".boat-view-container .boat-wrapper , .page-content.gallery .boat-wrapper").each(function() {
	var reflection = $(this).html();
	var reflectionClass = $(this).attr('class');
	$(this).append('<div class="reflection-body"><div class=" reflection '+ reflectionClass  +'" >'+ reflection +'</div></div>');

	
});


/* create glow,reflection of boat - ends */
});

function showRequest(formData, jqForm, options) {
    $('.spinner-wrap').show();
    //alert('r');
    //$('#output1').html('Sending...');
    //$('#submit-ajax').attr("disabled", "disabled");
}
function showResponse(res)  {
    $('.error').remove();
    var obj = $.parseJSON( res ),
        p   = $('<p />');


    p.attr( 'class', obj.type );
    p.text( obj.message );
    
    $('div.content').removeClass('step7');
    $('div.content').addClass(obj.step);    
    
    
    if ( obj.type === 'success' ) {
        $('.btn-next.download').attr('href', obj.uri);
        
    }
    
    
    $( '.' + obj.where ).append( p );
    $('.spinner-wrap').hide();
    
    if ( obj.type === 'success' ) {
        $('.love-form')[0].reset();
    }
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var image = document.createElement('img');
            image.addEventListener('load', function() {
                $('p.error').remove();
                if ( image.width > 800 ) {
                    var p   = $('<p />');
                    p.attr( 'class', 'error' );
                    p.text( 'Please select a image with a smaller widh. Max. width must be 800 pixels' );
                    $('.chose-file-text').append( p );
                    return false;
                } else {
                    
                    var encodedImg = e.target.result;
                    
                    
                    $('.chose-file>.image-holder>img').attr('src', e.target.result);
                    $('.boat-view-container .starboard .user-image>img,.boat-view-container .portview .user-image>img').attr('src', e.target.result);
                    $('.print-template-wrapper img.user-image-gen').attr('src', e.target.result);
                                        
                    $('.rotatedimage').attr('value', e.target.result); //hidden form
                    
                    
                    var ajaxdata = $(".encodedimg").serialize();
                    $.post(obj.ajaxurl, ajaxdata, function (res) {
                        var obj = $.parseJSON( res );
                        $('.user-image-first').attr('src', obj.user_image_first);
                        $('.user-image-third').attr('src', obj.user_image_third)
                    });
                    
                }
            });
            image.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
 
function updateCountdown() {
    if ( $('.enter-message').length ) {
        var remaining = 140 - $('.enter-message').val().length;
        $('.countdown').text(remaining + ' characters remaining.');
    }
    
}