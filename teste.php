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
  $(document).ready(function (){
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
      $('.nivo-directionNav a').fadeIn(200);
      evt.preventDefault();
      evt.stopImmediatePropagation();
      evt.stopPropagation();
    });

    $slider.on('mouseleave', function(evt) {
      $('.nivo-directionNav a').fadeOut(200);
      evt.preventDefault();
      evt.stopImmediatePropagation();
      evt.stopPropagation();
    });
  });
 </script>

<?php
  include "CriarBannerDestaque.php";
  echo criarBannerDestaque();
?>