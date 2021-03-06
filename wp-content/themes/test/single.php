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
                                <?php the_post_thumbnail(); ?>
                            </figure>
                          <?php else: ?>

                              <hr />

                          <?php endif; ?>

                          <?php the_content(); ?>

                          <?php if (has_tag()) : ?>

                            <hr />
                            <p class="article-tag-list"><?php the_tags(); ?></p>
                            
                          <?php endif; ?>

                          <!-- Displaying post pagination links in case we have multiple page posts -->
                         <?php wp_link_pages('before=<div class="post-pagination">&after=</div>&pagelink=Page %'); ?>

                        </article>

                        <div class="article-author clearfix">
            
                          <p><strong>Article by </strong><?php the_author_posts_link(); ?></p>
                          <p><?php the_author_meta('description'); ?></p>             
                        
                        </div> <!-- end clearfix -->

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

          </section>

<?php get_footer(); ?>