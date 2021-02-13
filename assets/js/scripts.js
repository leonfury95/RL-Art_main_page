// Header modal
$(function(){
$("#send").click(function(){
        var msg = $('#header_modal_body_form form').serialize();
        $.ajax({
          type: 'POST',
          url: '/mail.php',
          data: msg,
          success: function(data) {
            $('.header_form_answer').html(data).slideDown(300);
            console.log(data);
          },
          error:  function(xhr, str){
                $('.header_form_answer').html('Возникла ошибка: ' + xhr.responseCode);
            }
        });
        return false;
    })

});

// scroll plugin
(function($){
    $(window).on("load",function(){
        $("#header_menu a,a[href='#services'],a[href='#mobile_form'],a[rel='m_PageScroll2id']").mPageScroll2id();
    });
})(jQuery);

// Services modal
$(function(){
$("#services_send").click(function(){
        var msg = $('#services_modal_body_form form').serialize();
        $.ajax({
          type: 'POST',
          url: '/ordermail.php',
          data: msg,
          success: function(data) {
            $('.services_form_answer').html(data).slideDown(300);
            console.log(data);
          },
          error:  function(xhr, str){
                $('.services_form_answer').html('Возникла ошибка: ' + xhr.responseCode);
            }
        });
        return false;
    })

});

//popovers
$(function () {
  $('[data-toggle="popover"]').popover()
})

$(function () {
  $('.example-popover').popover({
    container: 'body'
  })
})

//svg
$('img.img-svg').each(function(){
  var $img = $(this);
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');
  $.get(imgURL, function(data) {
    var $svg = $(data).find('svg');
    if(typeof imgClass !== 'undefined') {
      $svg = $svg.attr('class', imgClass+' replaced-svg');
    }
    $svg = $svg.removeAttr('xmlns:a');
    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
      $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
    }
    $img.replaceWith($svg);
  }, 'xml');
});

//feedback form
$(function(){
$("#contact_send").click(function(){
        var msg = $('#contact_main form').serialize();
        $.ajax({
          type: 'POST',
          url: '/feedbackmail.php',
          data: msg,
          success: function(data) {
            $('.contact_form_answer').html(data).slideDown(300);
            console.log(data);
          },
          error:  function(xhr, str){
                $('.contact_form_answer').html('Возникла ошибка: ' + xhr.responseCode);
            }
        });
        return false;
    })

});