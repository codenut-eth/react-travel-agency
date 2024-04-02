$(document).ready(function () {
  $('.open-target').click(function () {
    var targetId = $(this).attr('data-target');
    var $targetElement = $(this).next('.' + targetId);

    // // Oculta todos os elementos alvo
    // $('.' + targetId).slideUp().addClass('hidden');
    // $('#' + targetId).slideUp().addClass('hidden');

    // Verifica se o próximo elemento com a classe alvo existe
    if ($targetElement.length === 0) {
      $targetElement = $('#' + targetId); // Seleciona o elemento pelo ID
    }

    if ($targetElement.hasClass('hidden')) {
      $targetElement.removeClass('hidden').slideUp(0).slideDown();
    } else {
      $targetElement.slideUp(function () {
        $(this).addClass('hidden');
      });
    }
  });
});



// Tabs Cadastro
var links = document.querySelectorAll('.sec-menu-cadastro ul li a');
var content = document.querySelectorAll('.container-cadastro');
var border = document.querySelector('.sec-menu-cadastro ul li span');
var lis = document.querySelectorAll('.sec-menu-cadastro ul li');

for (let i = 0; i < links.length; i++) {
  links[i].addEventListener('click', function (e) {
    e.preventDefault();
    var activeLinks = document.querySelector('.sec-menu-cadastro ul li a.active');
    var activeContent = document.querySelector('.container-cadastro.active');

    activeLinks.classList.remove('active');
    activeContent.classList.remove('active');

    this.classList.add('active');
    var attr = this.getAttribute('href');

    var active = document.querySelector(attr);

    active.classList.add('active');
  });
}



// Tabs Consulta
var links = document.querySelectorAll('.sec-menu-pesquisa ul li a');
var content = document.querySelectorAll('.container-pesquisa');
var border = document.querySelector('.sec-menu-pesquisa ul li span');
var lis = document.querySelectorAll('.sec-menu-pesquisa ul li');

for (let i = 0; i < links.length; i++) {
  links[i].addEventListener('click', function (e) {
    e.preventDefault();
    var activeLinks = document.querySelector('.sec-menu-pesquisa ul li a.active');
    var activeContent = document.querySelector('.container-pesquisa.active');

    activeLinks.classList.remove('active');
    activeContent.classList.remove('active');

    this.classList.add('active');
    var attr = this.getAttribute('href');

    var active = document.querySelector(attr);

    active.classList.add('active');
  });
}


(function () {

  window.inputNumber = function (el) {

    el.each(function () {
      var $this = $(this);
      var min = $this.attr('min') || false;
      var max = $this.attr('max') || false;
      var $dec = $this.prev('.input-number-decrement');
      var $inc = $this.next('.input-number-increment');

      $dec.on('click', function () {
        decrement($this, min);
      });

      $inc.on('click', function () {
        increment($this, max);
      });
    });

    function decrement(el, min) {
      var value = parseInt(el.val(), 10);
      value--;
      if (!min || value >= min) {
        el.val(value);
      }
    }

    function increment(el, max) {
      var value = parseInt(el.val(), 10);
      value++;
      if (!max || value <= max) {
        el.val(value);
      }
    }
  }
})();

inputNumber($('.input-number'));
