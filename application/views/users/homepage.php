<style>
.odd
{
	background-color :RGBA(214,214,214,1);
    //border :1px solid black;
	//font-size:1em;
}

.even
{
	background-color:RGBA(214,214,214,0.5);
	//border:1px solid black;
	//font-size:1em;
}

.highlight
{
	background-color:RGBA(200,200,200,1.0);
	//border:1px solid black;
	//font-size:1em;
}

td, th
{
	padding:0.3em 1.0em;
	text-align:center;
}

#product_toevoegen
{
	background-color:RGBA(0,255,0,0.5);
	padding:1em;
	margin:2em 0em;
	display:none;
	height:10px;
	width:440px;
}



</style>
<script type='text/javascript'>
	var show = <?php echo $notify; ?>;
	
	$('document').ready(function(){
		if (show)
		{
			$("#product_toevoegen").fadeIn(800, function()
			{
				$(this).fadeOut(3000);
			});
		}		
		$(".articles tr:even").addClass("even");
		$(".articles tr:odd").addClass("odd");
		$(".articles tr").hover(
			function(){
				$(this).toggleClass('highlight');
			},
			function(){
				$(this).toggleClass('highlight');
			}
		);
	});
</script>

<h3><?php echo $header; ?></h3>
<div id="product_toevoegen">U heeft een product toegevoegd aan uw winkelwagen</div>
<table class='articles'>
	<tr>
		<th>artikelnr.</th>
		<th>productfoto</th>
		<th>productnaam</th>
		<th>prijs</th>
		<th>winkelwagen</th>
	</tr>
	<?php echo $products; ?>
</table>
<?php echo $pagenumbers; ?>