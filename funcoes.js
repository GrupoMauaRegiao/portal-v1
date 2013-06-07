jQuery(document).ready(function () {
  "use strict";
  var linkTopo, areaSetas, setaEsquerda, setaDireita;
  linkTopo = jQuery('.menu-base ul li:last a');
  areaSetas = jQuery('.setas_area');
  setaEsquerda = jQuery('.seta_anterior');
  setaDireita = jQuery('.seta_proxima');

  linkTopo.on('click', function (evt) {
    evt.preventDefault();
    evt.stopImmediatePropagation();
    evt.stopPropagation();
    jQuery('html, body').animate({
      scrollTop: 0
    }, 'slow');
  });

  jQuery.each(areaSetas, function (i) {
    jQuery(areaSetas).eq(i).css('transition', 'box-shadow 0.3s linear');
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

  jQuery('table[width="120"]').css('margin', '0 16px 0 0');
  jQuery('td[width="133"]').css('height', '145px');
  jQuery('table[width="98%"]').css('height', '50px');
  jQuery('table[width="120"]').slice(4, 8).css('margin', '0 21px 0 0');
  jQuery('table[width="130"]').css('margin', '0 0 0 21px');

  jQuery('td[bgcolor="#F7F7F7"]').parent().parent().parent().css({
    'width': '310px',
    'margin': '0 0 5px 0'
  });

  jQuery('td[bgcolor="#F7F7F7"][valign="top"]').parent().parent().parent().css({
    'width': '665px',
    'margin': '0 0 5px 0'
  });

  jQuery('td[width="310"][valign="top"] img').css('width', '310px');
  jQuery('.emprego1').parent().css('height', '35px');

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

  jQuery('.titulos-noticias').last().css('margin', '0 0 0 -40px');
  jQuery('.fundo_titulo_home').first().css('margin', '0 0 0 -10px');

  // Browser
  jQuery.browser = {};
  jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
  jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());

  if (jQuery.browser.mozilla) {
    jQuery('.campo-busca').css('margin', '4px 0 0 -115px');
    jQuery('.botao-busca-rodape').css('margin', '6px 0 0 -25px');
  } else if (jQuery.browser.opera) {
    jQuery('.campo-busca-topo').css('margin', '0 0 0 0');
    jQuery('.label-busca-topo').css('margin', '0 0 0 210px !important');
    jQuery('.botao-busca-topo').css('margin', '-23px 0 0 234px');
    jQuery('.campo-busca').css('margin', '0 0 0 -95px');
    jQuery('.botao-busca-rodape').css('margin', '-23px 0 0 159px');
  }

  jQuery('#mudaFonte p span').last().attr('style', 'font-weight:900 !important;font-size:12px !important;');

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

  function randomizarGuiaComercial() {
    function indexAleatorio(limite) {
      return Math.floor(Math.random() * limite);
    }

    var itemGuiaComercial, limite;
    itemGuiaComercial = jQuery('.item-guia-comercial');
    limite = itemGuiaComercial.length;

    itemGuiaComercial.removeClass('item-destacado');
    itemGuiaComercial.eq(indexAleatorio(limite)).addClass('item-destacado');
  }

  function enviarEmail() {
    var botaoEnviar, campoNome, campoEmail, campoMensagem;
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
          jQuery('<p>Obrigado <span>' + nome + '</span>. <br />Sua mensagem foi enviada para n&oacute;s com sucesso!</p>').appendTo(form);
        });
      }
    });
  }

  function randomizarVideosDestaquesAte(limite) {
    var videos;
    videos = jQuery('.videos-categorias .video');
    setInterval(function () {
      videos.removeClass('destacar');
      videos.eq(Math.floor(Math.random() * limite)).addClass('destacar');
    }, 1000);
  }

  function fecharAnuncioPopup() {
    var botaoFechar, anuncio, contador, segundos, interval;
    botaoFechar = jQuery('.fechar');
    anuncio = jQuery('.anuncio-popup');
    contador = jQuery('.contador');
    segundos = 11;

    interval = setInterval(function () {
      if (segundos === 1) {
        contador.text(segundos);
        clearInterval(interval);
        anuncio.fadeOut(500);
      } else {
        contador.text(segundos -= 1);
      }
    }, 1000);

    botaoFechar.on('click', function () {
      anuncio.fadeOut(500);
      clearInterval(interval);
      jQuery(this).off('click');
    });
  }

  function abrePopupRedesSociais() {
    var links;
    links = jQuery('.link-rede-social');
    links.on('click', function (evt) {
      evt.preventDefault();
      evt.stopImmediatePropagation();
      evt.stopPropagation();
      window.open(jQuery(this).attr('href'), "Compartilhar", "height=500, width=600, modal=yes, alwaysRaised=yes");
    });
  }

  function alterarTamanhoFonte() {
    var botAumentar, botDiminuir, txt, SIZEPADRAO, sizeAtual, SIZEMAX, FATOR, i, len, expr;
    botAumentar = jQuery('.aumentar-fonte');
    botDiminuir = jQuery('.diminuir-fonte');
    txt = jQuery('.o-texto span span');
    SIZEPADRAO = 14;
    sizeAtual = SIZEPADRAO;
    SIZEMAX = 26;
    FATOR = 4;

    for (i = 0, len = txt.length; i < len; i += 1) {
      txt.eq(i).attr('style', "font:" + SIZEPADRAO + "px 'Asap',Arial,sans-serif !important;");
    }

    botAumentar.on('click', function () {
      expr = sizeAtual < SIZEMAX ? sizeAtual += FATOR : sizeAtual;
      for (i = 0, len = txt.length; i < len; i += 1) {
        txt.eq(i).attr('style', "font:" + sizeAtual + "px 'Asap',Arial,sans-serif !important;");
      }
    });

    botDiminuir.on('click', function () {
      expr = sizeAtual > SIZEPADRAO ? sizeAtual -= FATOR : sizeAtual;
      for (i = 0, len = txt.length; i < len; i += 1) {
        txt.eq(i).attr('style', "font:" + sizeAtual + "px 'Asap',Arial,sans-serif !important;");
      }
    });
  }

  function efeitoFatosEFotos() {
    var link, miniatura, mostrarImagem, ocultarImagem, i, len;
    link = jQuery('.outras-noticias a');
    miniatura = jQuery('.miniatura');

    mostrarImagem = function (evt) {
      var index = jQuery(this).attr('data-index');
      evt.stopPropagation();
      evt.stopImmediatePropagation();
      evt.preventDefault();
      miniatura.eq(index).slideDown(300);
    };

    ocultarImagem = function (evt) {
      var index = jQuery(this).attr('data-index');
      evt.stopPropagation();
      evt.stopImmediatePropagation();
      evt.preventDefault();
      miniatura.eq(index).stop().slideUp(300);
    };

    for (i = 0, len = miniatura.length; i < len; i += 1) {
      link.eq(i).on('mouseover', mostrarImagem);
      link.eq(i).on('mouseleave', ocultarImagem);
    }
  }

  function removeNegrito1stPalavra() {
    var palavra, arrPalavras;
    palavra = jQuery('.dialogo h1');
    arrPalavras = palavra.text().split(' ');

    palavra.html(palavra.text().replace(arrPalavras[0], '<span>' + arrPalavras[0] + '</span>'));
  }

  function insereCategoriaDaNoticia() {
    var paginaAtual, categoria, palavra;
    paginaAtual = window.location.pathname;

    if (paginaAtual.match("/noticia/")) {
      categoria = jQuery('.mais-noticias h2 span');
      palavra = jQuery('.dialogo h1');
      palavra.text(categoria.text());
    }
  }

  function obtemPostsColunistas() {
    var colunistas, loading, ultimasColunas, prefixo, mostrarConteudo, i, len, link;
    colunistas = jQuery('.o-colunista .imagem');
    loading = jQuery('.loading');
    ultimasColunas = jQuery('.ultimas-colunas .colunas');

    mostrarConteudo = function (evt) {
      var $this, seletorArtigo;
      $this = jQuery(this);
      seletorArtigo = '.ultimas-colunas .colunas .artigos';
      link = $this.find('a').attr('href');

      if (document.location.host.match('www')) {
        prefixo = link.split('//');
        prefixo[1] = '//www.' + prefixo[1];
        link = prefixo[0] + prefixo[1];
      }

      loading.show();
      ultimasColunas.html('');
      ultimasColunas.load(link + " .artigos:lt(2)", function () {
        loading.hide();
        jQuery('.ultimas-colunas').css({
          'opacity': 1,
          'z-index': 9999,
          '-webkit-transform': 'translateX(' + ($this.position().left - 95) + 'px) ' +
                               'translateY(' + ($this.position().top - 230) + 'px) ',
          'transform': 'translateX(' + ($this.position().left - 95) + 'px)' +
                       'translateY(' + ($this.position().top - 150) + 'px)'
        });
        jQuery(seletorArtigo + ' .artigo')
          .removeClass('artigo')
          .addClass('ultimo-artigo');
        jQuery(seletorArtigo + ' .ultimo-artigo .data').remove();
        jQuery(seletorArtigo + ' .ultimo-artigo .titulo .icone').remove();

        if (jQuery(seletorArtigo + ' .ultimo-artigo .titulo .o-titulo p').eq(0).text().length > 49) {
          jQuery(seletorArtigo + ' .ultimo-artigo .titulo .o-titulo p')
            .eq(0)
            .text(jQuery(seletorArtigo + ' .ultimo-artigo .titulo .o-titulo').eq(0).text().slice(0, 50) + '\u2026');
        }

        if (jQuery(seletorArtigo + ' .ultimo-artigo .titulo .o-titulo p').eq(1).text().length > 49) {
          jQuery(seletorArtigo + ' .ultimo-artigo .titulo .o-titulo p')
            .eq(1)
            .text(jQuery(seletorArtigo + ' .ultimo-artigo .titulo .o-titulo').eq(1).text().slice(0, 50) + '\u2026');
        }
      });

      evt.stopPropagation();
      evt.stopImmediatePropagation();
      evt.preventDefault();
    };

    for (i = 0, len = colunistas.length; i < len; i += 1) {
      colunistas.eq(i).on('mouseover', mostrarConteudo);
    }
  }

  function controlarCaracteresFilmes() {
    var titulos, i, len;
    titulos = jQuery('.titulo-filme a');

    for (i = 0, len = titulos.length; i < len; i += 1) {
      if (titulos.eq(i).text().length > 51) {
        titulos.eq(i).text(titulos.eq(i).text().slice(0, 52) + '\u2026');
      }
    }
  }

  function abrirModalGuiaComercial() {
    var imagens, i, modalNum, len, abreModal;
    imagens = jQuery('.multimidia .imagens .imagem');
    modalNum = 0;

    abreModal = function (evt) {
      var novaURL, novaTag;
      novaURL = jQuery(this).html().replace('200', '400').replace('100', '300');
      novaTag = jQuery(this).append('<div class="modal-' + (modalNum += 1) + '">' + novaURL + '</div>');

      jQuery('.modal-' + modalNum).dialog({
        title: 'Guia Comercial',
        modal: true,
        width: 400,
        height: 364,
        draggable: false,
        resizable: false,
        show: function () {
          jQuery(this).effect('fadeIn', 5000);
        },
        hide: function () {
          jQuery(this).effect('fadeOut', 1000);
        }
      });

      evt.stopPropagation();
      evt.stopImmediatePropagation();
      evt.preventDefault();
    };

    for (i = 0, len = imagens.length; i < len; i += 1) {
      imagens.eq(i).on('click', abreModal);
    }
  }

  cleanField('#nome');
  cleanField('#email');
  cleanField('#campo-nome');
  cleanField('#campo-email');
  cleanField('#campo-mensagem');
  controlarCaracteresFilmes();
  randomizarGuiaComercial();
  enviarEmail();
  randomizarVideosDestaquesAte(5);
  fecharAnuncioPopup();
  abrePopupRedesSociais();
  alterarTamanhoFonte();
  efeitoFatosEFotos();
  insereCategoriaDaNoticia();
  removeNegrito1stPalavra();
  obtemPostsColunistas();
  abrirModalGuiaComercial();
});

