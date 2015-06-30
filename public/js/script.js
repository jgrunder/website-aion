$(document).ready(function(){

  /*
   * SLIDER
   */
  $('#bxslider').bxSlider({
    captions: true,
    pager: false,
    nextSelector: '#slider-next',
    prevSelector: '#slider-prev',
    nextText: '',
    prevText: '',
    auto: true
  });

  /*
   * BTN : CONNEXION
   */
  var btnConnexion = $('#btn_connexion');
  
  if(btnConnexion.length > 0){
    btnConnexion.on('click', function(e){
      $('#user_panel').slideToggle();
      e.preventDefault();
    });
  }

});
