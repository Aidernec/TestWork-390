<?php

/**
 * Send mail from contact form
 */
require $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
$site_name = $_SERVER['SERVER_NAME'];

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$name  = ! empty( $_POST['name'] ) ? htmlspecialchars( sanitize_text_field( wp_unslash( $_POST['name'] ) ) ) : '';
$price = ! empty( $_POST['price'] ) ? htmlspecialchars( sanitize_text_field( wp_unslash( $_POST['price'] ) ) ) : '';
$date  = ! empty( $_POST['date'] ) ? htmlspecialchars( sanitize_text_field( wp_unslash( $_POST['date'] ) ) ) : '';
$type  = ! empty( $_POST['type'] ) ? htmlspecialchars( sanitize_text_field( wp_unslash( $_POST['type'] ) ) ) : '';

if ( empty( $name ) || empty( $price ) ) {
	exit();
}

$args = array(
	'post_title'  => $name,
	'post_type'   => 'product',
	'post_status' => 'publish',
	'meta_input'  => array(
		'_price'         => $price,
		'_regular_price' => $price,
	),
);

$post_id = wp_insert_post( $args, true );

$img_id = media_handle_upload(
	'file',
	0
);

$img_url = wp_get_attachment_image_url( $img_id, 'full' );

set_post_thumbnail( $post_id, $img_id );

update_post_meta( $post_id, '_custom_image', $img_url );
update_post_meta( $post_id, '_custom_date', $date );
update_post_meta( $post_id, '_custom_type', $type );

if ( is_int( $post_id ) ) {
	$result = 'Product added';
} else {
	$result = "Something's wrong, try again";
}

echo wp_json_encode( $result );


exit();
