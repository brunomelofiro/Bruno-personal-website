import $ from 'jquery';

$.ajax({
  dataType: 'jsonp',
  url: 'https://api.github.com/repos/olefredrik/foundationpress?callback=foundationpressGithub&access_token=ed6229228dbc763038dbf1e68d0d8a4a0935b38a',
  success: function (response) {
    if (response && response.data.watchers) {
      var watchers = (Math.round((response.data.watchers / 100), 10) / 10).toFixed(1);
      $('#stargazers a').html(watchers + 'k stargazers');
    }
  }
});

$(document).ready( function() {

	// Logo
	var $logo 	= $('#logo');
	 if (location.href.indexOf("#") != -1) {
        if(location.href.substr(location.href.indexOf("#"))!='#about'){
        	$logo.show();
        }
    }

	// Show logo
	$('#tab-container .tab a').click(function() {
	  $logo.slideDown('slow');
	});
	// Hide logo
	$('#tab-about').click(function() {
	  $logo.slideUp('slow');
	});
function animMeter(){
    $(".meter > span").each(function() {
                $(this)
                    .data("origWidth", $(this).width())
                    .width(0)
                    .animate({
                        width: $(this).data("origWidth")
                    }, 1200);
            });
}
animMeter();

      $('#tab-container').easytabs({
        animate			: true,
        updateHash		: true,
        transitionIn	: 'slideDown',
        transitionOut	: 'slideUp',
        animationSpeed	: 600,
        tabActiveClass	: 'active'}).bind('easytabs:midTransition', function(event, $clicked, $targetPanel){
            if($targetPanel.selector=='#resume'){
                    animMeter();
            }
        });
    });
