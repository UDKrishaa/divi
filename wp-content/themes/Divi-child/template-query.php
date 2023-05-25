<?php
/*
Template Name: Query
*/
get_header();
?>

<div id="main-content">
   <div class="container">
   <div id="content-area" class="clearfix">
  
   
    
    <div class="loadmore_content">
        <?php
         $postsPerPage = 3;
          $terms = get_the_terms( get_the_ID(), 'categories' );
          $page =  ( get_query_var('page') ) ? get_query_var('page') : 1;
          

        $args = array( 'post_type' => 'post', 'paged'=> $page, 'posts_per_page' => $postsPerPage , 'orderby' => 'date', 'orderby' => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ),'author_name' =>'udbhav','date_query' => array(),
               
  );
        $loop = new WP_Query( $args );
       echo'<div class= "row clearfix">';
                while ( $loop->have_posts() ) : $loop->the_post();
               
                echo '<div class = "col-3 clearfix">';
            echo '<div class="article">'; ?>
           
           
              <h2> <?php the_title();?> </h2>
              <div class="article-img"><?php get_posts();?> </div>
          
              <div class="article-img"><?php the_post_thumbnail();?> </div>
          <div class="article-content"> <?php the_author();?> </div>  
              <div class="article-content"> <?php the_excerpt();?> </div> 
              <div class="article-content"> <?php the_date('y,d');?> </div>    
              <div class="article-content"><?php echo getPostViews(get_the_ID()); ?></div>
       

              <div class="article-rm"><a href='<?php the_permalink() ?>'> Read More  </a></div>   
             <?php  echo '</div>';
                 echo '</div>';
            endwhile;
            wp_reset_postdata();
  ?>
	</div>



 </div>
</div>
</div>

<?php
get_footer();
?>
