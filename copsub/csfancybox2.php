<?php

//  create Fancybox Function  //
function fancybox() {
?>
 
<script type="text/javascript">
 
jQuery(document).ready(function($){	
	$(".fancybox").fancybox({
	});							

	$(".videofbox").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});	
	
	$(".gallery-sb").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 70,
				height	: 70
			}
		}
	});							
	
							

});
</script>
 
<?php 
}
add_action('wp_head', 'fancybox'); 
?>
