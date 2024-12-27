<?php
$img = get_sub_field('image');
?>
<div class="article__img">
    <?= wp_get_attachment_image($img['id'], [645, 360]); ?>
</div>