<?php
$section_heading = get_sub_field('tab__with__sidebar__heading');
$section_description = get_sub_field('tab__with__sidebar__description');
$title = get_sub_field('title');
$link = get_sub_field('link');
$tabs = get_sub_field('tab');
$btn = get_sub_field('cta');
$counter = 0;
?>
<section class="sidebar-tab">
	 <?php if($section_heading): ?>
     	<center><h2 class="tab-with-sidebar-heading"><?= $section_heading; ?></h2></center>
     <?php endif; ?>
	 <?php if($section_description): ?>
     	<center><p class="tab-with-sidebar-description"><?= $section_description; ?></p></center>
     <?php endif; ?>
    <?php if(is_array($tabs) && !empty($tabs)): ?>
        <div class="container sidebar-tab__container">
            <?php if($title): ?>
                <div class="sidebar-tab__title">
                    <h2><?= $title; ?></h2>
                </div>
            <?php endif; ?>

            <div class="sidebar-tab__outer">
                <div class="sidebar-tab__nav">
                    <?php foreach ($tabs as $tab):
                        $counter++;
                        ?>
                        <div class="sidebar-tab__trigger tab <?= $counter === 1? 'active' : ''; ?>" data-tab-target="#tab-item-<?= $counter; ?>">
                            <h3><?= $tab['name']; ?></h3>
							<p class="hidden"><?= $tab['description']; ?></p>
                        </div>
                    <?php endforeach;
                    $counter = 0;
                    ?>
					<div class="sidebar-tab__link">
					<?php	
					if( $link ) {
								echo '<a class="button-arrow" href="' . $link['url'] . '">' . $link['title'] . '</a>';
						}
					?>
					</div>
                </div>
                <div class="sidebar-tab__inner">
                    <?php foreach ($tabs as $tab):
                        $counter++;
                        ?>
                        <div class="sidebar-tab__tab <?= $counter === 1? 'active' : ''; ?>" id="tab-item-<?= $counter; ?>" data-tab-content>
                            <?= $tab['content']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($btn): ?>
        <div class="articles__foot">
            <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange-border"><?= $btn['title']; ?></a>
        </div>
    <?php endif;
    wp_reset_query();
    ?>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Function to load images
    function loadImages() {
      var images = document.querySelectorAll('img.home-gif.lazy');
      if (images.length === 0) {
        console.log('No images with class "home-gif lazy" found.');
        return;
      }

      images.forEach(function(img) {
        var src = img.getAttribute('data-src');
        if (src) {
          img.src = src;
        }
      });
    }

    // Add event listeners for user interaction
    ['click', 'touchstart', 'keydown'].forEach(event => {
      window.addEventListener(event, function loadAndRemove() {
        loadImages();
        // Remove event listeners after first interaction
        window.removeEventListener('click', loadAndRemove, false);
        window.removeEventListener('touchstart', loadAndRemove, false);
        window.removeEventListener('keydown', loadAndRemove, false);
      }, false);
    });
  });
</script>
