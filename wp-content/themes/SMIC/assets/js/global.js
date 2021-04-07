$( document ).ready(function(){
    // wow 
    new WOW().init();


	
  let searchInput = $('.smph_search_input');
  $('.smph_search_button').on('click', e => {
    e.stopPropagation();
    if (searchInput.width() == 0) {
      e.preventDefault();
      searchInput.animate({ width: '150px' }, 300);
      searchInput.focus();
    } else {
      if (!searchInput.val()) {
        e.preventDefault();
        searchInput.animate({ width: '0' }, 300);
      }
    }
  });

  // if($('#smPrimeMagnify').length) {
	 //  magnify("smPrimeMagnify", 2);
  // }
  // if($('#supplyChainMagnify').length) {
	 //  magnify("supplyChainMagnify", 2);
  // }
  // if($('#creatingSustainedMagnify').length) {
	 //  magnify("creatingSustainedMagnify", 2);
  // }
  // if($('#creatingSustainedMagnifyTwo').length) {
	 //  magnify("creatingSustainedMagnifyTwo", 2);
  // }

	var images = document.querySelectorAll(".img-magnifier-container img");
	var image;
	for(var i = 0; i < images.length; i++) {
	  image = images[i];
	  if(image.complete) {
	    magnify(image, 2);
	  } else {
	    image.addEventListener("load", enableMagnify, false);
	  }
	}
	function enableMagnify(e) {
	  magnify(e.currentTarget, 3);
	}


  if($('.full-width-bg').length) {
  	$('.mainbody-content').css('overflow','hidden');
  }

  // Add minus icon for collapse element which is open by default
  let delay = 0.4;
  $(".wow.fadeIn.wowDelay").each(function(){
  	if(delay != 0.8) {
  		delay += 0.4;
  	}
  	$(this).attr('data-wow-delay',delay+'s');
  });

	jQuery(function ($) {
    	"use strict";
    
    	var counterUp = window.counterUp["default"]; // import counterUp from "counterup2"
    
    	var $counters = $(".counter");

    	// const el = document.querySelector( '.counter' );
    	if($counters){
	    	$($counters).each(function( index ) {
	    		// console.log(thfis);
					new Waypoint( {
					    element: this,
					    handler: function() { 
					        counterUp( this.element,{
					        	delay: 10,
					        	time: 1000
					        }) 
					        this.destroy()
					    },
					    offset: 'bottom-in-view',
					} )
				});
	    }

    
  //   	/* Start counting, do this on DOM ready or with Waypoints. */
		// $counters.each(function (ignore, counter) {
		// 	var waypoint = new Waypoint( {
		// 		element: $(this),
		// 		handler: function() { 
		// 			counterUp(counter, {
		// 				duration: 5000,
		// 				delay: 16
		// 			}); 
		// 			this.destroy();
		// 		},
		// 		offset: 'bottom-in-view',
		// 	} );
		// });

	});

	$('.responsible-investments-tabs-container .communities-list a').on('click',function(e){

		e.preventDefault();
		let target_div = $(this).data('target');

		$('.responsible-investments-tabs-container .communities-list a').removeClass('active');
		$(this).addClass('active');

		$('.responsible-investments-tabs-content .ri-tabs-content').removeClass('active');
		$('#'+target_div).addClass('active');


		jQuery(function ($) {
	    	"use strict";
	    
	    	var counterUp = window.counterUp["default"]; // import counterUp from "counterup2"
	    
	    	var $counters = $(".counter");

	    	// const el = document.querySelector( '.counter' );
	    	if($counters){
		    	$($counters).each(function( index ) {
		    		// console.log(this);
						new Waypoint( {
						    element: this,
						    handler: function() { 
						        counterUp( this.element,{
						        	delay: 10,
						        	time: 1000
						        }) 
						        this.destroy()
						    },
						    offset: 'bottom-in-view',
						} )
					});
		    }

	    
	  //   	/* Start counting, do this on DOM ready or with Waypoints. */
			// $counters.each(function (ignore, counter) {
			// 	var waypoint = new Waypoint( {
			// 		element: $(this),
			// 		handler: function() { 
			// 			counterUp(counter, {
			// 				duration: 5000,
			// 				delay: 16
			// 			}); 
			// 			this.destroy();
			// 		},
			// 		offset: 'bottom-in-view',
			// 	} );
			// });

		});


	});



  $('.ocs-inner-wrapper').on('click',function(e){
  	let div_id = $(this).data('div');

  	$('.ocs-inner-wrapper').removeClass('active');
  	$(this).addClass('active');

  	$('.ovcs-inner-table').addClass("hide");
  	$('#'+div_id).removeClass("hide");
  });


  // $('.main-header .menu-item-has-children.dropdown').hover(function() {
		// 	$('.dropdown-menu', this).stop(true, false).slideDown('fast');
		// 		$(this).addClass('show');
  //     }, function() {
		// 		$('.dropdown-menu', this).stop(true, false).slideUp('fast');
		// 		// $('.dropdown-menu', this).hide();
		// 	$(this).removeClass('show');
  // });

  function toggleNavbarMethod() {  
      if ($(window).width() > 768) {  
          $('.main-header .menu-item-has-children.dropdown').on('mouseover', function(){  
              // $('.dropdown-toggle', this).trigger('click');   
							$('.dropdown-menu', this).stop(true, false).slideDown('fast');
							$(this).addClass('show');
          }).on('mouseout', function(){  
              // $('.dropdown-toggle', this).trigger('click').blur();  
							$('.dropdown-menu', this).stop(true, false).slideUp('fast');
							$(this).removeClass('show');
          });  
      }  
      else {  
           
       //    $('.main-header .menu-item-has-children.dropdown').on('clicked', function(){  
       //        // $('.dropdown-toggle', this).trigger('click');   
							// $('.dropdown-menu', this).stop(true, false).slideDown('fast');
							// $(this).addClass('show');
       //    });  

      }  
  }  
  toggleNavbarMethod();  
  $(window).resize(toggleNavbarMethod);  


    // Add minus icon for collapse element which is open by default
    $(".message-section-container .collapse.show").each(function(){
    	$(this).parent().find(".fa").addClass("fa-caret-down").removeClass("fa-caret-right");
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".message-section-container .collapse").on('show.bs.collapse', function(){
    	$(this).parent().find(".fa").removeClass("fa-caret-right").addClass("fa-caret-down");
    	console.log('2');
    }).on('hide.bs.collapse', function(){
    	$(this).parent().find(".fa").removeClass("fa-caret-down").addClass("fa-caret-right");
    	console.log('1');
    });

    // REPORTS CONTAINER
    $('.latest-reports .reports-container').slick({
		  slidesToShow: 6,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 769,
		      settings: {
		        slidesToShow: 5,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 577,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

    // REPORTS CONTAINER
    $('.infographic-slider .smph-inner-container').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		});

    // slider ocv
    $('.slider-ocv-container .smph-inner-subcontainer').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		});

    // global slick
    $('.slick-here').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		});

    // global slick
    $('.slick-here-two').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 576,
		      settings: "unslick"
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

    // REPORTS CONTAINER
    $('.gender-types .stack-container').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		});

    // REPORTS CONTAINER
    $('.inv-overview.press-release-container .section-body .pr-wrapper').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1
		});


    // FEATURED-STORIES
    $('.featured-stories .section-content > .row').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 576,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});


    // FEATURED-STORIES
    $('.more-on-sm-community .section-content > .row').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 576,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

		$('.filter-bod-container #filter_bod').on('change',function(e){

			var bod_id = $(this).val();
			if(bod_id == 'bod_all') {
				$('.bod-wrapper').show();
				return;
			}
			$('.bod-wrapper').hide();
			$('#'+bod_id).show();

		});


    // FEATURED-STORIES
    $('.featured-content-two .section-body .row').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 576,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

		// Set preferred slidesToShow
    // var slidesToShow = 10;
    // var childElements = $('.our-history-container .oh-nav-for ul').children().length;
    // // Check if we can fulfill the preferred slidesToShow
    // if( slidesToShow > (childElements-1) ) {
    //     // Otherwise, make slidesToShow the number of slides - 1
    //     // Has to be -1 otherwise there is nothing to scroll for - all the slides would already be visible
    //     slidesToShow = (childElements-1);
    // }


		var history_wrapper = $('.our-history-container .oh-nav .history-wrapper');
		$(history_wrapper).css('height',get_max_height(history_wrapper));


		$('.our-history-container .oh-nav').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			// fade: true,
			draggable: false,
			vertical: true,
			verticalSwiping: true,
	    infinite: false,
	    adaptiveHeight: true,
		  responsive: [
		    {
		      breakpoint: 577,
		      settings: {
						vertical: false,
					verticalSwiping: false,
					asNavFor: '.our-history-container .oh-nav-for ul'
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]

		});

		$('.our-history-container .oh-nav-for ul').slick({
			slidesToShow: 10,
			slidesToScroll: 10,
			vertical: true,
			// asNavFor: '.our-history-container .oh-nav',
			dots: false,
	    // centerMode: true,
	    // focusOnSelect: true,
	    infinite: false,
	    accessibility: true,
		  responsive: [
		    {
		      breakpoint: 577,
		      settings: {
						vertical: false,
					slidesToShow: 5,
						slidesToScroll: 1,
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});
		// Adjust height of slick list
		let height = $('.our-history-container .oh-nav .slick-current .history-wrapper-container').height();
		$('.our-history-container .oh-nav .slick-list').css('max-height',height  + 40);
		let arrowHeight = $('.our-history-container .oh-nav .slick-current .img-wrapper').height();
		$('.our-history-container .oh-nav .slick-arrow').css('top',arrowHeight  + 35);

		$('.our-history-container .oh-nav-for .slick-slide').on('click', function (event) {
			$('.our-history-container .oh-nav-for .slick-slide').removeClass('slick-current');
			$(this).addClass('slick-current');
		  $('.our-history-container .oh-nav').slick('slickGoTo', $(this).data('slickIndex'));

			// Adjust height of slick list
			let height = $('.our-history-container .oh-nav .slick-current .history-wrapper-container').height();
			$('.our-history-container .oh-nav .slick-list').css('max-height',height  + 40);
			let arrowHeight = $('.our-history-container .oh-nav .slick-current .img-wrapper').height();
			$('.our-history-container .oh-nav .slick-arrow').css('top',arrowHeight  + 35);

		});

		$('.our-history-container .oh-nav-for .slick-next,.our-history-container .oh-nav-for .slick-prev').on('click', function (event) {
			let slickIndex = $(this).parent().find('.slick-current').data('slickIndex');
		  $('.our-history-container .oh-nav').slick('slickGoTo', slickIndex);

			// Adjust height of slick list
			let height = $('.our-history-container .oh-nav .slick-current .history-wrapper-container').height();
			$('.our-history-container .oh-nav .slick-list').css('max-height',height  + 40);
			let arrowHeight = $('.our-history-container .oh-nav .slick-current .img-wrapper').height();
			$('.our-history-container .oh-nav .slick-arrow').css('top',arrowHeight  + 35);
		});

		$('.our-history-container .oh-nav .slick-next,.our-history-container .oh-nav .slick-prev').on('click', function (event) {
			let slickIndex = $(this).parent().find('.slick-current').data('slickIndex');
			$('.our-history-container .oh-nav-for .slick-slide').removeClass('slick-current');
			$('.our-history-container .oh-nav-for ul').find("[data-slick-index='"+slickIndex+"'").addClass('slick-current');

			// Adjust height of slick list
			let height = $('.our-history-container .oh-nav .slick-current .history-wrapper-container').height();
			$('.our-history-container .oh-nav .slick-list').css('max-height',height  + 40);
			let arrowHeight = $('.our-history-container .oh-nav .slick-current .img-wrapper').height();
			$('.our-history-container .oh-nav .slick-arrow').css('top',arrowHeight  + 35);
		});


		$('.our-history-container .oh-nav').on('swipe', function(event, slick, direction){
			let height = $('.our-history-container .oh-nav .slick-current .history-wrapper-container').height();
			$('.our-history-container .oh-nav .slick-list').css('max-height',height  + 40);
			let arrowHeight = $('.our-history-container .oh-nav .slick-current .img-wrapper').height();
			$('.our-history-container .oh-nav .slick-arrow').css('top',arrowHeight  + 35);
			// console.log(direction);
			let slickIndex = $(this).parent().find('.oh-nav').find('.slick-current').data('slickIndex');
			console.log(slickIndex);
			$('.our-history-container .oh-nav-for .slick-slide').removeClass('slick-current');
			$('.our-history-container .oh-nav-for ul').find("[data-slick-index='"+slickIndex+"'").addClass('slick-current');
		  // left
		});

		
		// $('.brand-csr-store-exp .slick-prev,.brand-csr-store-exp .slick-next').on('click',function(event){
		// 	let brandCsrStore = $('.brand-csr-store-exp .slick-current').height();
		// 	$('.brand-csr-store-exp .slick-list').css('max-height',brandCsrStore  + 40);
		// });

		
		// $('.bdo-slick .slick-next,.bdo-slick .slick-prev').on('click',function(event){
		// 	let bdoSlick = $('.bdo-slick .slick-current').height();
		// 	$('.bdo-slick .slick-list').css('max-height',bdoSlick  + 40);
		// });


		var featured_stories_title = $('.featured-stories .featured-stories-wrapper .title');
		$(featured_stories_title).css('min-height',get_max_height(featured_stories_title));

		var featured_stories_paragraph = $('.featured-stories .featured-stories-wrapper p');
		$(featured_stories_paragraph).css('min-height',get_max_height(featured_stories_paragraph));

		var governance_quicklinks_title = $('.governance-quicklinks .quicklinks .quicklinks-title');
		$(governance_quicklinks_title).css('min-height',get_max_height(governance_quicklinks_title));

		var covid_response_title = $('.covid-response-cat-wrapper .title');
		$(covid_response_title).css('min-height',get_max_height(covid_response_title));

		var covid_response_paragraph = $('.covid-response-cat-wrapper .info p');
		$(covid_response_paragraph).css('min-height',get_max_height(covid_response_paragraph));

		var reports_title = $('.reports-wrapper .info .title');
		$(reports_title).css('min-height',get_max_height(reports_title));

		var principles_title = $('.principles-main-container .principles-wrapper .principles');
		$(principles_title).css('min-height',get_max_height(principles_title));

		var gov_quicklinks = $('.governance-quicklinks .quicklinks .quicklinks-title');
		$(gov_quicklinks).css('min-height',get_max_height(gov_quicklinks));

		var multimedia_video = $('.multimedia-video .multimedia-video-wrapper .title');
		$(multimedia_video).css('min-height',get_max_height(multimedia_video));

		


		var ppp = 9; // Post per page
		var mp_taxonomy = $('#more_posts').data('taxonomy');
		var mp_terms_id = $('#more_posts').data('termsid');
		var mp_post = $('#more_posts').data('post');
		let pageNumber = 1;
		// let pageNumberList = 1;
		let pageNumberMedia = 1;

		function load_posts(){
		  pageNumber++;
		  var str = '&taxonomy=' + mp_taxonomy + '&terms_id=' + mp_terms_id + '&post_type=' + mp_post + '&pageNumber=' + pageNumber + '&ppp=' + ppp  + '&action=more_post_ajax';
		  $.ajax({
		      type: "POST",
		      dataType: "html",
		      url: ajax_posts.ajaxurl,
		      data: str,
		      success: function(data){
		          var $data = $(data);
		          if($data.length){
		              $("#ajaxPosts").append($data);
		              $("#more_posts").attr("disabled",false);
		              if($data.length < 6) {
			              $("#more_posts").attr("disabled",true);
			              $("#more_posts").css('background-color','#DEDEDE');	
		              }
		          } else{
		              $("#more_posts").attr("disabled",true);
		              $("#more_posts").css('background-color','#DEDEDE');
		          }
		      },
		      error : function(jqXHR, textStatus, errorThrown) {
		          $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		      }

		  });
		  return false;
		}

		$("#more_posts").on("click",function(){ // When btn is pressed.
		  $("#more_posts").attr("disabled",true); // Disable the button, temp.
		  load_posts();
		});

		$(".more-posts-media").on("click",function(){ // When btn is pressed.
		  let btn = $(this);
		  let ajax_post = $(this).parent().parent().find('.ajax-posts');

		  btn.attr("disabled",true); // Disable the button, temp.

			var ppp = 9; // Post per page
			var mp_taxonomy = $(this).data('taxonomy');
			var mp_terms_id = $(this).data('termsid');
			var mp_post = $(this).data('post');

		  pageNumberMedia++;
		  var str = '&taxonomy=' + mp_taxonomy + '&terms_id=' + mp_terms_id + '&post_type=' + mp_post + '&pageNumber=' + pageNumberMedia + '&ppp=' + ppp  + '&action=more_post_ajax';
		  $.ajax({
		      type: "POST",
		      dataType: "html",
		      url: ajax_posts.ajaxurl,
		      data: str,
		      success: function(data){
		          var $data = $(data);
		          if($data.length){
		              ajax_post.append($data);
		              btn.attr("disabled",false);
		              if($data.length < 6) {
			              btn.attr("disabled",true);
			              btn.css('background-color','#DEDEDE');	
		              }
		          } else{
		              btn.attr("disabled",true);
		              btn.css('background-color','#DEDEDE');
		          }
		      },
		      error : function(jqXHR, textStatus, errorThrown) {
		          $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		      }

		  });
		});

		$(".more-posts-media-list").on("click",function(){ // When btn is pressed.
		  let btn = $(this);
		  let ajax_post = $(this).parent().parent().find('.ajax-posts');

		  btn.attr("disabled",true); // Disable the button, temp.

			var ppp = 5; // Post per page
			var mp_post = $(this).data('post');
			var pageNumberList = $(this).data('page');

		  pageNumberList++;
		  var str = '&post_type=' + mp_post + '&pageNumber=' + pageNumberList + '&ppp=' + ppp  + '&action=more_post_ajax_list';
		  $.ajax({
		      type: "POST",
		      dataType: "html",
		      url: ajax_posts.ajaxurl,
		      data: str,
		      success: function(data){
		          var $data = $(data);
							btn.data('page',pageNumberList);
		          if($data.length){
		              ajax_post.append($data);
		              btn.attr("disabled",false);
		              if($data.length < 5) {
			              btn.attr("disabled",true);
			              btn.css('background-color','#DEDEDE');	
		              }
		          } else{
		              btn.attr("disabled",true);
		              btn.css('background-color','#DEDEDE');
		          }
		      },
		      error : function(jqXHR, textStatus, errorThrown) {
		          $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
		      }

		  });

		});

		$('.media-tabs-container .media-tabs .nav-link').on('click',function(e){


			var divId = $(this).attr('href');

			if(divId.substring(0,1) == '#') {
				e.preventDefault();

				var currentUrl = window.location.href;
				var url = new URL(currentUrl);
				// url.searchParams.set("type", divId.substring(1, divId.length)); // setting your param
				url = url.toString().substring(0, url.toString().indexOf("?"));
			  url += '?type='+ divId.substring(1, divId.length);
			  // debugger

				// var newUrl = url.href; 
				window.location.href = url;
			}


			// $(divId).find('.load-more-wrapper .load-more-btn').data('page','1');

			// $('.media-tabs-container .media-tabs .nav-link').removeClass('active');
			// $(this).addClass('active');

			// $('.media-tabs-content .media-tabs-wrapper').removeClass('active');
			// $(divId).addClass('active');

		});

		if($('body').hasClass('page-id-448')) {
			var divId = getUrlVars()['type'];
			if(divId) {
				if(divId.indexOf("#") == -1) {

					$('.media-tabs-container .media-tabs .nav-link').removeClass('active');
					$('#'+divId+'_link').addClass('active');

					$('.media-tabs-content .media-tabs-wrapper').removeClass('active');
					$('#'+divId).addClass('active');
				}
			}
		}

		$('.head-container li').click(function(){
      var $class = $(this)[0].id;

      $('.unsdg').removeClass('active');
      $(this).addClass('active');

      if( $('.body-container .unsdg-item.'+ $class).hasClass('active')){
        return $('.body-container .unsdg-item.'+ $class).removeClass('active');
      } 

      $('.body-container .unsdg-item').removeClass('active');
      $('.body-container .unsdg-item.'+ $class).addClass('active');
    });
    $('.head-container unsdg-18').click(function(){
      $('.unsdg').removeClass('active');
      $('.unsdg-item').removeClass('active');
    });

    $('.our-matrix .framework-hover, .value-creation-story .ovcs-hover, .sm-prime-pillars .pillar-hover').hover(function(e){
    	div_id = $(this).data('div');
    	$('#'+div_id).toggleClass("active");
    });

		$('.path-to-sg-anchors .path-sg-wrapper').click(function() {
			event.preventDefault();

			$('html, body').animate({
			    scrollTop: $($.attr(this, 'href')).offset().top
			}, 500);

		});

    // Add minus icon for collapse element which is open by default
    $(".faqs-wrapper .collapse.show, .accordion-caret-wrapper .collapse.show").each(function(){
    	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".faqs-wrapper .collapse, .accordion-caret-wrapper .collapse").on('show.bs.collapse', function(){
    	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
    }).on('hide.bs.collapse', function(){
    	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
    });

    // Add minus icon for collapse element which is open by default
    $(".accordion-chevron-wrapper .collapse.show").each(function(){
    	$(this).prev(".card-header").find(".fa").addClass("fa-chevron-down").removeClass("fa-chevron-up");
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".accordion-chevron-wrapper .collapse").on('show.bs.collapse', function(){
    	$(this).prev(".card-header").find(".fa").removeClass("fa-chevron-down").addClass("fa-chevron-up");

		    $(this).find('.counter-value').each(function() {
		    	if(!$(this).hasClass('count-done')){
			      var $this = $(this),
			        countTo = $this.attr('data-count').replace(/,/g, '');
			      $({
			        countNum: $this.text()
			      }).animate({
			          countNum: countTo
			        },

			        {

			          duration: 2000,
			          easing: 'swing',
			          step: function() {
			            $this.text(Math.floor(this.countNum)).digits();
			          },
			          complete: function() {
			            $this.text(this.countNum).digits();
			            //alert('finished');
			          }

			        });
			      $(this).addClass('count-done');
			    }
		    });

    }).on('hide.bs.collapse', function(){
    	$(this).prev(".card-header").find(".fa").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    });

    // $('#content').on('click', '#pagination a', function(e){
    //     e.preventDefault();
    //     var link = $(this).attr('href');
    //     $('#content').fadeOut(500, function(){
    //         $(this).load(link + ' #content', function() {
    //             $(this).fadeIn(500);
    //         });
    //     });
    // });


      // This is required for AJAX to work on our page
			let post_type = $('.ajax-loader-pdf #post_type').val();
			let taxonomy_id = $('.ajax-loader-pdf #taxonomy_id').val();
			let taxonomy_type = $('.ajax-loader-pdf #taxonomy_type').val();
			let post_year = $('.ajax-loader-pdf #post_year').val();


      // Load page 1 as the default
      cvf_load_all_posts(1,post_type,taxonomy_id,taxonomy_type,post_year);
      // cvf_load_awards(1);

      // Handle the clicks
			// $('body').on('click','.awards-citations-container .cvf-universal-pagination li.active',function(){
   //      let page = $(this).attr('p');

   //    // Load page 1 as the default
   //      cvf_load_awards(page);
			// });   

      // Handle the clicks
			$('body').on('click','.cvf-universal-pagination li.active',function(){
        let page = $(this).attr('p');
        let post_type = $('.ajax-loader-pdf #post_type').val();
				let taxonomy_id = $('.ajax-loader-pdf #taxonomy_id').val();
				let taxonomy_type = $('.ajax-loader-pdf #taxonomy_type').val();
				let post_year = $('.ajax-loader-pdf #post_year').val();

      // Load page 1 as the default
        cvf_load_all_posts(page,post_type,taxonomy_id,taxonomy_type,post_year);
			});   

			$('.ajax-loader-pdf #taxonomy_id').on('change',function(){

        let page = 1;
        let post_type = $('.ajax-loader-pdf #post_type').val();
		    let taxonomy_id = $(this).find(':selected').val();
				let taxonomy_type = $('.ajax-loader-pdf #taxonomy_type').val();
				let post_year = $('.ajax-loader-pdf #post_year').val();

        cvf_load_all_posts(page,post_type,taxonomy_id,taxonomy_type,post_year);

			});

			$('.ajax-loader-pdf #post_year').on('change',function(){

        let page = 1;
        let post_type = $('.ajax-loader-pdf #post_type').val();
		    let taxonomy_id = $('.ajax-loader-pdf #taxonomy_id').val();
				let taxonomy_type = $('.ajax-loader-pdf #taxonomy_type').val();
				let post_year = $(this).find(':selected').val();

        cvf_load_all_posts(page,post_type,taxonomy_id,taxonomy_type,post_year);

			});

			$('.media-tabs #select_year').on('change',function(){
				var urlSearch = window.location.search;
				var url = window.location.href;    
				
				if(urlSearch.match("post_year") !== null) {
					if (urlSearch.match("post_year").length > 0) {
						var url = new URL(url);
						url.searchParams.set("post_year", $(this).val());
					}
				} else {

			    if(window.location.href.indexOf('?') != -1) {
					  url += '&post_year='+$(this).val();
			    } else {
					  url += '?post_year='+$(this).val();
			    }
				}
				window.location.href = url;

			});


		var b = 0;
		if($('.ovcs-wrapper-container').length) {
			var topOffset = $('.ovcs-wrapper-container').offset().top - window.innerHeight;
		  if (b == 0 && $(window).scrollTop() > topOffset) {
				var time = 600;

				$('.ovcs-animate').each(function() {
					console.log('time');
					var div_body = $(this);
					setTimeout( function(){ 
						div_body.addClass('ovcs-show');
					}, time)
					time += 600;
				});
				b = 1;
			}
		}


		$('#back-to-top').on('click', function(e) {
		  e.preventDefault();
		  $('html, body').animate({scrollTop:0}, '300');
		});

		$('.back-to-header').on('click',function(e){

			$('html, body').animate({
			  scrollTop: ($(this).parent().parent().parent().offset().top - 50)
			}, 1000);


		});


});


// function cvf_load_awards(page){
//     // Start the transition
//     $('.loader').removeClass('hide');

//     // Data to receive from our server
//     // the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 

// 		var str = '&page='+page+'&action=pagination_ajax_awards';
// 	  $.ajax({
// 	      type: "POST",
// 	      dataType: "html",
// 	      url: ajax_posts.ajaxurl,
// 	      data: str,
// 	      success: function(response){
// 	        // If successful Append the data into our html container
// 	        $(".awards-citations-container .smph-inner-subcontainer").empty().append(response);
// 	        // End the transition
// 			    $('.loader').addClass('hide');
// 	      },
// 	      error : function(jqXHR, textStatus, errorThrown) {
// 	          console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
// 	      }
// 	  });
// }



function cvf_load_all_posts(page,post_type,taxonomy_id = false,taxonomy_type = false,post_year = false){
    // Start the transition
    $('.loader').removeClass('hide');

    // Data to receive from our server
    // the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 

		var str = '&post_year='+post_year+'&taxonomy_type='+taxonomy_type+'&taxonomy_id='+taxonomy_id+'&post_type='+post_type+'&page='+page+'&action=pagination_ajax_list';
	  $.ajax({
	      type: "POST",
	      dataType: "html",
	      url: ajax_posts.ajaxurl,
	      data: str,
	      success: function(response){
	        // If successful Append the data into our html container
	        $(".pdf-file-container.ajax-loader-pdf .section-body").empty().append(response);
	        // End the transition
			    $('.loader').addClass('hide');
	      },
	      error : function(jqXHR, textStatus, errorThrown) {
	          console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	      }
	  });
}


// GET MAX HEIGHT OF ELEMENTS
function get_max_height($className) {

	var maxHeight = Math.max.apply(null, $className.map(function ()
		{return $(this).height();}).get());
	return maxHeight;

}

function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}


var a = 0;
var b = 0;
$(window).scroll(function() {

	

	var c = 0;
	if($('.twogo-svg').length) {
		var topOffset = $('.twogo-svg').offset().top - window.innerHeight;
	  if (c == 0 && $(window).scrollTop() > topOffset) {
			var time = 600;

			$('.twogo-animate').each(function() {
				console.log('time');
				var div_body = $(this);
				setTimeout( function(){ 
					div_body.addClass('twogo-show');
				}, time)
				time += 600;
			});
			c = 1;
		}
	}

	var counter = $('.counter-wrapper');

  if(counter.length) {
  	counter.each(function(){
		  var oTop = $(this).offset().top - window.innerHeight;
		  if ($(window).scrollTop() > oTop) {
		    $(this).find('.counter-value').each(function() {
		    	if(!$(this).hasClass('count-done')){
			      var $this = $(this),
			        countTo = $this.attr('data-count').replace(/,/g, '');
			      $({
			        countNum: $this.text()
			      }).animate({
			          countNum: countTo
			        },

			        {

			          duration: 2000,
			          easing: 'swing',
			          step: function() {
			            $this.text(Math.floor(this.countNum)).digits();
			          },
			          complete: function() {
			            $this.text(this.countNum).digits();
			            //alert('finished');
			          }

			        });
			      $(this).addClass('count-done');
			    }
		    });
		  }
  	});

	}

	if($('.ovcs-wrapper-container').length) {
		var topOffset = $('.ovcs-wrapper-container').offset().top - window.innerHeight;
	  if (b == 0 && $(window).scrollTop() > topOffset) {
			var time = 600;

			$('.ovcs-animate').each(function() {
				console.log('time');
				var div_body = $(this);
				setTimeout( function(){ 
					div_body.addClass('ovcs-show');
				}, time)
				time += 600;
			});
			b = 1;
		}
	}



	var counter = $('.count-wrapper-cws');

  if(counter.length) {
  	counter.each(function(){
		  var oTop = $(this).offset().top - window.innerHeight;
		  if ($(window).scrollTop() > oTop) {
		    $(this).find('.counter-value').each(function() {
		    	if(!$(this).hasClass('count-done')){
			      var $this = $(this),
			        countTo = $this.attr('data-count').replace(/,/g, '');
			      $({
			        countNum: $this.text()
			      }).animate({
			          countNum: countTo
			        },

			        {

			          duration: 2000,
			          easing: 'swing',
			          step: function() {
			            $this.text(Math.floor(this.countNum)).digits();
			          },
			          complete: function() {
			            $this.text(this.countNum).digits();
			            //alert('finished');
			          }

			        });
			      $(this).addClass('count-done');
			    }
		    });
		  }
  	});

	}

  if ($(window).scrollTop() > 500) {
    $('#back-to-top').addClass('show');
  } else {
    $('#back-to-top').removeClass('show');
  }

});

$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}


function magnify(element, zoom) {
  var img, glass, w, h, bw;
  // img = document.getElementById(imgID);
  img = element;

  /* Create magnifier glass: */
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");

  /* Insert magnifier glass: */
  img.parentElement.insertBefore(glass, img);

  /* Set background properties for the magnifier glass: */
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;

  /* Execute a function when someone moves the magnifier glass over the image: */
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /* Prevent the magnifier glass from being positioned outside the image: */
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /* Set the position of the magnifier glass: */
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /* Display what the magnifier glass "sees": */
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}