<form action="<?php bloginfo('url'); ?>/">
    <div class="input-group">
        <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" placeholder="Search for...">
        <span class="input-group-btn">
            <button class="btn" type="submit">Go!</button>
        </span>
    </div>
</form>