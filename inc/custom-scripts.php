<?php

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields' );
// Save Fields
add_action( 'woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save' );
function woocommerce_product_custom_fields() {
	global $woocommerce, $post;

	$custom_image       = get_post_meta( $post->ID, '_custom_image' );
	$custom_image_class = empty( $custom_image[0] ) ? '' : 'added';
	$custom_date        = get_post_meta( $post->ID, '_custom_date' );
	$custom_type        = get_post_meta( $post->ID, '_custom_type' );

	echo '<div class="product_custom_field">';

	echo '<div class="product_custom_image__wrapper">';

	echo "<img src='$custom_image[0]' class='product_custom_image $custom_image_class' >";
	echo "<input type='hidden' name='custom-image-url' value='$custom_image[0]' class='product_custom_image-input' />";
	echo '<div class="product_custom_image__select-file">Click to set image</div>';

	echo '<div class="product_custom_image__delete-btn">Remove</div>';

	echo '</div>';

	// Custom Product Number Field
	woocommerce_wp_text_input(
		array(
			'id'    => 'custom-date',
			'label' => __( 'Custom date publication', 'woocommerce' ),
			'type'  => 'date',
			'value' => $custom_date[0],
		)
	);
	// Custom Product Number Field
	woocommerce_wp_select(
		array(
			'id'      => 'custom-type',
			'label'   => __( 'Custom type', 'woocommerce' ),
			'options' => array(
				'rare'     => 'rare',
				'frequent' => 'frequent',
				'unusual'  => 'unusual',
			),
			'value'   => $custom_type[0],
		)
	);

	echo '<div class="btn-clean-custom-fields">Clean custom fields</div>';

	echo '</div>';
}

add_action( 'save_post', 'action_function_name_85245', 10, 3 );
function action_function_name_85245( $post_ID, $post, $update ) {
	update_post_meta( $post_ID, '_custom_image', $_POST['custom-image-url'] );
	update_post_meta( $post_ID, '_custom_date', $_POST['custom-date'] );
	update_post_meta( $post_ID, '_custom_type', $_POST['custom-type'] );
}
