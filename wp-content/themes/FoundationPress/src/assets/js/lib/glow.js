$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return (elementBottom-200 > viewportTop && elementTop < viewportBottom);
};


if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

$(window).on('resize scroll', function() {
  $('.project-img').each(function() {
    //  var activeColor = $(this).attr('id');
    if ($(this).isInViewport()) {
      $(this).attr('id', 'onview');
    } else {
      $(this).removeAttr('id');
    }
  });
});
}
