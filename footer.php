<hr class="mt-5">
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <h4 class="footer-title">
              من نحن
            </h4>
            <?php if(is_active_sidebar('who-are-we')) : ?>
              <?php dynamic_sidebar('who-are-we'); ?>
            <?php endif; ?>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 class="footer-title">
              تواصل معنا
            </h4>
            <?php if(is_active_sidebar('connect')) : ?>
              <?php dynamic_sidebar('connect'); ?>
            <?php endif; ?>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 class="footer-title">
              وسائل التواصل
            </h4>
            <?php if(is_active_sidebar('communication')) : ?>
              <?php dynamic_sidebar('communication'); ?>
            <?php endif; ?>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4 class="footer-title">
              تابعنا على
            </h4>
            <?php if(is_active_sidebar('widget-4')) : ?>
              <?php dynamic_sidebar('widget-4'); ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>  
</body>
</html>