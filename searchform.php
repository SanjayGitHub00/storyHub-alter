<?php

/**
 *  Search Form
 * @package storyHub-alter
 */
?>

<form action="<?php echo esc_url(home_url('/')); ?>" class="search__form flex items-center" role="search" method="get">
    <span class="screen-reader-text" for='s'> <?php echo _x('Search for:', 'label', 'storyHub-alter'); ?></span>
    <input placeholder="<?php echo esc_attr_x('Enter your search topic &hellip;', 'Placeholder', 'storyHub-alter'); ?>"
           id="search" type="search" value="<?php the_search_query(); ?>" name="s">
</form>