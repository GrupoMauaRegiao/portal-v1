jQuery(document).ready(function() {

  var linkTopo = jQuery('.menu-base ul li:last a');

  linkTopo.on('click', function (evt) {
    evt.preventDefault();
    evt.stopImmediatePropagation();
    evt.stopPropagation();
    jQuery('html, body').animate({
      scrollTop: 0
    }, 'slow');
  });

  var areaSetas, setaEsquerda, setaDireita;
  areaSetas = jQuery('.setas_area');
  setaEsquerda = jQuery('.seta_anterior');
  setaDireita = jQuery('.seta_proxima');

  jQuery.each(areaSetas, function (i) {
    jQuery(areaSetas).eq(i).css({
      'transition': 'box-shadow 0.3s linear',
      '-webkit-transition': 'box-shadow 0.3s linear',
      '-moz-transition': 'box-shadow 0.3s linear',
      '-o-transition': 'box-shadow 0.3s linear'
    });
  });

  jQuery.each(areaSetas, function (i) {
    jQuery(setaEsquerda).eq(i).mouseover(function () {
      areaSetas.eq(i).css('box-shadow', 'inset 30px 0 50px rgb(180,180,180)');
    });
    jQuery(setaEsquerda).eq(i).mouseleave(function () {
      areaSetas.eq(i).css('box-shadow', 'none');
    });
    jQuery(setaDireita).eq(i).mouseover(function () {
      areaSetas.eq(i).css('box-shadow', 'inset -30px 0 50px rgb(180,180,180)');
    });
    jQuery(setaDireita).eq(i).mouseleave(function () {
      areaSetas.eq(i).css('box-shadow', 'none');
    });
  });

  jQuery('table[width="120"]').css({
    margin:'0 16px 0 0'
  });

  jQuery('td[width="133"]').css({
    height: '145px'
  })

  jQuery('table[width="98%"]').css({
    height: '50px'
  });

  jQuery('table[width="120"]').slice(4,8).css({
    margin: '0 21px 0 0'
  });

  jQuery('table[width="130"]').css({
    margin: '0 0 0 21px'
  });

  jQuery('td[bgcolor="#F7F7F7"]').parent().parent().parent().css({
    'width': '310px',
    'margin': '0 0 5px 0'
  });

  jQuery('td[bgcolor="#F7F7F7"][valign="top"]').parent().parent().parent().css({
    'width': '665px',
    'margin': '0 0 5px 0'
  });

  jQuery('td[width="310"][valign="top"] img').css({
    'width': '310px'
  });

  jQuery('.emprego1').parent().css({
  'height': '35px'
  });

  jQuery('#palavra_chave').on('focus', function () {
    jQuery('.botao-busca-topo').css({
      'background': 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKElEQVR42qVVPWgUQRTenIUWsUlQkUCQi8EQTiHuzO6tpLCwEQtBSKVgKdjZCKYZyN7OjCmtg1hbiGkk8Yzn7e7MaisWVoLgD4h40SMeueRyvl3dn9z+GJIHA7vMt9977/vezCpKGKRfqi7a53UmljGTbcy9HX9p3OtqTH7SqLuk8uZZQA4pe4nK/IsTmLl1IOjnLia+I8u9XMxESOkcEcehiq/Jj4PqmOxg5m0NEO+gmn01l69qBW2uhh8g5vUQd50L5tpEAJibO6RTm4EMP+NKZefM3eWjmYQ6FU8TVfU07tzKwhl3VkYwExuJ9j9mEmpc/ooIqXSL1FG5fSXRevf0g2eHUyDMX/dCzRCpl4sF7w8hmIBQS5U74xmEwWj4gN97mYYqdz9EHS28wumWmQxd3ILX0v8IAf8tMtBqVNKmcO9zCNAtd6FYw/o44LZDA6dJYzgr46OoBeatH7v9eDiPEFHxMMbKDX+G0yAmZ2CzFTst2jCLl3aNTG1tDFG5pMV696u1l9dzncPUvTZ4zPxqZ+/b7yDZFxit7cF9SNDW6JvRXH2wJW4EF0HRWR5Myr1N1bJP5pJO3XsyCsB1HDsfVtvzNTOYu4jTSbtGTY4VjsYp0jiC5lcryHQuItLUpsnKSGiAQRtT6VtIdmaZU1b2G7rZnEwa9M/1lvH3vtxfIOKUwazO7mrFe+UgoZpiAtr9ER0MeFYOGrr5fFKj4i1cZy34Tdz8AyeKxhu89QJFAAAAAElFTkSuQmCC")'
    });
  });

  jQuery('#palavra_chave').on('focusout', function () {
    jQuery('.botao-busca-topo').css({
      'background': 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAB/klEQVR42qWUPUsjQRjHN15xFl6joIhgERGu0ELhrC1sxEIQUinXHvgBbBdOjLgr877ZzM4a/Ahaanv3CY4rrhKEO4VDfIsaTDTrs7ob12SyEX1gip357+95nTGMyEzT7MJCThKudqnwL5nj16NVpY76S4VSiMtxkGaM1xghZABA+wAI2i6hTjD2ZlNBYWS27fZDBMdNgDpEW4H9WvO+TYvzbYGM+ROMe3vxDwC4B9CPVYuNhOe5XO4D5WqdCHXxrPErKysbn7RAEO8kvN9jJr/pM0G94Owq4fhQD3xqwKOIcPkzrTysIOeenasqY+xjqwiiimuzjlC2Q+8yACo3akzksA5YjwQ3r5kGSPWgkRFxvugEtWgkavDZ1XG8hPofA23qjuki/BcLMFXf02dVDoPuLp4Gx3F6dBFuN1IQ6nx52expC+Sq1Oiy41+HM9wi2mTuBHT6LAEtI+bNJDUIuUNw/fxEvQPMvEWt1yAIMhgXF1qvmjoHR78hg6M4zeQi3CvnhehLqU9xKXwIUu9y0wKHt2treLAtNJ8XfWFkGvBdWDPCpPU40C/Pqsh1hzo9GN22Tcds7E4jxKZMhHrjBmxy+VkTaQWhQtZ4q1FaGk02KIKeRe/l26xQ2MqGz9sLKFd/jPeYZckRIrzTxGScGu81ixZHYXZ/hSkTpr4+AAcE95S+NS+hAAAAAElFTkSuQmCC")'
    });
  });

  jQuery('#label').on('focus', function () {
    jQuery('.botao-busca-rodape').css({
      'background': 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAACKElEQVR42qVVPWgUQRTenIUWsUlQkUCQi8EQTiHuzO6tpLCwEQtBSKVgKdjZCKYZyN7OjCmtg1hbiGkk8Yzn7e7MaisWVoLgD4h40SMeueRyvl3dn9z+GJIHA7vMt9977/vezCpKGKRfqi7a53UmljGTbcy9HX9p3OtqTH7SqLuk8uZZQA4pe4nK/IsTmLl1IOjnLia+I8u9XMxESOkcEcehiq/Jj4PqmOxg5m0NEO+gmn01l69qBW2uhh8g5vUQd50L5tpEAJibO6RTm4EMP+NKZefM3eWjmYQ6FU8TVfU07tzKwhl3VkYwExuJ9j9mEmpc/ooIqXSL1FG5fSXRevf0g2eHUyDMX/dCzRCpl4sF7w8hmIBQS5U74xmEwWj4gN97mYYqdz9EHS28wumWmQxd3ILX0v8IAf8tMtBqVNKmcO9zCNAtd6FYw/o44LZDA6dJYzgr46OoBeatH7v9eDiPEFHxMMbKDX+G0yAmZ2CzFTst2jCLl3aNTG1tDFG5pMV696u1l9dzncPUvTZ4zPxqZ+/b7yDZFxit7cF9SNDW6JvRXH2wJW4EF0HRWR5Myr1N1bJP5pJO3XsyCsB1HDsfVtvzNTOYu4jTSbtGTY4VjsYp0jiC5lcryHQuItLUpsnKSGiAQRtT6VtIdmaZU1b2G7rZnEwa9M/1lvH3vtxfIOKUwazO7mrFe+UgoZpiAtr9ER0MeFYOGrr5fFKj4i1cZy34Tdz8AyeKxhu89QJFAAAAAElFTkSuQmCC")'
    });
  });

  jQuery('#label').on('focusout', function () {
    jQuery('.botao-busca-rodape').css({
      'background': 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAB/klEQVR42qWUPUsjQRjHN15xFl6joIhgERGu0ELhrC1sxEIQUinXHvgBbBdOjLgr877ZzM4a/Ahaanv3CY4rrhKEO4VDfIsaTDTrs7ob12SyEX1gip357+95nTGMyEzT7MJCThKudqnwL5nj16NVpY76S4VSiMtxkGaM1xghZABA+wAI2i6hTjD2ZlNBYWS27fZDBMdNgDpEW4H9WvO+TYvzbYGM+ROMe3vxDwC4B9CPVYuNhOe5XO4D5WqdCHXxrPErKysbn7RAEO8kvN9jJr/pM0G94Owq4fhQD3xqwKOIcPkzrTysIOeenasqY+xjqwiiimuzjlC2Q+8yACo3akzksA5YjwQ3r5kGSPWgkRFxvugEtWgkavDZ1XG8hPofA23qjuki/BcLMFXf02dVDoPuLp4Gx3F6dBFuN1IQ6nx52expC+Sq1Oiy41+HM9wi2mTuBHT6LAEtI+bNJDUIuUNw/fxEvQPMvEWt1yAIMhgXF1qvmjoHR78hg6M4zeQi3CvnhehLqU9xKXwIUu9y0wKHt2treLAtNJ8XfWFkGvBdWDPCpPU40C/Pqsh1hzo9GN22Tcds7E4jxKZMhHrjBmxy+VkTaQWhQtZ4q1FaGk02KIKeRe/l26xQ2MqGz9sLKFd/jPeYZckRIrzTxGScGu81ixZHYXZ/hSkTpr4+AAcE95S+NS+hAAAAAElFTkSuQmCC")'
    });
  });

  // Browser
  jQuery.browser = {};
  jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
  jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
  jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
  jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());

  if (jQuery.browser.mozilla) {
    jQuery('.campo-busca').css({
      'margin': '4px 0 0 -115px'
    });

    jQuery('.botao-busca-rodape').css({
      'margin': '6px 0 0 -25px'
    });
  } else if(jQuery.browser.opera) {
    jQuery('.campo-busca-topo').css({
      'margin': '0 0 0 0'
    });

    jQuery('.label-busca-topo').css({
      'margin': '0 0 0 210px !important'
    });

    jQuery('.botao-busca-topo').css({
      'margin': '-23px 0 0 234px'
    });

    jQuery('.campo-busca').css({
      'margin': '0 0 0 -95px'
    });

    jQuery('.botao-busca-rodape').css({
      'margin': '-23px 0 0 159px'
    });
  }

  jQuery('#mudaFonte p span').last().attr('style','font-weight:900 !important;font-size:12px !important;');

  function getDefaultValue(field) {
    return jQuery(field).val();
  }

  function defaultFormating(field) {
    return jQuery(field).removeClass('campo-ativo');
  }

  function focusFormating(field) {
    return jQuery(field).addClass('campo-ativo');
  }

  function cleanField(field) {
    var defaultValue;
    defaultValue = getDefaultValue(field);

    jQuery(field).on('focus', function () {
      var val;
      val = jQuery(this).val();
      jQuery(this).val(val === '' ? '' : val === defaultValue ? '' : val);
      focusFormating(this);
    });

    jQuery(field).on('focusout', function () {
      var val;
      val = jQuery(this).val();
      jQuery(this).val(val === '' ? defaultValue : val);
      defaultFormating(this);
    });
  }

  cleanField('#nome');
  cleanField('#email');
  cleanField('#campo-nome');
  cleanField('#campo-email');
  cleanField('#campo-mensagem');

  function randomizarGuiaComercial(){
    function indexAleatorio(limite) {
      return Math.floor(Math.random()*limite);
    }

    var itemGuiaComercial, limite;
    itemGuiaComercial = jQuery('.item-guia-comercial');
    limite = itemGuiaComercial.length;

    itemGuiaComercial.removeClass('item-destacado');
    itemGuiaComercial.eq(indexAleatorio(limite)).addClass('item-destacado');
  }
  randomizarGuiaComercial();

  function enviarEmail() {
    var botaoEnviar, campoNome, campoEmail;
    botaoEnviar = jQuery('#botao-enviar');
    campoNome = jQuery('#campo-nome');
    campoEmail = jQuery('#campo-email');
    campoMensagem = jQuery('#campo-mensagem');

    function animarCampo(campo, speed) {
      jQuery(campo)
        .animate({
          'margin-left': -60
        }, speed)
        .animate({
          'margin-left': +60
        }, speed)
        .animate({
          'margin-left': 0
        }, speed);
    }

    botaoEnviar.on('click', function (evt) {
      evt.preventDefault();
      evt.stopImmediatePropagation();
      evt.stopPropagation();

      if (jQuery.isNumeric(campoNome.val()) || campoNome.val() === 'Nome') {
        animarCampo('#campo-nome', 200);
        campoNome.addClass('error').focus();
      } else if (jQuery.isNumeric(campoEmail.val()) || campoEmail.val() === 'E-mail') {
        animarCampo('#campo-email', 200);
        campoEmail.addClass('error').focus();
      } else if (jQuery.isNumeric(campoMensagem.val()) || campoMensagem.val() === 'Mensagem') {
        animarCampo('#campo-mensagem', 200);
        campoMensagem.addClass('error').focus();
      } else {
        // Enviando e-mail
        var nome, email, mensagem, informacao;
        nome = jQuery('#campo-nome').val();
        email = jQuery('#campo-email').val();
        mensagem = jQuery('#campo-mensagem').val();
        informacao = 'campo-nome=' + nome +
                     '&campo-email=' + email +
                     '&campo-mensagem=' + mensagem;

        jQuery.ajax({
          type: "POST",
          url: window.location.host + '/enviar-email.php',
          cache: false,
          data: informacao
        }).done(function () {
          var form;
          form = jQuery('.formulario-fale-conosco');
          form.children().hide('slow');
          jQuery('<p>Obrigado <span>' + nome + '</span>. <br />Sua mensagem foi enviada para nós com sucesso!</p>').appendTo(form);
        });
      }
    });
  }

  enviarEmail();

  function randomizarVideosDestaques() {
    var videos;
    videos = jQuery('.videos-categorias .video');
    videos.removeClass('destacar');
    videos.eq(Math.floor(Math.random() * 5)).addClass('destacar');
  }

  setInterval(function () {
    randomizarVideosDestaques();
  }, 1000);

});


