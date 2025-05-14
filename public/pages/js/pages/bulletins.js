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
    function loadBulletin(countNumber) {
        var numberstart = countNumber;

        $.post(window.location.origin + '/.callback/website/listBulletin.php', {start: numberstart}, 
        function(callback){
            if (callback.length) {
                let bulletin = '';
                for (let i = 0; i < callback.length; i++) {
                  bulletin += '<div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-3" data-aos="zoom-in" data-aos-delay="100">';
                  bulletin += '<div class="card">';
                  bulletin += '<img src="'+ window.location.origin + '/storage/image/bulletin/' + callback[i].image + '" class="card-img-top" alt="CAPA">';
                  bulletin += '<div class="card-body">';
                  bulletin += '<h5 class="card-title">' + callback[i].title + '</h5>';
                  bulletin += '<p class="card-text">';
                  bulletin += '<small><i class="bx bx-calendar"></i> ' + callback[i].date + ' </small><br/>';
                  bulletin += '<a href="' + window.location.origin + '/boletim/' + callback[i].code + '"><button type="button" class="btn btn-outline-dark btn-sm mt-3">Ler boletim</button></a>';
                  bulletin += '</p>';
                  bulletin += '</div>';
                  bulletin += '</div>';
                  bulletin += '</div>';
                }
                document.getElementById('list_bulletin').innerHTML += bulletin;
            }

            if (callback.length < 30) {
              $('.btn_more').attr("hidden", true);
            }
        },"json");
    }    
    loadBulletin(countNumber);

     // PT-BR: Botão carregar mais
     $("#view_more").click(function (e) { 
        e.preventDefault();
        countNumber = numberRegister;
        numberRegister = countNumber + 30;
        loadBulletin(countNumber);
    });

  })(jQuery);