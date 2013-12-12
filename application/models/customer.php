<?php
 class Customer extends Model
 {
	public function find_product_by_id($id)
	{
		$query = "SELECT * FROM `products` WHERE `product_id` = '".$id."'";
		//echo $query;exit();
		return $this->query($query);
	}

	public function insert_int_orders()
	{
		date_default_timezone_set("Europe/Amsterdam");
		$date = Date("Y-m-d H:i:s");
		$expiration_date = date("Y-m-d H:i:s", mktime( date("H"),
													   date("i"),
													   date("s"),
													   date("m"),
													   date("d") + 14,
													   date("Y")));
		$delivery_date = date("Y-m-d H:i:s", mktime( date("H"),
													   date("i"),
													   date("s"),
													   date("m"),
													   date("d") + 3,
													   date("Y")));


		$query = "INSERT INTO `orders` ( `order_id`,
									     `user_id`,
									     `order_date`,
									     `expiration_date`,
									     `delivery_date`,
									     `shipping_method`,
									     `shipping_cost`)
							VALUES      ( NULL,
										  '".$_SESSION['userrole_id']."',
										  '".$date."',
										  '".$expiration_date."',
										  '".$delivery_date."',
										  'bezorgen',
										  '2.5')";
		$this->query($query);

		$order_id = $this->find_last_inserted_id();

		foreach ($_SESSION['tmp_cart']->get_items() as $value)
		{
			$query = "INSERT INTO `orderrules`( `order_id`,
												`product_id`,
												`price_sold`,
												`quantity`,
												`discount`)
								VALUES		  ( '".$order_id."',
												'".$value['id']."',
												'".$value['price']."',
												'".$value['aantal']."',
												'0.00')";
			//echo "<br />".$query;
			$this->query($query);
		}
		//var_dump($_SESSION['tmp_cart']->get_items());
	}
	
	public function find_orders_by_customer_id()
	{
		$query = "SELECT * 
				  FROM 	`orders`, `orderrules`, `products`
				  WHERE `orders`.`user_id`  		= '".$_SESSION['userrole_id']."'
				  AND 	`orders`.`order_id` 		= `orderrules`.`order_id`
				  AND 	`orderrules`.`product_id` 	= `products`.`product_id`";
		return $this->query($query);
	}
 }
?>