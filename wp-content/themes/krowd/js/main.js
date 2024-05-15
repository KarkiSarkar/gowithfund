(function($) {
  "use strict";
  var GaviasTheme = {
    init: function(){
      this.initResponsive();
      this.initCarousel();
      this.menuMobile();
      this.postMasonry();
      this.scrollTop();
      this.stickyMenu();
      this.campaign();
      this.comment();
      this.other();
      $('.team__progress-bar').each(function(){
        var $progressbar = $(this);
        $progressbar.css('width', $progressbar.data('progress-max'));
      });
      
    },
    initResponsive: function(){
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
    initCarousel: function(){
      $('.init-carousel-owl-theme').each(function(){
        var items = GaviasTheme.carouselOptInit('items', this);
        var items_lg = GaviasTheme.carouselOptInit('items_lg', this);
        var items_md = GaviasTheme.carouselOptInit('items_md', this);
        var items_sm = GaviasTheme.carouselOptInit('items_sm', this);
        var items_xs = GaviasTheme.carouselOptInit('items_xs', this);
        var loop = GaviasTheme.carouselOptInit('loop', this);
        var speed = GaviasTheme.carouselOptInit('speed', this);
        var auto_play = GaviasTheme.carouselOptInit('auto_play', this);
        var auto_play_speed = GaviasTheme.carouselOptInit('auto_play_speed', this);
        var auto_play_timeout = GaviasTheme.carouselOptInit('auto_play_timeout', this);
        var auto_play_hover = GaviasTheme.carouselOptInit('auto_play_hover', this);
        var navigation = GaviasTheme.carouselOptInit('navigation', this);
        var rewind_nav = GaviasTheme.carouselOptInit('rewind_nav', this);
        var pagination = GaviasTheme.carouselOptInit('pagination', this);
        var mouse_drag = GaviasTheme.carouselOptInit('mouse_drag', this);
        var touch_drag = GaviasTheme.carouselOptInit('touch_drag', this);
        var rtl = $('html').attr('dir') == 'rtl' ? true : false;
      
        $(this).owlCarousel({
          nav: navigation,
          autoplay: auto_play,
          autoplayTimeout: auto_play_timeout,
          autoplaySpeed: auto_play_speed,
          autoplayHoverPause: auto_play_hover,
          navText: [ '<span><i class="fas fa-chevron-left"></i></span>', '<span><i class="fas fa-chevron-right"></i></span>' ],
          autoHeight: false,
          loop: loop, 
          dots: pagination,
          rewind: rewind_nav,
          smartSpeed: speed,
          mouseDrag: mouse_drag,
          touchDrag: touch_drag,
          rtl: rtl,
          responsive : {
            0 : {
              items: 1,
              nav: false
            },
            580 : {
              items : items_xs,
              nav: false
            },
            768 : {
              items : items_sm,
              nav: false
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
      }); 
    },

    carouselOptInit: function(opt, context){
      const opts = {
        items: 5, 
        items_lg: 4,
        items_md: 3, 
        items_sm: 2, 
        items_xs: 1,
        loop: false, 
        speed: 200, 
        auto_play: false,
        auto_play_speed: false,
        auto_play_timeout: 1000,
        auto_play_hover: false,
        navigation: false,
        rewind_nav: false,
        pagination: false,
        mouse_drag: false,
        touch_drag: false
      }
      return $(context).data(opt) ? $(context).data(opt) : opts[opt];
    },

    menuMobile: function(){
      $('.gva-offcanvas-content ul.gva-mobile-menu > li:has(ul)').addClass("has-sub");
      $('.gva-offcanvas-content ul.gva-mobile-menu > li:has(ul) > a').after('<span class="caret"></span>');
      $( document ).on('click', '.gva-offcanvas-content ul.gva-mobile-menu > li > .caret', function(e){
        e.preventDefault();
        var checkElement = $(this).next();
        $('.gva-offcanvas-content ul.gva-mobile-menu > li').removeClass('menu-active');
        $(this).closest('li').addClass('menu-active'); 
        
        if((checkElement.is('.submenu-inner')) && (checkElement.is(':visible'))) {
          $(this).closest('li').removeClass('menu-active');
          checkElement.slideUp('normal');
        }
        
        if((checkElement.is('.submenu-inner')) && (!checkElement.is(':visible'))) {
          $('.gva-offcanvas-content ul.gva-mobile-menu .submenu-inner:visible').slideUp('normal');
          checkElement.slideDown('normal');
        }
        
        if (checkElement.is('.submenu-inner')) {
          return false;
        } else {
          return true;  
        }   
      })

      $( document ).on( 'click', '.canvas-menu.gva-offcanvas > a.dropdown-toggle', function(e) {
        e.preventDefault();
        var $style = $(this).data('canvas');
        if($('.gva-offcanvas-content' + $style).hasClass('open')){
          $('.gva-offcanvas-content' + $style).removeClass('open');
          $('#gva-overlay').removeClass('open');
          $('#wp-main-content').removeClass('blur');
        }else{
          $('.gva-offcanvas-content' + $style).addClass('open');
          $('#gva-overlay').addClass('open');
          $('#wp-main-content').addClass('blur');
        }
      });
      $( document ).on( 'click', '#gva-overlay', function(e) {
        e.preventDefault();
        $(this).removeClass('open');
        $('.gva-offcanvas-content').removeClass('open');
        $('#wp-main-content').removeClass('blur');
      })
      $( document ).on( 'click', '.close-canvas', function(e) {
        e.preventDefault();
        $('.gva-offcanvas-content').removeClass('open');
        $('#gva-overlay').removeClass('open');
        $('#wp-main-content').removeClass('blur');
      })

    },

    postMasonry: function(){
      var $container = $('.post-masonry-style');
      $container.imagesLoaded( function(){
        $container.masonry({
          itemSelector : '.item-masory',
          gutterWidth: 0,
          columnWidth: 1,
        }); 
      });
    },

    scrollTop: function(){
      var offset = 300;
      var duration = 500;

      jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
          jQuery('.return-top').fadeIn(duration);
        } else {
          jQuery('.return-top').fadeOut(duration);
        }
      });

      $( document ).on('click', '.return-top, .back-to-top', function(event){
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
      });
    },

    carouselProductThumbnail: function(){
      $('body').imagesLoaded( function(){
        $('.flex-control-nav.flex-control-thumbs').each(function(){
          $(this).owlCarousel({
            nav: true,
            navText: [ '<span><i class="fas fa-chevron-left"></i></span>', '<span><i class="fas fa-chevron-right"></i></span>' ],
            margin: 10,
            dots: false,
            responsive : {
              0 : {
                items: 2,
                nav: false
              },
              640 : {
                items : 3,
                nav: false
              },
              768 : {
                items : 4,
                nav: false
              },
              992: {
                items : 4
              },
              1200: {
                items: 4
              },
              1400: {
                items: 4
              }
            }
          });
        });
      });
    },

    stickyMenu: function(){
      if($('.gv-sticky-menu').length > 0){
        var sticky = new Waypoint.Sticky({
          element: $('.gv-sticky-menu')[0],
        });
      }
    },

    campaign: function(){

      $("[data-progress-animation]").each(function() {
        var $this = $(this);
        $this.appear(function() {
          var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
          if(delay > 1) $this.css("animation-delay", delay + "ms");
          setTimeout(function() { $this.animate({width: $this.attr("data-progress-animation")}, 800);}, delay);
        }, {accX: 0, accY: -50});
      });

      // Add Love Campaign
      $(document).on('click', '.love_this_campaign', function () {
          var campaign_id = $(this).data('campaign-id');
          var html_wrapper = $(this).parent();
          $.ajax({
              type:"POST",
              url: wpcf_ajax_object.ajax_url,
              data: {'action': 'love_campaign_action', 'campaign_id': campaign_id},
              success:function(data){
                data = JSON.parse(data);
                if (data.success == 1){
                  $(html_wrapper).html('<a href="javascript:;" class="remove_from_love_campaign" data-campaign-id="'+campaign_id+'"><i class="wpneo-icon wpneo-icon-love-full"></i></a>');
                }
              },
              error: function(jqXHR, textStatus, errorThrown){
                  wpcf_modal({'success':0, 'message':'Error'})
              }
          });
      });

      // Remove Love Campaign
      $(document).on('click', '.remove_from_love_campaign', function () {
        var campaign_id = $(this).data('campaign-id');
        var html_wrapper = $(this).parent();
        $.ajax({
          type:"POST",
          url: wpcf_ajax_object.ajax_url,
          data: {'action': 'remove_love_campaign_action', 'campaign_id': campaign_id},
          success:function(data){
            data = JSON.parse(data);
            $(html_wrapper).html('<a href="javascript:;" class="love_this_campaign" data-campaign-id="'+campaign_id+'"><i class="wpneo-icon wpneo-icon-love-empty"></i></a>');
          },
          error: function(jqXHR, textStatus, errorThrown){
            wpcf_modal({'success':0, 'message':'Error'})
          }
        });
      });

      $('.wpneo-submit-campaign').on('click', function(){
        $('#wpneofrontenddata .wpneo-form-action').addClass('loading');
      });

      jQuery(document).ajaxComplete(function(event, xhr, settings) {
        if(settings.data){
          if (settings.data.toString().indexOf( "addfrontenddata") != -1) {
            $('#wpneofrontenddata .wpneo-form-action').removeClass('loading');
          }
        }
      });

    },

    comment: function(){
      $('.comment-star-rating > li > a').on('click', function(e){
        e.preventDefault();
        $('.comment-star-rating > li > a').removeClass('active');
        $('.comment-star-rating > li > a i').removeClass('fas fa-star').addClass('far fa-star');
        $(this).addClass('active');
        $(this).addClass('active').find('i').removeClass('far fa-star').addClass('fas fa-star');
        $(this).parents('.comment-rating').find('#comment-rating-ip').val($(this).data('rate'));
      })

      $('.menu-my-account > a').on('click', function(){
        var parent = $(this).parent();
        if(parent.hasClass('open')){
          parent.removeClass('open');
        }else{
          parent.addClass('open');
        }
      });

    },

    other: function(){

      $('.team-block.team-v2 .team-image .socials-team .share-social').on('click', function(e){
        e.preventDefault();
        if($(this).parents('.team-block').hasClass('active')){
          $(this).parents('.team-block').removeClass('active');
        }else{
          $(this).parents('.team-block').addClass('active');
        }
      });

      $('.popup-video').magnificPopup({
        type: 'iframe',
        fixedContentPos: false
      });
      
      $('.gva-user .login-account, .topbar-mobile .login-account').on('click', function(){
        if($(this).hasClass('open')){
          $(this).removeClass('open');
        }else{
          $(this).addClass('open');
        }
      })

      $( document ).on( 'click', '.yith-wcwl-add-button.show a', function() {
        $(this).addClass('loading');
      });

      $(document).on('click', '.gva-search > a.control-search', function(){
        let _this = $(this);
        if($(this).hasClass('search-open')){
          $(this).parents('.gva-search').removeClass('open');
          $(this).removeClass('search-open');
        }else{
          $(this).parents('.gva-search').addClass('open');
          $(this).addClass('search-open');
          setTimeout(function(){ 
            $('.gva-main-search .gva-search input.input-search').focus(); 
           }, 100);
        }
      });

      $('.gva-offcanvas-content .sidebar, .mini-cart-header .dropdown .minicart-content').perfectScrollbar();

      $('[data-toggle="tooltip"]').tooltip()

      $(".lightGallery").lightGallery({
        selector: '.image-item .zoomGallery'
      });

      $('a.tribe-events-button').each(function(e){
        if($(this).children().length == 0){
          $(this).wrapInner('<span></span>')
        }
      });

      // Show password visiblity hover icon on woocommerce forms
    $( '#loginform input#user_pass' ).wrap( '<span class="password-input"></span>' );
    // Add 'password-input' class to the password wrapper in checkout page.
    $( '#loginform input#user_pass' ).filter(':password').parent('span').addClass('password-input');
    $( '.password-input' ).append( '<span class="show-password-input"></span>' );

    $('#wpneo-dashboard-form input[name="email"]').prop('required', true);

    $(document).bind('ajaxSend', function(e, request, settings) {
      if(settings.data){
        if (settings.data.toString().indexOf( "wpneo_dashboard_form") != -1) {
          if( $('#wpneo-dashboard-form input[name="email"]').length > 0 ){
            if( $('#wpneo-dashboard-form input[name="email"]').val() == '' ){
              $('#wpneo-dashboard-form input[name="email"]').focus();
              alert('Email is required');
              request.abort();
            }
          }
        }
      }
    });

    $('.alert .close').on('click', function(e){
      e.preventDefault();
      $(this).parents('.alert').hide();
    });

      $('.wpneo_login_form_div form#loginform').append('<div>'+krowd_data.my_account_link+'</div>');

      // Mini Cart
      $(document).on('click', '.mini-cart-header .mini-cart', function(e){
        e.preventDefault();
        $(this).parent('.mini-cart-inner').addClass('open');
      });
      $(document).on('click', '.mini-cart-header .minicart-overlay', function(e){
        e.preventDefault();
        $(this).parent('.mini-cart-inner').removeClass('open');
      });
      $(document).on('click', '.minicart-close i', function(e){
        e.preventDefault();
        $(this).parents('.mini-cart-inner').removeClass('open');
      });

    }

  }

  $(document).ready(function(){
    GaviasTheme.init();
  })

  $(window).load(function(){
   GaviasTheme.carouselProductThumbnail();
  })

})(jQuery);

