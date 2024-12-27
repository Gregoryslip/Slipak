<?php
$section_title = get_sub_field('section_title');
$img_a = get_sub_field('column_a_image');
$text_a = get_sub_field('column_a_text');
$btn_a = get_sub_field('column_a_link');
$video_a = get_sub_field('column_a_video');
$img_b = get_sub_field('column_b_image');
$text_b = get_sub_field('column_b_text');
$btn_b = get_sub_field('column_b_link');
$video_b = get_sub_field('column_b_video');
$img_c = get_sub_field('column_c_image');
$text_c = get_sub_field('column_c_text');
$btn_c = get_sub_field('column_c_link');
$video_c = get_sub_field('column_c_video');

$active_columns = 0;

if($img_a || $text_a || $btn_a) $active_columns++;
if($img_b || $text_b || $btn_b) $active_columns++;
if($img_c || $text_c || $btn_c) $active_columns++;

$column_width = ($active_columns === 3) ? 'calc(33% - 10px)' : 'calc(50% - 10px)';
?>

<section class="single-content two_column_section">
	<?php if ($section_title): ?>
	<div class="articles__title">
		<h2><?= htmlspecialchars($section_title, ENT_QUOTES, 'UTF-8'); ?></h2>
	</div>
	<?php endif; ?>
    <div class="two_column_section_inner" style="grid-template-columns: repeat(<?= $active_columns; ?>, <?= $column_width; ?>);">
        <div class="two_column_section_inner_column_a">
            <div class="two_column__img">
                <?php if ($video_a): ?>
                    <video controls poster="<?= wp_get_attachment_image_src($img_a['id'], [600, 400])[0]; ?>">
                        <source src="<?= $video_a; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <?= wp_get_attachment_image($img_a['id'], [600, 400]); ?>
                <?php endif; ?>
            </div>
            <div class="two_column__text">
                <?php if($text_a): ?>
                    <p><?= $text_a; ?></p>
                <?php endif; ?>
            </div>
            <?php if($btn_a): ?>
                <div class="column_cta">
                    <a href="<?= $btn_a['url']; ?>" target="<?= $btn_a['target']; ?>" class="btn btn--orange"><?= $btn_a['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="two_column_section_inner_column_b">
            <div class="two_column__img">
                <?php if ($video_b): ?>
                    <video controls poster="<?= wp_get_attachment_image_src($img_b['id'], [600, 400])[0]; ?>">
                        <source src="<?= $video_b; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <?= wp_get_attachment_image($img_b['id'], [600, 400]); ?>
                <?php endif; ?>
            </div>
            <div class="two_column__text">
                <?php if($text_b): ?>
                    <p><?= $text_b; ?></p>
                <?php endif; ?>
            </div>
            <?php if($btn_b): ?>
                <div class="column_cta">
                    <a href="<?= $btn_b['url']; ?>" target="<?= $btn_b['target']; ?>" class="btn btn--orange"><?= $btn_b['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
        <?php if($img_c || $text_c || $btn_c): ?>
        <div class="two_column_section_inner_column_c">
            <div class="two_column__img">
                <?php if ($video_c): ?>
                    <video controls poster="<?= wp_get_attachment_image_src($img_c['id'], [600, 400])[0]; ?>">
                        <source src="<?= $video_c; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <?= wp_get_attachment_image($img_c['id'], [600, 400]); ?>
                <?php endif; ?>
            </div>
            <div class="two_column__text">
                <?php if($text_c): ?>
                    <p><?= $text_c; ?></p>
                <?php endif; ?>
            </div>
            <?php if($btn_c): ?>
                <div class="column_cta">
                    <a href="<?= $btn_c['url']; ?>" target="<?= $btn_c['target']; ?>" class="btn btn--orange"><?= $btn_c['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>