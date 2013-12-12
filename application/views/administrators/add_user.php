<style>
table
{
	border-collapse:collapse;
}

td
{
	border:0px solid black;
	padding:1em;
}

.table_title
{
	font-size:1.3em;
	font-weight:bold;
	color:RGBA(20,20,20,0.5);
	padding-bottom:0px;
}

{
	color:RGBA(20,20,20,0.8);
	font-size:1.2em;
	padding:0.5em;
	width:230px;
}
</style>
<table>
		<tr>
			<td>&nbsp;</td>
			<td class='table_title'><?php echo $header; ?></td>
		</tr>
	<form action='./add_user' method='post'>
		<tr>
			<td>Voornaam</td>
			<td><input type='text' name='firstname' /></td>
		</tr>
		<tr>
			<td>Tussenvoegsel</td>
			<td><input type='text' name='infix' /></td>
		</tr>
		<tr>
			<td>Achternaam</td>
			<td><input type='text' name='surname' /></td>
		</tr>
		<tr>
			<td>Emailadres</td>
			<td><input type='text' name='emailaddress' /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type='password' name='password' /></td>
		</tr>
		<tr>
			<td>gebruikersrol</td>
			<td>
				<select name='userrole'>
					<?php echo $userroles; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' /></td>
		</tr>
	</form>
</table>