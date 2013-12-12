<style>
.odd
{
	background-color :RGBA(230,230,230,0.5);
}

.even
{
	background-color:RGBA(230,230,230,0.5);
}

.highlight
{
	background-color:RGBA(200,200,200,1.0);
}


</style>
<script type='text/javascript'>
	$('document').ready(function(){
		$("#link li:even").addClass("even");
		$("#link li:odd").addClass("odd");
		$("#link li").hover(
			function(){
				$(this).toggleClass('highlight');
			},
			function(){
				$(this).toggleClass('highlight');
			}
		);
	});
</script>
<div id='link'>
	<ul>
		<?php if ( isset($_SESSION['userrole'] ))
		{
			switch ($_SESSION['userrole'])
			{
				case "administrator":
					echo "<a href='".BASE_URL."administrators/viewall'>
							<li>
								gebruikers
							</li>
						  </a>
						  ";
					echo "<li><a href='".BASE_URL."administrators/add_user'>
								voeg toe
							  </a>
						  </li>";
					echo "<li><a href='".BASE_URL."administrators/view_all_products'>
								producten
							  </a>
						  </li>";
					echo "<li><a href='".BASE_URL."administrators/add_product'>
								add product
							  </a>
						  </li>";
					echo "<li><a href='".BASE_URL."administrators/table'>
								table
							  </a>
						  </li>";
					echo "<li><a href=''>Admin5</a></li>";
					echo "<li><a href=''>Admin6</a></li>";
				break;
				case "customer":
					echo "<li><a href='".BASE_URL."users/homepage'>producten</a></li>";
					echo "<li>
							<a href='".BASE_URL."customers/buying_history'>koop historie</a>
						  </li>";
				break;
				case "root":
					echo "<li><a href=''>root1</a></li>";
					echo "<li><a href=''>root2</a></li>";
					echo "<li><a href=''>root3</a></li>";
					echo "<li><a href=''>root4</a></li>";
				break;
			}
			echo "<li><a href='".BASE_URL."users/logout'>logout</a></li>";
		}
		else
		{
			echo "<li><a href='".BASE_URL."users/homepage'>producten</a></li>";
			echo "<li><a href=''>TODO2</a></li>";
			echo "<li><a href=''>TODO3</a></li>";
			echo "<li><a href=''>TODO4</a></li>";
			echo "<li><a href=''>TODO5</a></li>";
		}
		?>
	</ul>
</div>