// IE
function exibeFash(swf, width, height, wmode, cache) {
  var monta_swf;
  monta_swf = '';
  monta_swf += '<object type="application/x-shockwave-flash" data="' + swf + '" width="' + width + '" height="' + height + '">';
  monta_swf += '<param name="movie" value="' + swf + '" />';
  monta_swf += '<param name="quality" value="high" />';
  monta_swf += '</object>';
  document.write(monta_swf);
}

function Enviar(URL) {
  var width, height, left, top;
  width = 490;
  height = 360;
  left = 50;
  top = 10;

  window.open(URL,
    'Enviar', 'width=' + width + ', ' +
    'height=' + height + ', ' +
    'top=' + top + ', ' +
    'left=' + left + ', ' +
    'scrollbars=no, ' +
    'status=no, ' +
    'toolbar=no, ' +
    'location=no, ' +
    'directories=no, ' +
    'menubar=no, ' +
    'resizable=no, ' +
    'fullscreen=no');
}


function AbreAudio(URL) {
  var width, height, left, top;
  width = 300;
  height = 195;
  left = 50;
  top = 10;

  window.open(URL,
    'audio', 'width=' + width + ', ' +
    'height=' + height + ', ' +
    'top=' + top + ', ' +
    'left=' + left + ', ' +
    'scrollbars=no, ' +
    'status=no, ' +
    'toolbar=no, ' +
    'location=no, ' +
    'directories=no, ' +
    'menubar=no, ' +
    'resizable=no, ' +
    'fullscreen=no');
}

