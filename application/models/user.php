<?php
 class User extends Model
 {		
	public function select_all()
	{
		return $this->query("SELECT *
							 FROM `users`, `userroles`
							 WHERE `users`.`user_id` = `userroles`.`userrole_id`");
	}
	
	public function select_user_from_login($post)
	{
		$query = "SELECT *
				  FROM   `userroles`, `logins`
				  WHERE  `userroles`.`userrole_id` = `logins`.`login_id`
				  AND    `logins`.`username` = '".$post['username']."'
				  AND	 `logins`.`password` = '".$post['password']."'";
		return $this->query($query);
	
	}
	
	public function insert_register_data($post)
	{
		$query = "INSERT INTO `logins` 
				  SET `username` = '".$post['emailaddress']."',
					  `password` = '".$post['password']."'";
		//echo $query;exit(); //invoeren in sql binnen phpmyadmin
		$this->query($query);
		$id = $this->find_last_inserted_id();
		$query = "INSERT INTO `users` 
				  SET `user_id` = '".$id."',
					  `firstname` = '".$post['firstname']."',
					  `infix` = '".$post['infix']."',
					  `surname` = '".$post['surname']."',
					  `street` = '".$post['street']."',
					  `housenumber` = '".$post['housenumber']."',
					  `zipcode` = '".$post['zipcode']."',
					  `residence` = '".$post['residence']."',
					  `phonenumber` = '".$post['phonenumber']."',
					  `mobilephonenumber` = '".$post['mobilephonenumber']."'";
		$this->query($query);
		$query = "INSERT INTO `userroles` ( `userrole_id`,
											`role`)
								VALUES	  ( '".$id."',
											'customer')";
		$this->query($query);
	}
	
	public function select_all_products($limit=4, $offset=0)
	{
		$query = "SELECT * FROM `products` LIMIT ".$limit." OFFSET ".$offset;
		return $this->query($query);
	}
	
	public function all_products()
	{
		$query = "SELECT * FROM `products`";
		return $this->query($query);
	}
	
	public function save_cart()
	{
		date_default_timezone_set("Europe/Amsterdam");
		$date = Date("Y-m-d H:i:s");		
		$query = "SELECT * 
				  FROM `user_carts` 
				  WHERE `user_id` = '".$_SESSION["userrole_id"]."'";
		$cart = $this->query($query);
		//echo $cart." | ".empty($cart);exit();
		
		//Maak een nieuw karretje met inhoud
		$serialized_cart = serialize($_SESSION['tmp_cart']->get_items());
		//echo $serialized_cart; exit();
			
		if ( empty($cart))
		{			
			$query = "INSERT INTO `user_carts` ( `user_id`,
												 `cart_content`,
												 `insertion_date`)
										VALUES ( '".$_SESSION['userrole_id']."',
												 '".$serialized_cart."',
												 '".$date."')";	
			$this->query($query);
		}
		else
		{
			$query = "UPDATE `user_carts` 
					  SET `cart_content` 	= '".$serialized_cart."',
						  `insertion_date`	= '".$date."'
					  WHERE `user_id` = '".$_SESSION['userrole_id']."'";
			$this->query($query);
			//echo "45".$serialized_cart;exit();
		}		
	}
	
	public function get_saved_usercart()
	{
		$query = "SELECT * 
				  FROM `user_carts` 
				  WHERE `user_id` = '".$_SESSION["userrole_id"]."'";
		
		$cart = $this->query($query, 1);
		
		if (!empty($cart))
		{
			$cart_content = unserialize($cart['User_cart']['cart_content']);
			
			foreach ($cart_content as $value)
			{
				echo "Hallo";
				$_SESSION['tmp_cart']->set_items($value);
			}
		}
	}
 }
?>