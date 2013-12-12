<style>
th, td
{
	width: 75px;
	border: 1px solid grey;
}
</style>
<h3><?php echo $header; ?></h3>
<table>
	<tr>
		<th>dag</th>
		<th>soort uren</th>
		<th>aantal uren</th>
		<th>gebruiker</th>
	</tr>
	<?php echo $table_uren; ?>
</table>
	<br />
<table>
	<tr>
		<th>dag</th>
		<th>soort km</th>
		<th>aantal km</th>
		<th>gebruiker</th>
	</tr>
	<?php echo $table_km; ?>
</table>
