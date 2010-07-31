					<form method="get" action="<?php bloginfo('url'); ?>/">
						<label for="s">Search the site: </label>
						<input type="text" id="s" name="s" value="<?php the_search_query(); ?>">
						<input type="submit" value="Search">
					</form>