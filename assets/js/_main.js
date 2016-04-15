// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var PatisserieKuyt = {
  // All pages
  common: {
    init: function() {
      // Affix
      $('.wrap .content .logo').affix({
        offset: { top: 0, bottom: 0 }
      });
      // Sharrre
      $('#shareme').sharrre({
        share: {
          twitter: true,
          facebook: true,
          googlePlus: true
        },
        template: '<div class="wrapper"><div class="left arrow">Deel deze pagina</div><div class="middle"><a href="#" class="facebook"><i class="fontello-facebook"></i></a><a href="#" class="twitter"><i class="fontello-twitter"></i></a><a href="#" class="googleplus"><i class="fontello-gplus"></i></a></div><div class="right">{total}</div></div>',
        urlCurl: '/wp-content/themes/patisseriekuyt/lib/sharrre.php',
        enableHover: false,
        enableTracking: true,
        render: function(api, options){
          $(api.element).on('click', '.twitter', function() {
              api.openPopup('twitter');
          });
          $(api.element).on('click', '.facebook', function() {
              api.openPopup('facebook');
          });
          $(api.element).on('click', '.googleplus', function() {
              api.openPopup('googlePlus');
          });
        },
        buttons: {}
      });
      // FitVids
      $('.main').fitVids();
      // Menu Highlighting
      if ($('#product-category.nav').children('li').hasClass('active')) {
        $("#menu-hoofdmenu.nav .menu-assortiment").addClass('active');
      }
    }
  },
  // Home page
  post_type_archive_base_product: {
    init: function() {
      // JS here
      $('.banner #menu-hoofdmenu li.menu-assortiment').addClass('active');
    }
  },
  contact: {
    init: function() {
       $(".main").fitMaps({w:'100%', h:'350px'});
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = PatisserieKuyt;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);