// FUNCOES QUE VALIDAM CPF E CNPJ
  function gE(ID) {
    return document.getElementById(ID);
  }

  function checa() {
    msg = "";

    if (gE('cnpj').value === "") {
      msg = msg+"O preenchimento do campo ["+gE('cnpj').value+"] é obrigatório.\n";
    }

    if (msg !== "") {
      alert(msg);
      return false;
    } else {
        return true;
    }
  }

  function TESTA(CNUMB, CTYPE) {
    if (CNUMB === "") {
      return true;
    }

    bok = false;
    bok = isCpfCnpj(ParseNumb(CNUMB));
    
    if (!bok) {
      alert(CTYPE+" inválido!");
      gE('cnpj').value = "";
    }

    return bok;
  }

  function ClearStr(str, char) {
    while((cx = str.indexOf(char)) !== -1) {
      str = str.substring(0, cx) + str.substring(cx + 1);
    }
    return str;
  }

  function ParseNumb(c) {
    c = ClearStr(c, '-');
    c = ClearStr(c, '/');
    c = ClearStr(c, ',');
    c = ClearStr(c, '.');
    c = ClearStr(c, '(');
    c = ClearStr(c, ')');
    c = ClearStr(c, ' ');

    if ((parseFloat(c) / c !== 1)) {
      if (parseFloat(c) * c === 0) {
        return(c);
      } else {
        return(0);
      }
    } else {
      return(c);
    }
  }

  function Verify(CNUMB, CTYPE) {
    CNUMB = ParseNumb(CNUMB);
    
    if (CNUMB === 0) {
      return false;
    } else {
      g = CNUMB.length - 2;

      if (TestDigit(CNUMB, CTYPE, g)) {
        g = CNUMB.length - 1;

        if (TestDigit(CNUMB, CTYPE, g)) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }
  }

  function TestDigit(CNUMB, CTYPE, g) {
    var dig = 0;
    var ind = 2;

    if (CTYPE !== 'CNPJ') {
      var a = true;

      for (t = 0; t < CNUMB.length - 1; t += 1) {
        if (CNUMB.substring(t, t + 1) !== CNUMB.substring( t + 1, t + 2)) {
          a = false;
        }

        if (a) {
          return false;
        }
      }
    }

    for (f = g; f > 0; f -= 1) {
      dig += parseInt(CNUMB.charAt(f - 1)) * ind;

      if (CTYPE === 'CNPJ') {
        if (ind > 8) {
          ind = 2;
        } else {
          ind += 1;
        }
      } else {
        ind += 1;
      }
    }

    dig %= 11;

    if (dig < 2) {
      dig = 0;
    } else {
      dig = 11 - dig;
    }

    if (dig !== parseInt(CNUMB.charAt(g))) {
      return false;
    } else {
      return true;
    }
  }

  pj = 'Digite o CNPJ:';
  pf = 'Digite o CPF:';

  function escreveLayer(tipo) {
    vbrowser = (document.getElementById) ? 0 : ((document.all) ? 0 : 1);
    
    if (vbrowser === 0){
      MM_findObj('fgpto').innerHTML = tipo;
    } else {
      MM_findObj('fgpto').document.open();
      MM_findObj('fgpto').document.write(tipo);
      MM_findObj('fgpto').document.close();
    }
  }

  function formataCNPJ(cp, tipo) {
    if ((event.keyCode < 48) || (event.keyCode > 57)){
      return false;
    } else {
      var v = cp.value;
      
      if (tipo === 'CNPJ') {
        var maxlen = 18;
        
        if (v.length >= maxlen) {
          return false;
        }
      }

      if (v.length === 2 || v.length === 6) {
        cp.value = v + '.';
      } else if (v.length === 10) {
        cp.value = v + '/';
      } else if (v.length == 15) {
        cp.value = v + '-';
      } else {
        var maxlen = 14;

        if (v.length >= maxlen) {
          return false;
        }
      }

      if (v.length === 3 || v.length === 7) {
        cp.value = v + '.';
      } else if (v.length === 11) {
        cp.value = v + '-';
      }

    }
  }


  function MM_findObj(n, d) {



    var p,i,x;



    if(!d) d=document;



      if((p=n.indexOf("?"))>0&&parent.frames.length){



      d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);



      }



        if(!(x=d[n])&&d.all) x=d.all[n];



          for (i=0;!x&&i<d.forms.length;i++)



          x=d.forms[i][n];



            for(i=0;!x&&d.layers&&i<d.layers.length;i++)



            x=MM_findObj(n,d.layers[i].document);



              if(!x && d.getElementById)



              x=d.getElementById(n);



              return x;



  }











