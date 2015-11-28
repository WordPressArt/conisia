<div class="grid_8 omega">
    <div class="sidebar">
        <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
            <br/>
        <?php endif; // end primary widget area  ?>
        <?php
        // A second sidebar for widgets, just because.
        if (is_active_sidebar('secondary-widget-area')) :
            ?>
            <?php dynamic_sidebar('secondary-widget-area'); ?>
        <?php endif; ?>
    </div>
</div>
