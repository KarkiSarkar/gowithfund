(function ($) {
   "use strict";

  var GaviasElements = {
    init: function(){     
      GaviasElements.initDebouncedresize();
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-testimonials.default', GaviasElements.elementTestimonial);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-posts.default', GaviasElements.elementPosts);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-portfolio.default', GaviasElements.elementPortfolio);
      //elementorFrontend.hooks.addAction('frontend/element_ready/gva-give-forms.default', GaviasElements.elementGiveForms);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-teams.default', GaviasElements.elementTeams);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-information.default', GaviasElements.elementInformation);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-gallery.default', GaviasElements.elementGallery);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-events.default', GaviasElements.elementEvents);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-brand.default', GaviasElements.elementBrand);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-counter.default', GaviasElements.elementCounter);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-services.default', GaviasElements.elementServices);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-icon-box-group.default', GaviasElements.elementIconBoxGroup);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-testimonials-single.default', GaviasElements.elementTestimonialSingle);
      elementorFrontend.hooks.addAction('frontend/element_ready/wp-widget-custom-twitter-feeds-widget.default', GaviasElements.elementCustomTwitterFeeds);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-countdown.default', GaviasElements.elementCountDown);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-box-hover.default', GaviasElements.elementBoxHover);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-video-carousel.default', GaviasElements.elementVideoCarousel);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-content-horizontal.default', GaviasElements.elementContentHorizontal);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-campaign.default', GaviasElements.elementCampaign);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-locations_map.default', GaviasElements.elementLocationMap);
      elementorFrontend.hooks.addAction('frontend/element_ready/gva-user.default', GaviasElements.elementUser);
      elementorFrontend.hooks.addAction('frontend/element_ready/column', GaviasElements.elementColumn);

    },

    initDebouncedresize: function(){
       var $event = $.event,
        $special, resizeTimeout;
        $special = $event.special.debouncedresize = {
          setup: function () {
            $(this).on("resize", $special.handler);
          },
          teardown: function () {
            $(this).off("resize", $special.handler);
          },
          handler: function (event, execAsap) {
            var context = this,
              args = arguments,
              dispatch = function () {
                event.type = "debouncedresize";
                $event.dispatch.apply(context, args);
              };

              if (resizeTimeout) {
                clearTimeout(resizeTimeout);
              }

            execAsap ? dispatch() : resizeTimeout = setTimeout(dispatch, $special.threshold);
          },
        threshold: 150
      };
    },


    elementColumn: function($scope){

      if( ($scope).hasClass('column-style-bg-overflow-right') ){
        
          var left = $scope.offset().left;

          var rwidth = $(window).width() - left + 10;
          // if( ($scope).width() > $(window).width()/2 + 10){
          //   rwidth = $(window).width() + 10;
          // }

          $scope.children('.elementor-widget-wrap').append('<div class="bg-overfolow"></div>');
          $scope.children('.elementor-widget-wrap').children('.bg-overfolow').css('width', rwidth);

          $(window).on("debouncedresize", function(event) {
            var left = $scope.offset().left;
          
            rwidth = $(window).width() - left + 10;
            // if( ($scope).width() > $(window).width()/2 + 10){
            //   rwidth = $(window).width() + 10;
            // }
            $scope.children('.elementor-widget-wrap').children('.bg-overfolow').css('width', rwidth);
          });



      }

      if( ($scope).hasClass('column-style-bg-overflow-left') ){
        
        var right = $scope.offset().right;

        var lwidth = $(window).width() - right + 10;
        // if( ($scope).width() > $(window).width()/2 + 10){
        //   lwidth = $(window).width() + 10;
        // }
        $scope.children('.elementor-widget-wrap').append('<div class="bg-overfolow"></div>');
        $scope.children('.elementor-widget-wrap').children('.bg-overfolow').css('width', lwidth);
        $(window).on("debouncedresize", function(event) {
          lwidth = $(window).width() - right + 10;
          // if( ($scope).width() > $(window).width()/2 + 10){
          //   lwidth = $(window).width() + 10;
          // }
         $scope.children('.elementor-widget-wrap').children('.bg-overfolow').css('width', lwidth);
        });
      }

    },

    elementTestimonial: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementCustomTwitterFeeds: function($scope){
      $scope.find('.ctf-tweets').owlCarousel({
          nav: false,
          autoplay: false,
          autoHeight: false,
          loop: true, 
          dots: true,
          mouseDrag: true,
          touchDrag: true,
          items: 1
        });
    },

    elementTestimonialSingle: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementPosts: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementServices: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementPortfolio: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      GaviasElements.initCarousel($carousel);
      if ( $.fn.isotope ) {
        if($('.isotope-items').length){
          $( '.isotope-items' ).each(function() {
            var $el = $( this ),
                $filter = $( '.portfolio-filter a'),
                $loop =  $( this );

            $loop.isotope();
            
            $(window).load(function() {
              $loop.isotope( 'layout' );
            });
          
            if ( $filter.length > 0 ) {
              $filter.on( 'click', function( e ) {
                e.preventDefault();
                var $a = $(this);
                $filter.removeClass( 'active' );
                $a.addClass( 'active' );
                $loop.isotope({ filter: $a.data( 'filter' ) });
              });
            };
          });
        }
      };

    },

    elementTeams: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementInformation: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementGallery: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementEvents: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementBrand: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementCounter: function($scope){
      var $block = $scope.find('.milestone-block');
      $block.appear(function() {
        var $endNum = parseInt(jQuery(this).find('.milestone-number').text());
        jQuery(this).find('.milestone-number').countTo({
          from: 0,
          to: $endNum,
          speed: 2000,
          refreshInterval: 60,
          formatter: function (value, options) {
            value = value.toFixed(options.decimals);
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '<span>,</span>');
            return value;
          }
        });
      },{accX: 0, accY: 0});
    },
     elementIconBoxGroup: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },
    elementCountDown: function($scope){
      $('[data-countdown="countdown"]').each(function(index, el) {
        var $this = $(this);
        var $date = $this.data('date').split("-");
        $this.gvaCountDown({
          TargetDate:$date[0]+"/"+$date[1]+"/"+$date[2]+" "+$date[3]+":"+$date[4]+":"+$date[5],
          DisplayFormat:"<div class=\"countdown-times\"><div class=\"day\">%%D%% <span class=\"label\">Days</span> </div><div class=\"hours\">%%H%% <span class=\"label\">Hours</span> </div><div class=\"minutes\">%%M%% <span class=\"label\">Minutes</span> </div><div class=\"seconds\">%%S%% <span class=\"label\">Seconds</span></div></div>",
          FinishMessage: "Expired"
        });
      });
    },

    elementBoxHover: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      GaviasElements.initCarousel($carousel);
    },

    elementVideoCarousel: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if (!$carousel.length) { return; }
      GaviasElements.initCarousel($carousel);
    },

    elementGiveForms: function($scope){
      elementorFrontend.waypoint($scope.find('.give__progress-bar'), function () {
        var $progressbar = $(this);
        $progressbar.css('width', $progressbar.data('progress-max'));
      });
      var $carousel = $scope.find('.init-carousel-owl');
      GaviasElements.initCarousel($carousel);
    },

    elementContentHorizontal: function($scope){

      $('.content-hover-horizontal .content-item').on('click', function(){
        $(this).parent().find('.content-item').removeClass('active');
        $(this).addClass('active');
      });

      $('.gva-content-horizontal').each(function(){
        var col = parseInt($(this).attr('data-col'));
        $('.content-hover-horizontal .content-item .image').css('width', ( $('.content-hover-horizontal').width() / (  col  + 1 ) ) - 10 );
      });

      $(window).on("debouncedresize", function(event) {
        $('.gva-content-horizontal').each(function(){
          var col = parseInt($(this).attr('data-col'));
          $('.content-hover-horizontal .content-item .image').css('width', ( $('.content-hover-horizontal').width() / (  col  + 1 ) ) - 10 );
        });
      });
    },

    elementLocationMap: function($scope){
      console.log('test');
      var location_data = [];
      var i = 0;
      $('#locations_map_content .maker-item').each(function(){
        var location_item = [];
        location_item['id'] = $(this).data('id');
        var lat = $(this).data('lat');
        if(lat){
            lat = lat.split(",");
            location_item['latLng'] = [lat[0], lat[1]];
        }
        location_item['data'] = '';
        location_item['options'] = {};
        location_data[i] = location_item;
        i++;
      }); 

      $('#map_canvas_gva_01').gmap3({
        map:{
          options:{
            "draggable": true,
            "mapTypeControl": true,
            "mapTypeId": google.maps.MapTypeId.ROADMAP,
            "scrollwheel": false,
            "panControl": true,
            "rotateControl": false,
            "scaleControl": true,
            "streetViewControl": true,
            "zoomControl": true,
            "center": location_data[0]['latLng'],
            "zoom": 12,
           }
         },
         marker:{
           values: location_data,
           options:{
             draggable: false
           },
           events:{
             click: function(marker, event, context){
               var id = context.id;
               var content = $('div[data-id=' + id + '].maker-item .marker-hidden-content').html();
                 var map = $(this).gmap3("get"),
                   infowindow = $(this).gmap3({get:{name:"infowindow"}});
                 if (infowindow){
                   infowindow.open(map, marker);
                   infowindow.setContent(content);
                 } else {
                   $(this).gmap3({
                     infowindow:{
                       anchor:marker, 
                       options:{content: content}
                     }
                   });
                 }
             }
           }
         }
      });
        
      var map = $('#map_canvas_gva_01').gmap3("get");
      $(".location-item").on('click', function(){
        $('.location-item .location-item-inner').removeClass('active');
        $(this).find('.location-item-inner').first().addClass('active');
        var id = $(this).data('id');
        var marker = $('#map_canvas_gva_01').gmap3({ get: { id: id } });
        new google.maps.event.trigger(marker, 'click');
        map.setCenter(marker.getPosition());
      });
    },

    elementCampaign: function($scope){
      var $carousel = $scope.find('.init-carousel-owl');
      if ($carousel.length) { 
        GaviasElements.initCarousel($carousel);
      }
      
      $("[data-progress-animation]").each(function() {
        var $this = $(this);
        $this.appear(function() {
          var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
          if(delay > 1) $this.css("animation-delay", delay + "ms");
          setTimeout(function() { $this.animate({width: $this.attr("data-progress-animation")}, 1000);}, delay);
        }, {accX: 0, accY: -50});
      });
    },

    elementUser: function($scope){
     
      // $scope.find('.gva-user .login-account').on('click', function(){
      //   if($(this).hasClass('open')){
      //     $(this).removeClass('open');
      //   }else{
      //     $(this).addClass('open');
      //   }
      // });
    },

    initCarousel: function($target){
      if (!$target.length) { return; }
      var items = $target.data('items') ? $target.data('items') : 5;
      var items_lg = $target.data('items_lg') ? $target.data('items_lg') : 4;
      var items_md = $target.data('items_md') ? $target.data('items_md') : 3;
      var items_sm = $target.data('items_sm') ? $target.data('items_sm') : 2;
      var items_xs = $target.data('items_xs') ? $target.data('items_xs') : 1;
      var items_xx = $target.data('items_xx') ? $target.data('items_xx') : 1;
      var loop = $target.data('loop') ? $target.data('loop') : false;
      var speed = $target.data('speed') ? $target.data('speed') : 200;
      var auto_play = $target.data('auto_play') ? $target.data('auto_play') : false;
      var auto_play_speed = $target.data('auto_play_speed') ? $target.data('auto_play_speed') : false;
      var auto_play_timeout = $target.data('auto_play_timeout') ? $target.data('auto_play_timeout') : 1000;
      var auto_play_hover = $target.data('auto_play_hover') ? $target.data('auto_play_hover') : false;
      var navigation = $target.data('navigation') ? $target.data('navigation') : false;
      var pagination = $target.data('pagination') ? $target.data('pagination') : false;
      var mouse_drag = $target.data('mouse_drag') ? $target.data('mouse_drag') : false;
      var touch_drag = $target.data('touch_drag') ? $target.data('touch_drag') : false;
      var center = $target.hasClass('carousel-center') ? true : false;
      var rtl = $('html').attr('dir') == 'rtl' ? true : false;

      $target.owlCarousel({
        center: center,
        nav: navigation,
        autoplay: auto_play,// auto_play,
        autoplayTimeout: auto_play_timeout,
        autoplaySpeed: auto_play_speed,
        autoplayHoverPause: auto_play_hover,
        navText: [ '<span><i class="fas fa-chevron-left"></i></span>', '<span><i class="fas fa-chevron-right"></i></span>' ],
        autoHeight: false,
        loop: loop, 
        dots: pagination,
        rewind: true,
        smartSpeed: speed,
        mouseDrag: mouse_drag,
        touchDrag: touch_drag,
        rtl: rtl,
        responsive : {
          0 : {
            items: 1,
            nav: false
          },
          280 : {
            items: items_xx,
            nav: false
          },
          640 : {
            items : items_xs,
            nav: false
          },
          768 : {
            items : items_sm,
          },
          992: {
            items : items_md
          },
          1200: {
            items: items_lg
          },
          1400: {
            items: items
          }
        }
      }); 
    }
  };
  
  $(window).on('elementor/frontend/init', GaviasElements.init);   

}(jQuery));
