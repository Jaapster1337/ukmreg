<script type='text/javascript'>
$('document').ready(function(){
	$('body').css({'overflow':'hidden'});
}
</script>
<style>
h3
{
	margin-bottom:0.1em;
}
canvas {
	cursor: default;
	outline: none;
}
</style>
<h3><?php echo $header ?></h3>
<div align="left" id="embed-com.adruijter.kingsvalley1.GwtDefinition">
</div>
<script type="text/javascript" 
		src="<?php echo BASE_URL; ?>public/war/com.adruijter.kingsvalley1.GwtDefinition/com.adruijter.kingsvalley1.GwtDefinition.nocache.js"></script>
<script>
		function handleMouseDown(evt) {
		  evt.preventDefault();
		  evt.stopPropagation();
		  evt.target.style.cursor = 'default';
		}
		
		function handleMouseUp(evt) {
		  evt.preventDefault();
		  evt.stopPropagation();
		  evt.target.style.cursor = '';
		}
		
		document.getElementById('embed-com.adruijter.kingsvalley1.GwtDefinition').addEventListener('mousedown', handleMouseDown, false);
		document.getElementById('embed-com.adruijter.kingsvalley1.GwtDefinition').addEventListener('mouseup', handleMouseUp, false);
	</script>
		