function SelectAll() {
  var cont321, i, len, doc, x, elem;
  cont321 = 0;
  doc = document;

  for (i = 0, len = doc.FORMLISTA.elements.length; i < len; i += 1) {
    x = doc.FORMLISTA.elements[i];

    if (x.id === 'check_sel') {
      if (cont321 === 0) {
        x.checked = true;
      } else {
        x.checked = false;
      }
    }
  }

  if (cont321 === 0) {
    elem = doc.getElementById("sel_todos");
    elem.value = "Desmarcar todos";
    cont321 = 1;
  } else {
    elem = doc.getElementById("sel_todos");
    elem.value = "Selecionar todos";
    cont321 = 0;
  }
}

function checkdeletetion() {
  if (window.confirm("Voc&ecirc; realmente deseja deletar este registro.") === true) {
    document.FORMLISTA.submit();
  }
}

function confirmaBloqueio(aURL) {
  if (window.confirm('Voc&ecirc; tem certeza disso?')) {
    location.href = aURL;
  }
}

function FormatarCampo(src, mask) {
  var i, saida, texto;
  i = src.value.length;
  saida = mask.substring(0, 1);
  texto = mask.substring(i);

  if (texto.substring(0, 1) !== saida) {
    src.value += texto.substring(0, 1);
  }
}

