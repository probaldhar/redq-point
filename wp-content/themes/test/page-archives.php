<?php
/*
  Template Name: Archives Page
*/
?>

<?php get_header(); ?>

        <div class="container">
          <!-- BANNER -->
          <section>
            <div class="well well-lg text-center">
              <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</h4>


            </div> <!-- end panel -->
          </section>


          <!-- MAIN CONTENT -->
          <section>
            <div class="row">
              <div class="col-lg-9">
                                             
                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                          <?php if (current_user_can('edit_post', $post->ID)) {
                              edit_post_link(__('Edit This', 'adaptive-framework'), '<p class="page-admin-edit-this">', '</p>');
                            } 
                          ?>

                          <hr />

                          <h4><?php _e('Archives by Month', 'new-item') ?></h4>
                          <hr />

                          <ul>
                            <?php wp_get_archives('type=monthly'); ?>
                          </ul>

                          <h4><?php _e('Archives by Subject', 'new-item') ?></h4>
                          <hr />

                          <ul>
                            <?php wp_list_categories('hiararchical=0&title_li='); ?>
                          </ul>                          

                        </article>
                      
                <div>
                  <p class="article-nav-prev"><?php next_posts_link( __('&larr; Older Posts', 'new-item')); ?></p>
                  <p class="article-nav-next"><?php previous_posts_link( __('Newer Posts &rarr;', 'new-item')); ?></p>
                </div>
              </div> <!-- end col-lg-8 -->

              <aside class="col-lg-3">
                <div class="sidebar-widget">
                  <?php get_sidebar(); ?>
                </div> <!-- end sidebar-widget -->
              </aside> <!-- end col-lg-3 -->
            </div> <!-- end row -->

            <hr>

          </section>

<?php get_footer(); ?>