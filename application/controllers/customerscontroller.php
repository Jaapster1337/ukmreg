<?php 
 class CustomersController extends Controller
 {
	public function homepage()
	{
		$this->set("header", "Customer homepage");
	}
	
	private function check_if_exists_shoppingcart()
	{
		if ( !isset($_SESSION["tmp_cart"]))
		{
			$_SESSION["tmp_cart"] = new Shoppingcart();
			//var_dump($_SESSION["tmp_cart"]);
		}
	}
	
	public function add_to_cart_homepage($id, $number=1)
	{		
		$this->check_if_exists_shoppingcart();
		$product = $this->_model->find_product_by_id($id);
		$_SESSION["tmp_cart"]->add_to_cart($product,$number);
		header("location:".BASE_URL."users/homepage/0/1");
	}
	
	public function add_to_cart_shoppingcart($id, $number=1)
	{
		$this->check_if_exists_shoppingcart();
		$product = $this->_model->find_product_by_id($id);
		$_SESSION["tmp_cart"]->add_to_cart($product,$number);
		header("location:".BASE_URL."customers/shopping_cart");
	}
	
	public function remove_from_cart($id, $number=1)
	{
		$product = $this->_model->find_product_by_id($id);
		$_SESSION['tmp_cart']->remove_from_cart($product, $number);
		header("location:".BASE_URL."customers/shopping_cart");
	}

	public function shopping_cart($notify=0)
	{
		$this->check_if_exists_shoppingcart();
		$this->set('header', 'Hieronder staat de inhoud van uw winkelwagen');
		//var_dump($_SESSION['tmp_cart']);
		$shopping_cart_items = '';
		$totalprice = '';
		if ($_SESSION['tmp_cart']->total_products() != 0)
		{
			foreach ($_SESSION['tmp_cart']->get_items() as $value)
			{
				$shopping_cart_items .= "<tr>
											<td>".$value['id']."</td>
											<td><img src='".BASE_URL."public/fotos/
															thumbnails/tn_".
															$value['foto_name']."' alt='".
															$value['foto_name']."' /></td>
											<td>".$value['name']."</td>
											<td>".$value['description']."</td>
											<td>
												".$value['aantal']."
											</td>
											<td>
												<a href='".BASE_URL.
												 "customers/add_to_cart_shoppingcart/".
												 $value['id']."'>
												 <img src='".BASE_URL.
												"public/img/plus.png' alt='plus' /></a>
												 <a href='".BASE_URL.
												 "customers/remove_from_cart/".
												 $value['id']."'>
												 <img src='".BASE_URL.
												"public/img/min.png' alt='min' /></a>
											</td>
											<td>&euro; ".$value['price']."</td>
											<td>&euro; ".$value['price'] * $value['aantal']."</td>
											<td>
												<a href='".BASE_URL."customers/remove_item_from_cart/".$value['id']."'>
													<img src='".BASE_URL."/public/img/drop.png' alt='drop.png' />
												</a>
											</td>
										</tr>";	
				$totalprice += $value['price'] * $value['aantal'];
			}
		}
		else
		{
			$shopping_cart_items = "<tr>
										<td colspan='9'>
											Op dit moment heeft u geen producten
											in uw winkelwagen
										</td>
									</tr>";
			$totalprice = "0.00";
		}
		$shopping_cart_items .= "<tr>
									<td colspan='4'></td>
									<td></td>
									<td>
										<a href='".BASE_URL."customers/empty_cart'>
											<img src='".BASE_URL."public/img/drop.png'
												 alt='drop.png' />
										</a>
									</td>
									<td>
									</td>
									<td>&euro; ".$totalprice."</td>
									<td></td>
								 </tr>";
		$this->set('shopping_cart_items', $shopping_cart_items);
		$this->set('totalprice', $totalprice);
		$this->set('notify', $notify);
	}
	
	public function empty_cart($notify=0)
	{
		//echo "Hallo"; exit();
		$_SESSION['tmp_cart']->empty_cart();
		header("location:".BASE_URL."customers/shopping_cart/".$notify);
	}

	public function remove_item_from_cart($id)
	{
		$_SESSION['tmp_cart']->remove_item_from_cart($id);
		header("location:".BASE_URL."customers/shopping_cart");
	}
	
	public function check_login()
	{
		if (isset($_SESSION['userrole_id']))
		{
			//Ga verder met de bestelling
			if (sizeof($_SESSION['tmp_cart']->get_items()) > 0)
			{
				//echo "Er zit iets in de shoppingcart";exit();
				$this->_model->insert_int_orders();
				$this->empty_cart(2);
			}
			else
			{
				header("location:".BASE_URL."customers/shopping_cart/3");
			}
		}
		else
		{
			header("location:".BASE_URL."customers/shopping_cart/1");
		}
	}
	
	public function buying_history()
	{
		$this->set("header", "Uw persoonlijke aankopen");
		
		$orders = "";
		
		$found_products = $this->_model->find_orders_by_customer_id();
		var_dump($found_products);
		
		$id = '';
		foreach ($found_products as $value)
		{
			if ($id != $value['Order']['order_id'])
			{
				$orders .= "<tr class='articles'>
								<td colspan='2'>order id: ".$value['Order']['order_id']."</td>
								<td colspan='3'>order date: ".$value['Order']['order_date']."</td>
							</tr>";
				$id = $value['Order']['order_id'];
			}
			$orders .= "<tr>
							<td>".$value['Product']['product_id']."</td>
							<td>
								<img src='".BASE_URL.
										  "public/fotos/thumbnails/tn_".
										  $value['Product']['foto_name']."' />
							</td>
							<td>".$value['Product']['product_name']."</td>
							<td>".$value['Product']['product_description']."</td>
							<td>".$value['Orderrule']['quantity']."</td>
							<td>".$value['Orderrule']['price_sold']."</td>
							<td>".$value['Orderrule']['quantity'] *
								  $value['Orderrule']['price_sold']."</td>
							<td>".$value['Order']['order_id']."</td>
						</tr>";
		}
		$this->set("orders", $orders);		
	}
 }
?>