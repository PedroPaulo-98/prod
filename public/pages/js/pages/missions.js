!(function($) {
    "use strict";

     // Preloader
     $(window).on('load', function() {
        if ($('#preloader').length) {
        $('#preloader').delay(100).fadeOut('slow', function() {
            $(this).remove();
        });
        }
    });
  
    // PT-BR: Navegação móvel
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
  
    // PT-BR: Ação do botão de voltar ao topo
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
  
    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({delay: 10, time: 1000});

    // Init AOS
    function aos_init() {AOS.init({duration: 1000, once: true});}
    $(window).on('load', function() {aos_init();});

    var countNumber = 0;
    var numberRegister = 30;
    function loadMission(countNumber) {
        var numberstart = countNumber;

        $.post(window.location.origin + '/.callback/website/listMission.php', {start: numberstart}, 
        function(callback){
            if (callback.length) {
                let mission = '';
                for (let i = 0; i < callback.length; i++) {
                    mission += '<div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-3">';
                    mission += '<div class="mission-card" data-aos="fade-up" data-aos-delay="100">';
                    mission += '<div class="mission-img">';
                    mission += '<img src="' + window.location.origin + '/storage/image/mission/' + callback[i].image + '" class="img-fluid" alt="">';
                    mission += '</div>';
                    mission += '<div class="mission-info p-3">';
                    mission += '<h4>' + callback[i].title + '</h4>';
                    mission += '<p>' + callback[i].description + '...</p>';
                    mission += '<a href="' + window.location.origin + '/missao/' + callback[i].code + '"><button type="button" class="btn btn-outline-info btn-sm">Conhecer mais</button></a>';
                    mission += '</div>';
                    mission += '</div>';
                    mission += '</div>';
                }
                document.getElementById('list_mission').innerHTML += mission;
            }
            if (callback.length < 30) {
                $('.btn_more').attr("hidden", true);
            }
        },"json");
    }    
    loadMission(countNumber);

     // PT-BR: Botão carregar mais
     $("#view_more").click(function (e) { 
        e.preventDefault();
        countNumber = numberRegister;
        numberRegister = countNumber + 30;
        loadBulletin(countNumber);
    });

  })(jQuery);