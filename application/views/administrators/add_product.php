<h3><?php echo $header; ?></h3>
<table>
 <form action='../administrators/add_product' method='post' enctype='multipart/form-data'>
	<tr>
		<td>
			productnaam
		</td>
		<td>
			<input type='text' name='product_name' />
		</td>
	</tr>
	<tr>
		<td>
			beschrijving product
		</td>
		<td>
			<input type='text' name='product_description' />
		</td>
	</tr>
	<tr>
		<td>
			product price
		</td>
		<td>
			<input type='text' name='product_price' />
		</td>
	</tr>
	<tr>
		<td>
			foto
		</td>
		<td>
			<input type='file' name='foto' />
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type='submit' name='submit' />
		</td>
	</tr>
 </form>
</table>