<?php 
foreach($_POST['myform'] as $key => $value) {
	$$key = sanitize_text_field($value);
}
$my_settings = array();
$my_settings['firstname'] = $firstname;
$my_settings['lastname'] = $lastname;
$my_settings['email'] = $email;
$my_settings['username'] = $username;
$my_settings['password'] = $password;
$my_settings['address'] = $address;
$my_settings['message'] = $message;
$my_settings['rows'] = $rows;
$my_settings['cols'] =$cols;
$my_settings['checkbox'] =array() ;
$my_settings['checkbox']['fields'] = $checkbox;
$my_settings['checkbox']['field1'] = $field1;
$my_settings['checkbox']['field2'] = $field2;
$my_settings['checkbox']['field3'] = $field3;
$my_settings['customlabel'] = $customlabel;
$my_settings['labels'] = $labels;

update_option('my_settings', $my_settings);
wp_redirect(admin_url(). '?page=new_form&message=1');
exit();