<form class="search" id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search" id="label_for"></label>
    <input id="search" type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Opa, o que procura?" required>
    <i class="fa fa-search"></i>
    <button type="submit" style="display: none;"></button>
</form>