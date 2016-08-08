<?php
/**
Template Name: Search Form
**/
?>

<form action="/" method="get" accept-charset="utf-8" id="searchform" role="search" class="form-inline">
    <div class="form-group">
    	<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="Pesquisar" class="form-control" />
    </div>
    <button type="submit" class="btn btn-primary">
    	<i class="fa fa-search"></i>
    </button>
</form>