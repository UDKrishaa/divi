<?php




       
add_action('wp_ajax_nopriv_loadmore_ajax', 'story_popup_ajax');
add_action('wp_ajax_loadmore_ajax', 'story_popup_ajax');
function story_popup_ajax(){
    $ppp = $_POST["ppp"];
     $cat_id = $_POST["cat_id"];
     if($cat_id ){
$args = ['post_type' =>'products',
    'posts_per_page' => 3,
    'paged' => $ppp,

    'tax_query' => array(
    array(
    'taxonomy' => 'categories',
    'field' => 'term_id',
    'terms' => $cat_id
     )
  )
    ];
     }
     else{
    $args = [
        'post_type' => 'products',
        'posts_per_page' => 3,      
        'paged' => $ppp,

    ];
  }

   $ajaxposts = new WP_Query($args);
  $response = '';

  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
       $response .= '<div class= "col-4">';
      $response .=   '<div class="article">';
       $response .=   '<h2>'.get_the_title().'</h2>';
      $response .=   '<div class="article-img">' .get_the_post_thumbnail().'</div>'; 
      $response .=   '<div class="article-content">'.get_the_excerpt().'</div>';
      $response .= '<div class="article-rm"> <a herf="'.get_the_permalink().'">Read More</a></div>';
       $response .=  '</div> </div>';
   
    endwhile;
    wp_reset_postdata();
  } else {
    $response = 'empty';
  }

  echo $response;
  exit;
    die;
}

