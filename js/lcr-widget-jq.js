jQuery('#lcr-hide-widget').hide();

jQuery('.lcr-desktop-button').click(function(){
  jQuery('#lcr-hide-widget').slideToggle();
});

jQuery('#lcr_close_widget').click(function(){
	jQuery('#lcr-hide-widget').hide();
});