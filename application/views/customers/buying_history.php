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

</style>
<script type='text/javascript'>
	//var show = <?php echo $notify; ?>;

	$('document').ready(function(){
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
<?php echo $header; ?>

<table>
	<tr class='articles'>
		<th>artnr.</th>
		<th>productfoto</th>
		<th>productnaam</th>
		<th>omschrijving</th>
		<th>aantal</th>
		<th>prijs</th>
		<th>totaal</th>
	</tr>
	<?php echo $orders; ?>
</table>