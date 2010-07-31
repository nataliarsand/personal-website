<?php get_header(); ?>



		<section id="internal">



			<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>



			<article id="post-<?php the_ID(); ?>">

				<header>

					<h1><?php the_title(); ?></h1>

				</header>

				<section>

					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>

				</section>

			</article>



			<?php endwhile; ?>



			<?php else : ?>



			<article>

				<h2>Not Found</h2>

				<p>Sorry, but the requested resource was not found on this site.</p>

				<?php get_search_form(); ?>

			</article>



			<?php endif; ?>



		</section>



<?php get_sidebar(); ?>



<?php get_footer(); ?>