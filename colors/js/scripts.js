"use strict";
var App;
App = App || {};
App.colorgbIO = (function () {
  return {
    criar: function () {
      var lista, item, input, i, len, selecionarInput;
      lista = document.querySelector('ul');
      item = '';

      for (i = 0, len = listaDeCores.cor.length; i < len; i += 1) {
        item += '<li><input type="text" value="' + listaDeCores.cor[i].rgb + '"></li>';
      }

      lista.innerHTML = item;
      item = document.querySelectorAll('li');
      input = document.querySelectorAll('input');

      selecionarInput = function () {
        this.select();
      };

      for (i = 0, len = item.length; i < len; i += 1) {
        item[i].style.backgroundColor = listaDeCores.cor[i].rgb;
        input[i].addEventListener('click', selecionarInput);
      }
    }
  };
}());

App.colorgbIO.criar();