if(! function_exists('custom_post_type')){
// Register Custom Post Type
function custom_post_type() {

  $labels = array(
    'name'                  => _x( 'Product', 'Post Type General Name' ),
    'singular_name'         => _x( 'Post Type', 'Post Type Singular Name' ),
    'menu_name'             => __( 'Products' ),
    'name_admin_bar'        => __( 'Post Type' ),
    'archives'              => __( 'Item Archives' ),
    'attributes'            => __( 'Item Attributes' ),
    'parent_item_colon'     => __( 'Parent Item:' ),
    'all_items'             => __( 'All Items'),
    'add_new_item'          => __( 'Add New Item' ),
    'add_new'               => __( 'Add New' ),
    'new_item'              => __( 'New Item' ),
    'edit_item'             => __( 'Edit Item' ),
    'update_item'           => __( 'Update Item' ),
    'view_item'             => __( 'View Item' ),
    'view_items'            => __( 'View Items' ),
    'search_items'          => __( 'Search Item' ),
    'not_found'             => __( 'Not found' ),
    'not_found_in_trash'    => __( 'Not found in Trash' ),
    'featured_image'        => __( 'Featured Image' ),
    'set_featured_image'    => __( 'Set featured image' ),
    'remove_featured_image' => __( 'Remove featured image' ),
    'use_featured_image'    => __( 'Use as featured image'),
    'insert_into_item'      => __( 'Insert into item' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item'),
    'items_list'            => __( 'Items list' ),
    'items_list_navigation' => __( 'Items list navigation' ),
    'filter_items_list'     => __( 'Filter items list' ),
  );
  $args = array(
    'label'                 => __( 'Post Type' ),
    'description'           => __( 'Post Type Description'),
    'labels'                => $labels,
    'supports'              => array('title','thumbnail','editor','page-attributes','excerpt'),
    'hierarchical'          => false,
    'public'                => true,
    'puplicly_queryable'  => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'rewrite'       => array( 'slug' => 'products' ), // my custom slug
    'show_in-rest'      => true,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'query_var'       => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'post',
  );
  register_post_type( 'products', $args );

}
}
add_action( 'init', 'custom_post_type',0);

function wporg_register_taxonomy_course() {
   $labels = array(
     'name'              => _x( 'Categories', 'taxonomy general name' ),
     'singular_name'     => _x( 'Categories', 'taxonomy singular name' ),
     'search_items'      => __( 'Search Categories' ),
     'all_items'         => __( 'All Categories' ),
     'parent_item'       => __( 'Parent Categories' ),
     'parent_item_colon' => __( 'Parent Categories:' ),
     'edit_item'         => __( 'Edit Categories' ),
     'update_item'       => __( 'Update Categories' ),
     'add_new_item'      => __( 'Add New Categories' ),
     'new_item_name'     => __( 'New Categories Name' ),
     'menu_name'         => __( 'Categories' ),
   );
   $args   = array(
     'hierarchical'      => true, // make it hierarchical (like categories)
     'labels'            => $labels,
     'show_ui'           => true,
     'show_admin_column' => true,
     'query_var'         => true,
     'rewrite'           => [ 'slug' => 'categories' ],
   );
   register_taxonomy( 'categories', [ 'products' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_course' );

// category


add_action('wp_ajax_nopriv_catergory_slug_fu', 'cateegory_story');
add_action('wp_ajax_catergory_slug_fu', 'cateegory_story');
function cateegory_story(){
  
  $cat_id = $_POST['cat_id'];
   // $postType = $_POST['type'];


    $ajaxposts = new WP_Query([
    'post_type' =>'products',
    'posts_per_page' => 3,
    
    'tax_query' => array(
    array(
    'taxonomy' => 'categories',
    'field' => 'term_id',
    'terms' => $cat_id
     )
  )
    
  ]);

  $response .= '';



  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();

       $response .= '<div class= "col-4">';
      $response .=   '<div class="article">';
       $response .=   '<h2>'.get_the_title().'</h2>';
      $response .=   '<div class="article-img">' .get_the_post_thumbnail().'</div>'; 
      $response .=   '<div class="article-content">'.get_the_excerpt().'</div>';
      $response .= '<div class="article-rm"> <a herf="'.get_the_permalink().'">Read More</a></div>';
       $response .=  '</div> </div>';
   
    endwhile;
    wp_reset_postdata();
  } else {
    $args = array( 'post_type' => 'products', 'paged'=> 1, 'posts_per_page' => $postsPerPage , 'orderby' => 'date', 'order' => 'DESC',
  );
        $loop = new WP_Query( $args );
      
                while ( $loop->have_posts() ) : $loop->the_post();
               
               $response .= '<div class= "col-4">';
      $response .=   '<div class="article">';
       $response .=   '<h2>'.get_the_title().'</h2>';
      $response .=   '<div class="article-img">' .get_the_post_thumbnail().'</div>'; 

      $response .=   '<div class="article-content">'.get_the_excerpt().'</div>';
      $response .= '<div class="article-rm"> <a herf="'.get_the_permalink().'">Read More</a></div>';
       $response .=  '</div> </div>';
                
            endwhile;
  }
 
      


  echo $response;
    die;

}


//shortcode

add_shortcode( 'test', 'demo_shortcode' );
function demo_shortcode(){
   ob_start();
    ?> <html> <?php 

                    $taxonomy = 'categories';
                    $terms = get_terms($taxonomy);
            if ( $terms && !is_wp_error( $terms ) ) :
                ?>
                <div class="cat-1"><ul>
                    <li><a class="catergor active" href="#!" ><?php echo 'ALL'; ?></a></li>
                    <?php foreach ( $terms as $term ) { ?>
                <?php 
               
                ?>
                        <li><a href="#!" cat_id="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php endif;?>
    
    <div class="loadmore_content-1">
        <?php
         $postsPerPage = 3;
          $terms = get_the_terms( get_the_ID(), 'categories' );
          $page = 1;

        $args = array( 'post_type' => 'products', 'paged'=> $page, 'posts_per_page' => $postsPerPage , 'orderby' => 'date', 'order' => 'DESC' ,'author_name' =>'udbhav', 
  );
        $loop = new WP_Query( $args );
       echo'<div class= "row clearfix">';
                while ( $loop->have_posts() ) : $loop->the_post();
               
                echo '<div class = "col-4 clearfix">';
            echo '<div class="article">'; ?>
           
           
              <h2> <?php the_title();?> </h2>
            
              <div class="article-img"><?php the_post_thumbnail();?> </div>
          <div class="article-content"> <?php the_author();?> </div>  
              <div class="article-content"> <?php the_excerpt();?> </div>   
            <?= gt_get_post_view(); ?>
              <div class="article-rm"><a href='<?php the_permalink() ?>'> Read More  </a></div>   
             <?php  echo '</div>';
                 echo '</div>';
            endwhile;
            wp_reset_postdata();
              echo '</div>';


        ?>
    </div>
    <div class="article">
    <div class='loadmore-1'>Load More</div>
    </div> </html><?php
    return ob_get_clean();
}

//no of post views starts 


function gt_get_post_view() {


    $count = get_post_meta( get_the_ID(), 'post_views_count', true );


    return "$count views";


}


function gt_set_post_view() {


    $key = 'post_views_count';


    $post_id = get_the_ID();


    $count = (int) get_post_meta( $post_id, $key, true );


    $count++;


    update_post_meta( $post_id, $key, $count );


}


function gt_posts_column_views( $columns ) {


    $columns['post_views'] = 'Views';


    return $columns;


}


function gt_posts_custom_column_views( $column ) {


    if ( $column === 'post_views') {


        echo gt_get_post_view();


    }


}


add_filter( 'manage_posts_columns', 'gt_posts_column_views' );


add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

//no of post views ends


register_nav_menus(
    array('primary-menu'=> 'Top Menu',
            'secondary-menu' => 'Footer Menu',
            'second-menu' => 'FQAS Menu')
);
    add_theme_support('post-thumbnails');


     function dv_widgets_init() {

    register_sidebar( array(
        'name'          => 'Widget One',
        'id'            => 'widget_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="col-lg-3 col-md-6">',
        'after_title'   => '</h5>',
    ),);

     register_sidebar(array(
        'name'          => 'Widget two',
        'id'            => 'widget_2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => ' <div class="col-lg-3 col-md-6">',
        'after_title'   => '</h5>',
    )
     );
     register_sidebar(array(
        'name'          => 'Widget three',
        'id'            => 'widget_3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => ' <div class="col-lg-3 col-md-6">',
        'after_title'   => '</h5>',
    )
     );
      register_sidebar(array(
        'name'          => 'Widget four',
        'id'            => 'widget_4',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="col-lg-3 col-md-6">',
        'after_title'   => '</div>',
    )
     );
  }
  add_action( 'widgets_init', 'dv_widgets_init' );


?>