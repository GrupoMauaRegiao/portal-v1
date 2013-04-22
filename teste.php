<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" href="http://portalmauaeregiao.com.br/paginas/css/tdefaut.css" />
<!--[if IE]>
  <link rel="stylesheet" href="http://portalmauaeregiao.com.br/paginas/css/tdefaut-ie.css" />
<![endif]-->
 <script src="http://portalmauaeregiao.com.br/paginas/js/jquery.js"></script>
 <script src="http://portalmauaeregiao.com.br/paginas/js/superfish.js"></script>
 <script src="http://portalmauaeregiao.com.br/paginas/js/nivo.slider.js"></script>
 <script src="http://portalmauaeregiao.com.br/paginas/js/nivo-configs.js"></script>
 <script>
  var $ = jQuery.noConflict();
  $(document).ready(function () {
    $('#slider').nivoSlider({
      effect: "sliceDownLeft",
      slices: 20,
      boxCols: 1,
      boxRows: 1,
      animSpeed: 100,
      pauseTime: 5000,
      startSlide: 4,
      directionNav: true,
      directionNavHide: false,
      controlNav: true,
      controlNavThumbs: false,
      pauseOnHover: false,
      manualAdvance: false
    });

    var $slider;
    $slider = $('#slider');

    $slider.on('mouseover', function(evt) {
      evt.preventDefault();
      evt.stopImmediatePropagation();
      evt.stopPropagation();
      $('.nivo-directionNav a').fadeIn(200);
    });

    $slider.on('mouseleave', function(evt) {
      evt.preventDefault();
      evt.stopImmediatePropagation();
      evt.stopPropagation();
      $('.nivo-directionNav a').fadeOut(200);
    });
  });
 </script>

<?php
  include "CriarBannerDestaque.php";
  echo criarBannerDestaque();
?>