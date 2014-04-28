          <!-- FOOTER -->
          <footer>

            <div class="row">

              <?php get_sidebar('footer-widget-1'); ?>

              <?php get_sidebar('footer-widget-2'); ?>

              <?php get_sidebar('footer-widget-3'); ?>

            </div> <!-- end row -->

            <hr>

            <p class="text-muted">
             <small>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a>.</small>
            </p>
          </footer>
        </div> <!-- end container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!-- <script src="assets/js/jquery-1.10.2.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <!-- <script src="assets/js/bootstrap.min.js"></script> -->

     <?php wp_footer(); ?>

     <script type="text/javascript">
      jQuery(function() {
        jQuery('nav#menu').mmenu();
      });
    </script>
    
  </body>
</html>