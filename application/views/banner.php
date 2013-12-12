<script type='text/javascript'>
	$('document').ready(function(){
		$('#login').click(function(){
			$('#dialogform_login').dialog('open');
		});
		
		$('#register').click(function(){
			$('#dialogform_register').dialog('open');
		});
		
		$('#dialogform_login').dialog(
		{
			width: 400,
			autoOpen:false,
			modal:true
		});	
		
		$('#dialogform_register').dialog(
		{
			width: 400,
			autoOpen:false,
			modal:true
		});
		
		$('#shopping_cart').click(function(){
			window.location.href = '<?php echo BASE_URL;?>customers/shopping_cart';
		});
	});
</script>
<style>
h2
{
	border:0px solid black;
	display:inline;
}
button
{
	border:0px solid black;
	float:right;
	margin-top:0.4em;
	background-color:RGBA(214,214,214,1);
	font-family:Meiryo;
}
div#space
{
	border:0px solid black;
	margin-top:0.4em;
	float:right;
	width:2em;
}
#dialogform-login dialogform-register
{
	font-size:0.8em;
}
</style>

<h2>Webshop</h2>
<button id='register'>register</button>
<div id='space'>|</div>
<button id='login'>login</button>
<div id='space'>|</div>
<button id='shopping_cart'>shopping cart</button>
<div id='dialogform_login'>
<table>
	<form action='<?php echo BASE_URL; ?>users/login' method='post' >
		<tr>
			<td>gebruikersnaam</td>
			<td><input type='text' name='username' /></td>
		</tr>
		<tr>
			<td>wachtwoord</td>
			<td><input type='password' name='password' /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='login' /></td>
		</tr>	
	</form>
</table>
</div>

<div id='dialogform_register'>
<table>
	<form action='../users/register' method='post' >
		<tr>
			<td>emailadres</td>
			<td><input type='text' name='emailaddress' /></td>
		</tr>
		<tr>
			<td>wachtwoord</td>
			<td><input type='text' name='password' /></td>
		</tr>		
		<tr>
			<td>voornaam</td>
			<td><input type='text' name='firstname' /></td>
		</tr>
		<tr>
			<td>tussenvoegsel</td>
			<td><input type='text' name='infix' /></td>
		</tr>
		<tr>
			<td>achternaam</td>
			<td><input type='text' name='surname' /></td>
		</tr>
		<tr>
			<td>straat</td>
			<td><input type='text' name='street' /></td>
		</tr>
		<tr>
			<td>huisnummer</td>
			<td><input type='text' name='housenumber' /></td>
		</tr>
		<tr>
			<td>postcode</td>
			<td><input type='text' name='zipcode' /></td>
		</tr>
		<tr>
			<td>Woonplaats</td>
			<td><input type='text' name='residence' /></td>
		</tr>
		<tr>
			<td>telefoon</td>
			<td><input type='text' name='phonenumber' /></td>
		</tr>
		<tr>
			<td>mobiel</td>
			<td><input type='text' name='mobilephonenumber' /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='register' /></td>
		</tr>	
	</form>
</table>
</div>