<?php
global $wpdb;

$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE myfirstplugin (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
 firstname varchar(255)DEFAULT '' NOT NULL,
 lastname varchar(255)DEFAULT '' NOT NULL,
 email varchar(255)DEFAULT '' NOT NULL,
 username varchar(255)DEFAULT '' NOT NULL,
 password varchar(255)DEFAULT '' NOT NULL,
 address varchar(255)DEFAULT '' NOT NULL,
 radio varchar(255) DEFAULT '' NOT NULL,
 labelinput varchar(255) DEFAULT '' NOT NULL,  
  PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
?>