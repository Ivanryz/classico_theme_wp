# classico_theme_wp

//Add Brand on single product page
add_action('woocommerce_single_product_summary', 'et_print_brands', 0);

function et_print_brands(){

    global $post, $product;
    $terms = wp_get_post_terms( $post->ID, 'brand' );

    if(count($terms)>0) {
        ?>
			<h2 class="spbrand"> 
            <?php
                foreach($terms as $brand) {
                    $image          = '';
                    $thumbnail_id   = absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
                    ?>
                    <a href="<?php echo get_term_link($brand); ?>">
                        <?php
                            echo $brand->name;
                        ?>

                    </a>
                    <?php
                }
            ?>

            </h2>
				
        <?php
    }
}
//Add Brand on single product page End
