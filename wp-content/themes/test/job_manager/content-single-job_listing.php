<?php global $job_manager; ?>

	<div class="container" itemscope itemtype="http://schema.org/JobPosting">
		<meta itemprop="title" content="<?php echo esc_attr( $post->post_title ); ?>" />

		<?php if ( $post->post_status == 'expired' ) : ?>

			<div class="well well-sm"><?php _e( 'This job listing has expired', 'wp-job-manager' ); ?></div>

		<?php else : ?>


			<ul class="list-inline text-center top_list">
					<?php do_action( 'single_job_listing_meta_start' ); ?>

					<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>" itemprop="employmentType"><?php the_job_type(); ?></li>

					<li> - <?php the_company_name( '<strong itemprop="name">', '</strong>' ); ?></li>

					<li itemprop="jobLocation"><span class="glyphicon glyphicon-map-marker"></span><?php the_job_location(); ?></li>

					<li itemprop="datePosted"><date><?php printf( __( 'Posted %s ago', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

					<?php if ( is_position_filled() ) : ?>
						<li class="well well-sm"><?php _e( 'This position has been filled', 'wp-job-manager' ); ?></li>
					<?php endif; ?>

					<?php do_action( 'single_job_listing_meta_end' ); ?>
			</ul>


			<hr>


			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 image_full">
					<?php the_company_logo( $size = 'full' ); ?>
				</div>

				<div class="col-md-5 col-sm-6 col-xs-12 middle_col_job">
					<h3>Job Category</h3>
					<h5>Category Function</h5>
					<h3>Share Job Posting</h3>
					<h5>social plugin</h5>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<h3>Company Details</h3>

					<ul class="list-inline">
						<li>
							<a class="website" href="<?php echo get_the_company_website(); ?>" itemprop="url"><?php _e( 'Website', 'wp-job-manager' ); ?></a>
						</li>
						<li>
							<?php the_company_twitter(); ?>
						</li>
					</ul>

					<?php if ( ! is_position_filled() && $post->post_status !== 'preview' ) get_job_manager_template( 'job-application.php' ); ?>

				</div>
			</div>

			<h2>Overview</h2>

			<div class="job_description well" itemprop="description">
				<?php echo apply_filters( 'the_job_description', get_the_content() ); ?>
			</div>

		<?php endif; ?>

	</div>