<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')) ?>">
	<div>
		<label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s">
		<input type="submit" id="searchsubmit" value="<?php esc_html_e('Search', 'wp-devs') ?>">
		<input type="hidden" id="post_type" name="post_type" value="post">
	</div>
</form>