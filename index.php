<?php
/*
* Page "Main"
*
* Template Name: Main
* Template Post Type: page
*/

get_header();

$products = new WP_Query(
	array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
	)
);
?>

<section id="main-page">
	<div class="container">
		<h1 class="main-page-title mb-5">Our products</h1>
		<div class="row">
			<?php
			if ( $products->have_posts() ) :
				while ( $products->have_posts() ) :
					$products->the_post();
					$custom_image  = get_the_post_thumbnail_url( $post->ID );
					$custom_date   = get_post_meta( $post->ID, '_custom_date' );
					$custom_type   = get_post_meta( $post->ID, '_custom_type' );
					$regular_price = get_post_meta( $post->ID, '_regular_price' );
					?>
					<div class="card col-12 col-sm-6 col-md-4 col-lg-3 mb-5 border-0" style="width: 18rem;">
						<div class="card__inner">
							<div class="card-img-top__inner">
								<img class="card-img-top" src="<?php echo $custom_image; ?>" alt="<?php echo $post->post_title; ?>">
							</div>
							<div class="card-body">
								<h5 class="card-title"><?php echo $post->post_title; ?></h5>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><?php echo $regular_price[0]; ?></li>
								<li class="list-group-item"><?php echo $custom_type[0]; ?></li>
								<li class="list-group-item"><?php echo $custom_date[0]; ?></li>
							</ul>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
