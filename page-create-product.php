<?php
/*
* Page "Create product"
*
* Template Name: Create product
* Template Post Type: page
*/

get_header();

?>

<section class="add-product">
    <div class="container">
        <div class="add-product-title mb-5">Please add product</div>
        <form class="form-add-product" action="<?php echo get_template_directory_uri() . '/inc/ajax-add-product.php' ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-12 mb-4">
                    <label for="exampleInputEmail1">Product name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="form-group col-12 mb-4">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Price" required>
                </div>
                <div class="form-group col-12 mb-4">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group col-12 mb-4">
                    <label for="exampleInputPassword1">Product type</label>
                    <select name="type" class="form-control w-100">
                        <option value="rare" selected>rare</option>
                        <option value="frequent">frequent</option>
                        <option value="unusual">unusual</option>
                    </select>
                </div>
                <div class="form-group col-12 mb-4">
                    <label for="exampleInputPassword1">Product image</label>
                    <input type="file" name="file" class="form-image">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

<?php
get_footer();