//Chama flash no site (correção do IE)



function exibeFash(swf, width, height, wmode, cache){



noCache = ""; //cache || cache == undefined ? "" : "?" + new Date();



wmode = wmode || wmode == undefined ? "opaque" : "transparent";







monta_swf = "";



monta_swf += "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\""+ width +"\" height=\""+ height +"\" title=\"\">";



monta_swf += "<param name=\"movie\" value=\""+ swf + noCache +"\" />";



monta_swf += "<param name=\"quality\" value=\"high\" />";



monta_swf += "<param name=\"menu\" value=\"0\" />";



monta_swf += "<param name=\"wmode\" value=\""+ wmode +"\" />";



monta_swf += "<embed src=\""+ swf + noCache +"\" quality=\"high\" wmode=\""+ wmode +"\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\""+ width +"\" height=\""+ height +"\"></embed>";



monta_swf += "</object>";







document.write(monta_swf);



}











function MSN(URL) {



  var width = 406;



  var height = 286;



  var left = 50;



  var top = 10



  window.open(URL, 'MSN', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







function Enviar(URL) {



  var width = 490;



  var height = 360;



  var left = 50;



  var top = 10



  window.open(URL, 'Enviar', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







function Comprar(url) {



  window.open(url,'comprar','width=535, height=230, top=12, left=15, scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







function cores(url) {



  window.open(url,'cores','width=225, height=169, top=10, left=10, scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







function AbreFotoAgenda(url) {



  window.open(url,'fotoagenda','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150');



}







function AbreAudio(URL) {



  var width = 300;



  var height = 195;



  var left = 50;



  var top = 10



  window.open(URL, 'audio', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







function confirmaExclusao(aURL) {



  if(confirm('Você tem certeza que deseja excluir?')) {



  location.href = aURL;



  }



}







function confirmaPedido(aURL) {



  if(confirm('Você tem certeza que deseja confirmar este pedido?')) {



  location.href = aURL;



  }



}







function mudaPedido(aURL) {



  if(confirm('Você tem certeza que deseja mudar este pedido p/ orçamento?')) {



  location.href = aURL;



  }



}











function AbreListaProdutos(URL) {



  var width = 675;



  var height = 450;



  var left = 50;



  var top = 10



  window.open(URL, 'AbreListaProdutos', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







function AtualizaValores(aURL) {



  if(confirm('Você tem certeza que deseja atualizar os valores deste orçamento?')) {



  location.href = aURL;



  }



}











function confirmaEntrega(aURL) {



  if(confirm('Você tem certeza que deseja confirmar a entrega deste pedido?')) {



  location.href = aURL;



  }



}







function mudaEntrega(aURL) {



  if(confirm('Você tem certeza que deseja mudar este pedido p/ nao entregue?')) {



  location.href = aURL;



  }



}







// FUNCAO SELEIONA TODOS REGISTROS PRA EXCLUIR



cont321 = 0;



function SelectAll() { 



  for (var i=0; i<document.FORMLISTA.elements.length; i++){



  var x = document.FORMLISTA.elements[i];



      if (x.id == 'check_sel') { 



        if (cont321 == 0){



          x.checked = true;



        } else {



          x.checked = false;



      }



    } 



  }







  if (cont321 == 0){    



  var elem = document.getElementById("sel_todos");



  elem.value = "Desmarcar todos";



  cont321 = 1;



  } else {



  var elem = document.getElementById("sel_todos");



  elem.value = "Selecionar todos";



  cont321 = 0;



  }   



}











// FUNCAO SELEIONA TODOS REGISTROS PRA EXCLUIR



function checkdeletetion(){



   if (!confirm("Você realmente deseja deletar este registro.") == false )



   FORMLISTA.submit();



}







function confirmaBloqueio(aURL) {



  if(confirm('Você tem certeza disso?')) {



  location.href = aURL;



  }



}







// FORMATAR CAMPO COM MASCARA



function FormatarCampo(src, mask){



var i = src.value.length;



var saida = mask.substring(0,1);



var texto = mask.substring(i)



  if (texto.substring(0,1) != saida){



  src.value += texto.substring(0,1);



    }



}











// FUNCAO DE IMPRIMIR



function Imprimir(URL) {



  var width = 650;



  var height = 500;



  var left = 50;



  var top = 10



  window.open(URL, 'imprimir', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}







// FUNCAO DE EFEITO NAS FOTOS



function makevisible(cur,which){



  if (which==0){



  cur.filters.alpha.opacity=85;



  } else {



  cur.filters.alpha.opacity=100;



  }



}











function ValidaEmail(email) {



  return email.search(/(\w[\w[\w\.\+]+)@(.+)\.(\w+)$/)==0; 



}







function gE(ID) {



  return document.getElementById(ID);



}







function gEs(tag) {



  return document.getElementsByTagName(tag);



}











// PESQUISA QUAL É O BROWSER



function Pesquisa(){



var Dados = null;



  try {



  // Firefox, Opera 8.0+, Safari



  Dados = new XMLHttpRequest();



  } catch (e) {



  //Internet Explorer



    try {



    Dados = new ActiveXObject("Msxml2.XMLHTTP");



    } catch (e) {



    Dados = new ActiveXObject("Microsoft.XMLHTTP");



    }



  }



return Dados;



}











// FUNCAO MOSTRA DADOS



var Dados



function MostrarDados(arquivo, id, campo) {



Dados = Pesquisa();







var url = arquivo+id;







Dados.open("GET", url, true)



Dados.onreadystatechange = function(){



  if (Dados.readyState==1) { // Cria o efeito de loading



  loading(true, campo);



  }



  if (Dados.readyState==4 || Dados.readyState=="complete") {// Remove o efeito de loading



  //loading(false, campo);



  gE(campo).innerHTML = Dados.responseText;



  }



}



Dados.send(null)



}



  







// FUNCAO MOSTRA ID



function MostraID(id, campo, campo1, campo2){



//gE(campo).value = id;



var selecao = gE(campo); //document.getElementById("loja");



var item = selecao.options[selecao.selectedIndex].value.split("|");



gE(campo1).value = item[0];



gE(campo2).value = item[1];



}







// FUNCAO PEGA URL



function PegaURL(id, campo){



gE(campo).value = id;



}











// FUNCAO MONTA VALOR



// Formata números no padrão americano para o brasileiro   



function FormataValor(number) {   



    number = String(number.toFixed(2)).replace(/\./, ',');   



    return number;   



}    



  



//MontaValor(this.value, 'periodo_pgto', 'valor', 'texto')



function MontaValor(id, campo1, campo2, campo3){



var Periodo = gE(campo1).value;



var ValorM = gE(campo2).value;







  if(Periodo==1){



  var Taxa = 0;



  var TaxaT = " (sem desconto ";



  }



  if(Periodo==3){



  var Taxa = 0.025;



  var TaxaT = " (valor com desconto de 2,5%, ";



  }



  if(Periodo==6){



  var Taxa = 0.05;



  var TaxaT = " (valor com desconto de 5%, ";



  }



  if(Periodo==12){



  var Taxa = 0.10;



  var TaxaT = " (valor com desconto de 10%, ";



  }



  



    var Valor = Periodo*ValorM;



    var Desconto = Periodo*ValorM*Taxa;



    var ValorT = Valor-Desconto;







      var Valor5 = FormataValor(Valor);



      var Desconto5 = FormataValor(Desconto);



      var ValorT5 = FormataValor(ValorT);







var texto = Periodo+' x ' + ValorM + ' = ' + Valor5 + TaxaT + ValorT5 + ')';







gE(campo3).innerHTML = texto;







//alert('Valor: '+Valor+' Valor Desc: '+Desconto+' = '+ValorT);



}







// CRIA EFEITO LOADING



function loading(act, campo) {



  if(act == true){



  var loading = "<div align='center'><img src='http://www.construmaqonline.com.br/images/layout/img_carregando7.gif'></div>";



  gE(campo).innerHTML = loading;



  }



  if(act == false){



  //FechaDIV('Carregando');



  var bgBody = gE(campo);



  bgBody.parentNode.removeChild(bgBody);



  }



}











// FUNCAO FECHA DIV



function FechaDIV(campo){



//gE(campo).style.visibility = 'hidden';



gE(campo).style.display = 'none';



}







// FUNCAO AUMENTA E DIMINUI FONTE DAS NOTICIAS



function aumentar(campo){



fontSize += 3;



gE(campo).style.fontSize = fontSize + "px";



}



function diminuir(campo){



fontSize -= 3;



gE(campo).style.fontSize = fontSize + "px";



}







// FUNCAO BUSCA CIDADE NO CLIMA TEMPO



function BuscaCidade(url, valor){



  if(valor==''){



  alert('preencha o campo nome');



  gE('nome').focus();



  } else {



  var vaipra = url+valor;



  window.open(vaipra);



  }



}







// FUNCAO QUE EXIBE MENSAGEM NA BARRA DE STATUS



function ExibeMensagem(){ 



window.status = mensagem_status;



timerID= setTimeout("ExibeMensagem()", 0);



}







function Fotos(url, descricao, campo1, campo2, largura){



gE(campo1).src = "thumbs.php?w="+largura+"&imagem=images/"+url;



gE(campo2).title = descricao;



gE(campo2).href = "thumbs.php?w="+largura+"&imagem=images/"+url;



}











function PopUp(arquivo, nome, largura, altura, rolagem) {



window.open(arquivo, nome, 'width='+largura+', height='+altura+', top=50, left=50, scrollbars='+rolagem+', status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');



}











//INICIO DE CHECAGEM DA RESOLUÇÃO DA TELA



function ResolucaoTela(strCookie, strValor, strDias){



var dtmData = new Date();



    if(strDias){



    dtmData.setTime(dtmData.getTime() + (strDias * 24 * 60 * 60 * 1000));



    var strExpires = "; expires=" + dtmData.toGMTString();



    } else {



    var strExpires = "";



    }



    document.cookie = strCookie + "=" + strValor + strExpires + "; path=/";



}