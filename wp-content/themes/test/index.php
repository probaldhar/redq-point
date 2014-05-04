<?php get_header(); ?>

        <div class="container">



          <!-- MAIN CONTENT -->
          <section>
            <div class="row">
              <div class="col-lg-12">
                

                  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                        
                      
                        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                          <?php if (has_post_thumbnail()) : ?>
                            <figure>
                                
                            </figure>
                          <?php endif; ?>

                          

                        </article>
                        <hr>
                      

                  <?php endwhile; else : ?>
                    <article>
                      <h1><?php _e( 'No Posts were Found!', 'new-item' ); ?></h1>
                    </article>
                  <?php endif; ?>

                        
                

                  <div>
                    <p class="article-nav-prev"><?php next_posts_link( __('&larr; Older Posts', 'new-item')); ?></p>
                    <p class="article-nav-next"><?php previous_posts_link( __('Newer Posts &rarr;', 'new-item')); ?></p>
                  </div>
              </div> <!-- end col-lg-8 -->


            </div> <!-- end row -->

            <hr>

            <!-- <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">Last &raquo;</a></li>
            </ul> -->

          </section>

<?php get_footer(); ?>