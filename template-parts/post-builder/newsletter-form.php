<?php
$newsletter = get_field('single-article__newsletter-form', 'option');
?>
<?php if($newsletter): ?>
    <div class="article__sign-up">
        <p><?= $newsletter['title']; ?></p>
        <?//= do_shortcode($newsletter['form']); ?>
		<script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
		<script>
		  hbspt.forms.create({
			region: "eu1",
			portalId: "26872544",
			formId: "4cbd8524-ca06-4447-80e1-2f12b326d626"
		  });
		</script>
    </div>
<?php endif; ?>