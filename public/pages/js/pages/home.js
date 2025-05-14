!(function($) {
  "use strict";

  // PT-BR: Jquery mask
  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };
  $('.phone').mask(SPMaskBehavior, spOptions);

  // Preloader
  $(window).on('load', function() {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function() {
        $(this).remove();
      });
    }
  });

  //PT-BR: Carregar sobre
  function pageData() {
    $.post(window.location.origin + '/.callback/website/home.php', {}, 
    function(callback){
      if (callback.bulletin.length) {
          let bulletin = '';
          for (let i = 0; i < callback.bulletin.length; i++) {
            bulletin += '<div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-3" data-aos="zoom-in" data-aos-delay="100">';
            bulletin += '<div class="card">';
            bulletin += '<img src="'+ window.location.origin + '/storage/image/bulletin/' + callback.bulletin[i].image + '" class="card-img-top" alt="CAPA">';
            bulletin += '<div class="card-body">';
            bulletin += '<h5 class="card-title">' + callback.bulletin[i].title + '</h5>';
            bulletin += '<p class="card-text">';
            bulletin += '<small><i class="bx bx-calendar"></i> ' + callback.bulletin[i].date + ' </small><br/>';
            bulletin += '<a href="' + window.location.origin + '/boletim/' + callback.bulletin[i].code + '"><button type="button" class="btn btn-outline-info btn-sm mt-3">Ler boletim</button></a>';
            bulletin += '</p>';
            bulletin += '</div>';
            bulletin += '</div>';
            bulletin += '</div>';
          }
          $('#list_bulletin').html(bulletin);
      }

      if (callback.mission.length) {
          let mission = '';
          for (let i = 0; i < callback.mission.length; i++) {
            mission += '<div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-3">';
            mission += '<div class="mission-card" data-aos="fade-up" data-aos-delay="100">';
            mission += '<div class="mission-img">';
            mission += '<img src="' + window.location.origin + '/storage/image/mission/' + callback.mission[i].image + '" class="img-fluid" alt="">';
            mission += '</div>';
            mission += '<div class="mission-info p-3">';
            mission += '<h4>' + callback.mission[i].title + '</h4>';
            mission += '<p>' + callback.mission[i].description + '...</p>';
            mission += '<a href="' + window.location.origin + '/missao/' + callback.mission[i].code + '"><button type="button" class="btn btn-outline-info btn-sm">Conhecer mais</button></a>';
            mission += '</div>';
            mission += '</div>';
            mission += '</div>';
          }
          document.getElementById('mission_list').innerHTML += mission;
      }

      if (callback.ministry.length) {
        let ministry = '';
          for (let i = 0; i < callback.ministry.length; i++) {
            ministry += '<div class="col-12 col-lg-3 col-md-6 mb-3 d-flex align-items-stretch">';
            ministry += '<div class="ministry" data-aos="fade-up" data-aos-delay="100">';
            ministry += '<div class="ministry-img">';
            ministry += '<img src="' + window.location.origin + '/storage/image/ministry/' + callback.ministry[i].image + '" class="img-fluid" alt="">';
            ministry += '</div>';
            ministry += '<div class="ministry-info">';
            ministry += '<h4>' + callback.ministry[i].title + '</h4>';
            ministry += '<a href="' + window.location.origin + '/ministerio/' + callback.ministry[i].code + '"><button type="button" class="btn btn-outline-info btn-sm">Conhecer</button></a>';
            ministry += '</div>';
            ministry += '</div>';
            ministry += '</div>';
          }

        document.getElementById('ministry_list').innerHTML += ministry;
      }
      if (callback.fixed.length) {
        let socialMedia;
        if (callback.fixed[5].title == 'YOUTUBE') {
          socialMedia = '<a href="' + callback.fixed[5].content + '" class="youtube" target="_blank"><i class="bx bxl-youtube"></i></a>';
        }
        if (callback.fixed[3].title == 'FACEBOOK') {
          socialMedia += '<a href="' + callback.fixed[3].content + '" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>';
        }
        if (callback.fixed[4].title == 'INSTAGRAM') {
          socialMedia += '<a href="' + callback.fixed[4].content + '" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>';
        }
        $('.social-links').html(socialMedia);
        $('.address_contact').html(callback.fixed[0].content);
        $('.email_contact').html(callback.fixed[1].content);
        $('.phone_contact').html(callback.fixed[2].content);
      }

    }, "json");
  }    
  pageData();

  

  // PT-BR: Rolagem suave para o menu de navegação e links com classes .scrollto
  var scrolltoOffset = $('#header').outerHeight() - 2;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      e.preventDefault();
      var target = $(this.hash);
      if (target.length) {
        var scrollto = target.offset().top - scrolltoOffset;
        if ($(this).attr("href") == '#header') {scrollto = 0;}
        $('html, body').animate({scrollTop: scrollto}, 1500, 'easeInOutExpo');
        
        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }
        
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });


  // PT-BR: Ative a rolagem suave no carregamento da página com links hash no url
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({scrollTop: scrollto}, 1500, 'easeInOutExpo');
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.nav-menu, #mobile-nav');

  $(window).on('scroll', function() {
    var cur_pos = $(this).scrollTop() + 200;

    nav_sections.each(function() {
      var top = $(this).offset().top,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        if (cur_pos <= bottom) {
          main_nav.find('li').removeClass('active');
        }
        main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
      }
      if (cur_pos < 300) {
        $(".nav-menu ul:first li:first").addClass('active');
      }
    });
  });

  // Toggle .header-scrolled class to #header when page is scrolled
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 4
      },
      900: {
        items: 6
      }
    }
  });

  // jQuery counterUp
  $('[data-toggle="counter-up"]').counterUp({delay: 10, time: 1000});

  // Init AOS
  function aos_init() {AOS.init({duration: 1000, once: true});}
  $(window).on('load', function() {aos_init();});

})(jQuery);