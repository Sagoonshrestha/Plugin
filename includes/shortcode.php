<?php
$my_settings = get_option('my_settings');
global $wpdb;
$form_row = $wpdb->get_row( "SELECT * FROM myfirstplugin ORDER by id desc", ARRAY_A);
?>
<div class="my_form">
	<form action="<?php echo admin_url(). 'admin-post.php'?>" method="post">
		<input type="hidden" name="action" value="front_savetodb">
		<?php if(isset($my_settings['firstname']) && $my_settings['firstname'] == '1') { ?>
			<label for="firstname">First Name</label>
			<input type="text" name="front_firstname" id="firstname" placeholder="Enter the First name ">
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['lastname']) && $my_settings['lastname'] == '1') { ?>
			<label>Last Name</label>
			<input type="text" name="front_lastname" id="lastname" placeholder="Enter the last name">
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['email']) && $my_settings['email'] == '1') { ?>
			<label>Email</label>
			<input type="email" name="front_email" id="email" placeholder="Enter the email">
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['username']) && $my_settings['username'] == '1') { ?>
			<label>username</label>
			<input type="text" name="username" id="username" placeholder="Enter the username">
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['password']) && $my_settings['password'] == '1') { ?>
			<label>Password</label>
			<input type="password" name="password" id="password" placeholder="Enter the password">
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['address']) && $my_settings['address'] == '1') { ?>
			<label>Address</label>
			<input type="text" name="address" id="address" placeholder="Enter the address">
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['message']) && $my_settings['message'] == '1') { ?>
			<label>Message</label>
			<textarea name="message" id="message" rows="<?php echo esc_attr($my_settings['rows'])?>" cols="<?php echo esc_attr($my_settings['cols']) ?>"></textarea>
			<br><br>
		<?php } ?>
		<?php if(isset($my_settings['checkbox']['fields']) && $my_settings['checkbox']['fields']=='1'){ ?>
			<label>Radio</label>
			<br>
			<?php if(isset($my_settings['checkbox']['field1']) && $my_settings['checkbox']['field1'] !== '') { ?>
				<input type="radio" name="field" id="field1" value="<?php echo esc_attr($my_settings['checkbox']['field1'])?>" checked=""> <?php esc_attr_e($my_settings['checkbox']['field1']); ?>
			<?php } ?>
			<?php if(isset($my_settings['checkbox']['field2']) && $my_settings['checkbox']['field2'] !== '') { ?>
				<input type="radio" name="field" id="field2" value="<?php echo esc_attr($my_settings['checkbox']['field2'])?>" ><?php esc_attr_e($my_settings['checkbox']['field2'])?>
			<?php } ?>
			<?php if(isset($my_settings['checkbox']['field3']) && $my_settings['checkbox']['field3'] !== '') { ?>
				<input type="radio" name="field" id="field3" value="<?php echo esc_attr($my_settings['checkbox']['field3'])?>" ><?php  esc_attr_e($my_settings['checkbox']['field3'])?>
			<?php } ?>
		<?php } ?>
		<br><br>
		<?php if(isset($my_settings['customlabel']) && $my_settings['customlabel'] == '1') { ?>
			<label><?php echo esc_html($my_settings['labels'])?></label>
			<input type="text" name="labelfield" id="labelfield" placeholder="enter the label">
		<?php } ?>
		<br><br>
		<input type="submit" id='front_submit' name="submit" value="submit">
	</form>
</div>