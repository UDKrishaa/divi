<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modern Dropdown Mega Menu Example</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
     <?php wp_head(); ?>
  </head>
  <body>

    <div class = "main-wrapper">
      <nav class = "navbar">
        <div class = "brand-and-icon">
          <a href = "index.html" class = "navbar-brand">JQUERYSCRIPT</a>
          <button type = "button" class = "navbar-toggler">
            <i class = "fas fa-bars"></i>
          </button>
        </div>

        <div class = "navbar-collapse">
          <div class = "navbar-nav">
             <?php wp_nav_menu(array('theme_location'=>'primary-menu','menu_class'=>'nav-item nav-link navbar-nav ms-auto py-0 me-n3','id' => 'menu-header-menu',
                                ))?>

            <li>
              <a href = "#" class = "menu-link">
                electronics
                <span class = "drop-icon">
                  <i class = "fas fa-chevron-down"></i>
                </span>
              </a>
              <div class = "sub-menu">
                <!-- item -->
                <div class = "sub-menu-item">
                  <h4>top categories</h4>
                   <?php if ( is_active_sidebar( 'widget_1' ) ) : ?>
                        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                         <?php dynamic_sidebar( 'widget_1' ); ?>
                        </div><!-- #primary-sidebar -->
                             <?php endif; ?>
                </div>
                <!-- end of item -->
                <!-- item -->
                <div class = "sub-menu-item">
                  <h4>other categories</h4>
                    <?php if ( is_active_sidebar( 'widget_2' ) ) : ?>
                        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                         <?php dynamic_sidebar( 'widget_2' ); ?>
                        </div><!-- #primary-sidebar -->
                             <?php endif; ?>
                </div>
                <!-- end of item -->
                <!-- item -->
                <div class = "sub-menu-item">
                  <h2>all essential devices and tools for home</h2>
                  <button type = "button" class = "btn">shop here</button>
                </div>
                <!-- end of item -->
                <!-- item -->
                <div class = "sub-menu-item">
                </div>
                <!-- end of item -->
              </div>
            </li>

           
          </div>
        </div>
      </nav>
    </div>