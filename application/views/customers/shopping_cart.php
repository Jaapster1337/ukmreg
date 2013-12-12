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
	padding:0.3em 0.5em;
	text-align:center;
}

#eerst_inloggen, #order_placed
{
	background-color:RGBA(255,0,0,0.5);
	padding:1em;
	margin:2em 0em;
	display:none;
	height:10px;
	width:570px;
}

#order_placed
{
	background-color:RGBA(0,255,0,0.5);
	padding:1em;
	margin:2em 0em;
	display:none;
	height:30px;
	width:570px;
}

#empty_shopping_cart
{
	background-color:RGBA(255,0,0,0.5);
	padding:1em;
	margin:2em 0em;
	display:none;
	height:30px;
	width:500px;
}

</style>
<script type='text/javascript'>
	var show = <?php echo $notify; ?>;

	$('document').ready(function(){
		if (show == 1)
		{
			$("#eerst_inloggen").fadeIn(3000, function()
			{
				$(this).fadeOut(800);
			});
		}
		else if (show == 2)
		{
			$("#order_placed").fadeIn(3000, function()
			{
				$(this).fadeOut(4000);
			});
		}
		else if (show == 3)
		{
			$("#empty_shopping_cart").fadeIn(3000, function()
			{
				$(this).fadeOut(4000);
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
<div id='eerst_inloggen'>U bent nog niet ingelogd. Voordat u kunt bestellen moet u eerst inloggen</div>
<div id='order_placed'>Uw bestelling is gedaan. Uw boodschappenkar is leeggemaakt u krijgt via de mail een bevestiging van de gekochte producten.</div>
<div id='empty_shopping_cart'>Uw boodschappenkar is leeg. U dient eerst producten in uw boodschappenkar te plaatsen</div>
<table class='articles'>
	<form action='<?php echo BASE_URL; ?>customers/check_login' method='post' >
		<tr>
			<th>artnr.</th>
			<th>productfoto</th>
			<th>productnaam</th>
			<th>omschrijving</th>
			<th>aantal</th>
			<th>&nbsp;</th>
			<th>prijs</th>
			<th>totaal</th>
			<th>&nbsp;</th>
		</tr>
		<?php echo $shopping_cart_items; ?>
		<tr>
			<td colspan='9'>
				<input type='submit' 
					   value='bestel'
					   name='submit' />
			</td>
		</tr>
	</form>
</table>