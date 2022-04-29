<?php 
if(isset($_GET['message']) ) {
	if($_GET['message'] == 1) {
		$message = 'saved settings successfully';
	}
}
$my_settings = get_option('my_settings');
print_r($my_settings);
// var_dump($my_settings);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<h1>New_Form</h1>
</head>
<body>
	<input type="text" name="shortcode" readonly value="[my_form]">
	<br><br>
	<form action="<?php echo admin_url(). 'admin-post.php'?>" id='admin_form' method="post" >
	<input type="hidden" name="action" value="save_settings_action">
	<input type="checkbox" name="myform[firstname]" value="1" <?php echo (isset($my_settings['firstname']) ? 'checked' : ''); ?> >Frist Name
	<br><br>
	<input type="checkbox" name="myform[lastname]" value="1" <?php echo (isset($my_settings['lastname']) ? 'checked' : ''); ?> >Last Name
	<br><br>
	<input type="checkbox" name="myform[email]" value="1" <?php echo (isset($my_settings['email']) ? 'checked' : ''); ?> >Email
	<br><br>
	<input type="checkbox" name="myform[username]" value="1" <?php echo (isset($my_settings['username']) ? 'checked' : ''); ?> >Username
	<br><br>
	<input type="checkbox" name="myform[password]" value="1" <?php echo (isset($my_settings['password']) ? 'checked' : ''); ?> >Password
	<br><br>
	<input type="checkbox" name="myform[address]" value="1" <?php echo (isset($my_settings['address']) ? 'checked' : ''); ?> >Address
	<br><br>
	<input type="checkbox" name="myform[message]" id="message"	value="1" <?php echo(isset($my_settings['message']) ? 'checked': ''); ?> >Message
	<br><br>
	<label class="rows">rows</label>
	<input type="number" name="myform[rows]" class="rows"  value="<?php echo isset($my_settings['rows'])?esc_attr($my_settings['rows']):'';?>" style="<?php echo isset($my_settings['message'])? '' : 'display:none;'; ?>">
	<label class="cols">cols</label>
	<input type="number" name="myform[cols]" class="cols" value="<?php echo isset($my_settings['cols'])?esc_attr($my_settings['cols']):'';?>" style="<?php echo isset($my_settings['message'])? '' : 'display:none;'; ?>">
	<br><br>
	<input type="checkbox" name="myform[checkbox]" value="1" id="checkbox"<?php echo (isset($my_settings['checkbox']['field'])? 'checked' :'')?> >
	<label for="checkbox">Radio Button</label>
	<br><br>
	<div class="field">
		<input type="text" name="myform[field1]" id="field1" placeholder="option1" value="<?php echo isset($my_settings['checkbox']['field1'])?esc_attr($my_settings['checkbox']['field1']):'' ?>" style="<?php echo isset($my_settings['checkbox']['fields'])? '' : 'display:none;'; ?>">
		<input type="text" name="myform[field2]" id="field2" placeholder="option2" value="<?php echo isset($my_settings['checkbox']['field2'])?esc_attr($my_settings['checkbox']['field2']):''; ?>" style="<?php echo isset($my_settings['checkbox']['fields'])? '' : 'display:none;'; ?>">
		<input type="text" name="myform[field3]" id="field3" placeholder="option3" value="<?php echo isset($my_settings['checkbox']['field3'])?esc_attr($my_settings['checkbox']['field3']):''; ?>" style="<?php echo isset($my_settings['checkbox']['fields'])? '' : 'display:none;'; ?>">
	</div>
	
	<br><br>
	<input type="checkbox" name="myform[customlabel]" value="1" id="customlabel" <?php echo(isset($my_settings['customlabel']) ? 'checked': ''); ?> >Custom Text Field
	<br><br>
	<input type="text" name="myform[labels]" class="labels" placeholder="Enter the name" value="<?php echo isset($my_settings['labels'])?$my_settings['labels']:''; ?>" style="<?php echo isset($my_settings['customlabel'])? '' : 'display:none;'; ?>">
	<br><br>
	<?php wp_nonce_field( 'save_settings_action', 'save_settings_nonce' ); ?>
	<input type="submit" class="submit_settingss" name="submit" value="submit">
</form>
</body>
</html>