function Imprimir(URL) {
  var width, height, left, top;
  width = 650;
  height = 500;
  left = 50;
  top = 10;

  window.open(URL,
    'imprimir', 'width=' + width + ', ' +
    'height=' + height + ', ' +
    'top=' + top + ', ' +
    'left=' + left + ', ' +
    'scrollbars=yes, ' +
    'status=no, ' +
    'toolbar=no, ' +
    'location=no, ' +
    'directories=no, ' +
    'menubar=no, ' +
    'resizable=no, ' +
    'fullscreen=no');
}

function makevisible(cur, which) {
  if (which === 0) {
    cur.setAttribute('style',
      '-webkit-filter: opacity(85%);' +
      'filter: opacity(85%)');
  } else {
    cur.setAttribute('style',
      '-webkit-filter: opacity(100%);' +
      'filter: opacity(100%)');
  }
}

function gE(ID) {
  return document.getElementById(ID);
}

function MostraID(id, campo, campo1, campo2) {
  var selecao, item;
  selecao = gE(campo);
  item = selecao.options[selecao.selectedIndex].value.split("|");

  gE(campo1).value = item[0];
  gE(campo2).value = item[1];
}

function PegaURL(id, campo) {
  gE(campo).value = id;
}

function FormataValor(number) {
  number = String(number.toFixed(2)).replace(/\./, ',');
  return number;
}

function FechaDIV(campo) {
  gE(campo).style.display = 'none';
}

function aumentar(campo) {
  var fontSize;
  fontSize += 3;
  gE(campo).style.fontSize = fontSize + "px";
}

function diminuir(campo) {
  var fontSize;
  fontSize -= 3;
  gE(campo).style.fontSize = fontSize + "px";
}

function BuscaCidade(url, valor) {
  var vaipra;

  if (valor === '') {
    window.alert('Preencha o campo nome!');
    gE('nome').focus();
  } else {
    vaipra = url + valor;
    window.open(vaipra);
  }
}

function Fotos(url, descricao, campo1, campo2, largura) {
  gE(campo1).src = "thumbs.php?w=" + largura + "&imagem=images/" + url;
  gE(campo2).title = descricao;
  gE(campo2).href = "thumbs.php?w=" + largura + "&imagem=images/" + url;
}

function PopUp(arquivo, nome, largura, altura, rolagem) {
  window.open(arquivo,
    nome, 'width=' + largura + ', ' +
    'height=' + altura + ', ' +
    'top=50, ' +
    'left=50, ' +
    'scrollbars=' + rolagem + ', ' +
    'status=no, ' +
    'toolbar=no, ' +
    'location=no, ' +
    'directories=no, ' +
    'menubar=no, ' +
    'resizable=no, ' +
    'fullscreen=no');
}