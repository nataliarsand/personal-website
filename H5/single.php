<?php get_header(); ?>



	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



		<section id="internal">

			<article id="post-<?php the_ID(); ?>">

				<header>

					<h1><?php the_title(); ?></h1>

				</header>

				<section>

					<?php the_content('Read more on "'.the_title('', '', false).'" &raquo;'); ?>

				</section>

				<footer>

<p>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

							// both comments and pings open ?>

							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.



						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {

							// only pings are open ?>

							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.



						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

							// comments are open, pings are not ?>

							You can skip to the end and leave a response. Pinging is currently not allowed.



						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {

							// neither comments nor pings are open ?>

							Both comments and pings are currently closed.



						<?php } edit_post_link('Edit this entry','','.'); ?>



					</p>

				</footer>

			</article>



			<?php comments_template(); ?>



			<nav>

				<?php previous_post_link(); ?> &bull; <?php next_post_link(); ?>

			</nav>

		</section>



	<?php endwhile; else: ?>



		<section>

			<article>

				<p>Sorry, no posts matched your criteria.</p>

			</article>

		</section>



	<?php endif; ?>



<?php get_sidebar(); ?>



<?php get_footer(); ?>