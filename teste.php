<link rel="stylesheet" href="http://portalmauaeregiao.com.br/paginas/css/tdefaut.css" type="text/css" media="all" />
<!--[if IE]><link rel="stylesheet" href="http://portalmauaeregiao.com.br/paginas/css/tdefaut-ie.css" type="text/css" media="all" /><![endif]-->

 <script type="text/javascript" src="http://portalmauaeregiao.com.br/paginas/js/jquery.js"></script>

 <script type="text/javascript" src="http://portalmauaeregiao.com.br/paginas/js/superfish.js"></script>
 <script type="text/javascript" src="http://portalmauaeregiao.com.br/paginas/js/nivo.slider.js"></script>
 <script type="text/javascript" src="http://portalmauaeregiao.com.br/paginas/js/nivo-configs.js"></script>
 
 <script type="text/javascript">
  var $ = jQuery.noConflict();
  
  $(document).ready(function (){
    $('#slider').nivoSlider({
      effect:"sliceDownLeft",
      slices:20,
      boxCols:1,
      boxRows:1,
      animSpeed:100,
      pauseTime:5000,
      startSlide:4,
      directionNav:true,
      directionNavHide:false,
      controlNav:true,
      controlNavThumbs:false,
      pauseOnHover:false,
      manualAdvance:false
    });


    var $slider
    $slider = $('#slider');

    $slider.on('mouseover', function(event) {
      $('.nivo-directionNav a').fadeIn(200);
      event.preventDefault();
      event.stopImmediatePropagation();
      event.stopPropagation();
    });

    $slider.on('mouseleave', function(event) {
      $('.nivo-directionNav a').fadeOut(200);
      event.preventDefault();
      event.stopImmediatePropagation();
      event.stopPropagation();
    });

  });
 </script>

 <?php
include "CriarBannerDestaque.php";
echo criarBannerDestaque();
?>