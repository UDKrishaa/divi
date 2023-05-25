			<?php
/*
Template Name: Animation

*/
get_header();
?>


<div id="main-content">
   <div class="container">
   <div id="content-area" class="clearfix">
    
   

 </div>
</div>
</div>
<?php get_footer();?>
<script type="text/javascript">
 var ajaxUrl = '<?php echo admin_url('admin-ajax.php')?>';
$(".catergory_slug").on("click", function() {
  $(".cat ul li a ").removeClass("active");

  $(this).addClass("active");
 
   $.ajax({	
    type: 'POST',
    url: ajaxUrl,
   datatype: 'html',
    data: {
      action: 'catergory_slug_fu',
      category: $(this).data('slug'),
       
    },
    
        success:function(res) {
  			alert(res);
           $('.cater').html(res);
        }
     })
});



</script>


