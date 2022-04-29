<?php 
global $wpdb;
$front_firstname = isset($_POST['front_firstname']) ? $_POST['front_firstname'] : '';
$front_lastname = isset($_POST['front_lastname']) ? $_POST['front_lastname'] : '';
$front_email = isset($_POST['front_email']) ? $_POST['front_email'] : '';
$labelinput = isset($_POST['labelfield']) ? $_POST['labelfield']:'';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$radio =isset($_POST['field']) ? $_POST['field'] : '';
$wpdb->insert( 
		'myfirstplugin', 
		array( 
			'firstname' => $front_firstname, 
			'lastname' => $front_lastname, 
			'labelinput'=>$labelinput,
			'email' => $front_email,
			'username'=> $username,
			'password'=> $password,
			'address' => $address,
			'radio' => $radio,
		) 
	);
wp_redirect('https://localhost/first_wordpress/2021/08/22/18/');
 ?>