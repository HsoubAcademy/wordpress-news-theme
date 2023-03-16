<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
    <title><?php bloginfo( 'name' ); ?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" <?php if ( is_admin_bar_showing() ) {?> style="position: absolute; top: 32px;" <?php } ?>>
            <div class="container">
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                      $categories = get_categories();
                      foreach($categories as $category) { ?>
                        <li class="nav-item">
                          <?php echo '<a class="nav-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';?>
                        </li>
                    <?php } ?>
                </ul> -->

                <?php
                    wp_nav_menu( 
                      array( 
                        'theme_location' => 'my-custom-menu',
                        'container' => '', // default div
                        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                      ) 
                    ); 
                  ?>
                  
                <div class="login">
                  <?php
                      if( is_user_logged_in() ) {
                        global $current_user;
                    ?>
                      <img src="<?php echo get_avatar_url($current_user->user_email); ?>" alt="" class="rounded-circle w-50 h-50">

                      <div class="login-container mt-3" style="height: 150px; margin-right: 10px;">
                        <p><?php echo 'مرحبًا '. $current_user->display_name;?></p>
                        <a href="<?php echo esc_url( admin_url( 'profile.php' ) ) ; ?>" class="btn button mt-2 w-100" style="font-size: .875rem !important;">الملف الشخصي</a>
                        <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="btn button w-100 mt-2" style="font-size: .875rem !important;">تسجيل خروج</a>
                    </div>
                    <?php
                      } else {?>
                      <i class="fa-solid fa-user"></i>
                      <div class="login-container">
                          <a href="<?php echo esc_url(wp_login_url( home_url() )  ); ?>" class="btn button mt-2 w-100" style="font-size: .875rem !important;">تسجيل الدخول</a>

                          <a href="<?php echo esc_url( wp_registration_url( home_url() ) ); ?>" class="btn button mt-2 w-100" style="font-size: .875rem !important;">حساب جديد</a>
                      </div>
                    <?php } ?>
                </div>

                <?php get_search_form(); ?>
              </div>
            </div>
          </nav>