<?php

//  create Fancybox Function  //
function fancybox() {
?>
 
<script type="text/javascript">
 
	jQuery(document).ready(function($){	
		var select = $('a[href$=".bmp"],a[href$=".gif"],a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".BMP"],a[href$=".GIF"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"]'); // select image files
		select.attr('data-fancybox-group', 'gallery'); //data-fancybox-group is used instead of rel tag in html5
		select.attr('class', 'fancybox'); // ads class tag to image
		select.fancybox();	
 
$(".fancybox").fancybox({
	 beforeShow: function () {
         this.title = $(this.element).find("img").attr("alt"); // shows alt tag as image title
    },
		padding:0, //  settings can be removed to use defaults  //
		margin  : 20,
		wrapCSS    : '',
		openEffect : 'elastic',
		openSpeed  : 650,
                arrows    : true,
	        closeEffect : 'elastic',
                closeSpeed  : 650,
                closeBtn  : true,
	        closeClick : false,
                nextClick  : false,
		prevEffect : 'elastic',
		prevSpeed  : 650,
		nextEffect : 'elastic',
		nextSpeed  : 650,
		pixelRatio: 1, // Set to 2 for retina display support
	     	autoSize   : true,
	        autoHeight : false,
	        autoWidth  : false,
	        autoResize  : true,
	        fitToView   : true,
		aspectRatio : false,
		topRatio    : 0.5,
		leftRatio   : 0.5,
		scrolling : 'auto', // 'auto', 'yes' or 'no'
	        mouseWheel : true,
		autoPlay   : false,
	        playSpeed  : 3000,
		preload    : 3,
	        modal      : false,
		loop       : true,
           helpers : {
	        title : {
		     type : 'inside', // outside
			}
		}
	});							
 
$(".fancybox-media")
	.fancybox({
		openEffect : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',
	        arrows : false,
	helpers : {
		media : {},
		buttons : {}
		}
       });
});
</script>
 
<?php 
}
    add_action('wp_head', 'fancybox'); 

?>
