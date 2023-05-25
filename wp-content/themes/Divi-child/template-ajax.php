<?php
/*
Template Name: Ajax
*/
get_header();
?>


<div id="main-content">
   <div class="container">
   <div id="content-area" class="clearfix">
    <?php
   
   echo do_shortcode( '[test]' );
   ?>

 </div>
</div>
</div>
<?php get_footer();?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script  type="text/javascript">
    jQuery(document).ready( function($) {
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php')?>';        // Post per page
       
       

         var  ppp = 2;
    $('.loadmore-1').on('click', function() {
        alert('fffff');
        $(this).text('Loading...');
        var cat_id;
        // Disable the button, temp
             $("ul li a").each(function() {       
             if ($(this).hasClass('active')){  
               cat_id = $(this).attr('cat-id');
               
              }
             });  
        
         
         
       
        $.post(ajaxUrl, {
            action: "loadmore_ajax",
                ppp: ppp, 
                cat_id: cat_id
        })
        .success(function(res) {
           
           $('.row').append(res);
           $(".loadmore-1").attr("disabled",false);
            ppp++;
            $('.loadmore-1').text('Load More');
        });
    });
    $(".cat-1 a").on("click", function(ev) {
        ev.preventDefault();
         $('.row').html('<div class="loader"><img src="<?php echo get_stylesheet_directory_uri();?>/img/loader.gif" alt="" /></div>');
       
         $('.cat-1 a').removeClass("active");
        $(this).addClass("active");
        
         var cat_id=$(this).attr('cat-id');
           $.ajax({ 
            type: 'POST',
            url: ajaxUrl,
           datatype: 'html',
            data: {
              action: 'catergory_slug_fu',
              cat_id: cat_id,

            
               
            },
                success:function(res) {
                   $('.row').html(res);
                   ppp = 2;

                }
             })
        });
});
</script>