<?php
$title = get_sub_field('title');
$table = get_sub_field('table');
$tables = $table['tables'];
$buttons = get_sub_field('buttons');
$trialBtn = get_sub_field('trial-btn');
$counter = 0;
?>
<section class="features" id="compare-features">
    <?php if($title): ?>
        <div class="features__title">
            <h2><?= $title; ?></h2>
        </div>
    <?php endif; ?>

    <div class="features__inner">
        <?php if(is_array($tables) && count($tables) > 1):
            foreach ($tables as $table):
                $title = $table['title'];
                $items = $table['items'];
                $counter++;
                $isFirst = $counter === 1;
        ?>
                <table>
                    <tr>
                        <td>
                            <h4><?= $title; ?></h4>
                        </td>
                        <td>
                            <h4><?= $isFirst? '<strong>Foundations</strong>' : ''; ?></h4>
                        </td>
                        <td>
                            <h4><?= $isFirst? '<strong>Essentials</strong>' : ''; ?></h4>
                        </td>
                        <td>
                            <h4><?= $isFirst? '<strong>Professional</strong>' : ''; ?></h4>
                        </td>
                        <td>
                            <h4><?= $isFirst? '<strong>Enterprise</strong>' : ''; ?></h4>
                        </td>
                    </tr>

                    <?php if(is_array($items) && count($items) > 1): ?>
                        <?php foreach ($items as $item):
                            $title = $item['title'];
                            $foundations = $item['foundations'];
                            $essentials = $item['essentials'];
                            $business = $item['business'];
                            $pro = $item['pro'];
                            $info= $item['info'];
                        ?>
                            <tr>
                                <td><?= $title; ?>
                                    <?php if($info): ?>
                                        <div class="features__tooltip">
                                            <div class="features__tooltip-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                    <path fill="none" d="M0 0h256v256H0z" />
                                                    <circle cx="128" cy="128" r="96" fill="none" stroke="#7e8893"
                                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                                    <circle cx="127.528" cy="176.069" r="8.226" fill="#7e8893" stroke="#7e8893"
                                                            stroke-width=".686" />
                                                    <path fill="none" stroke="#7e8893" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="16"
                                                          d="M128 144v-8a28 28 0 10-28-28" />
                                                </svg>
                                            </div>
                                            <div class="features__tooltip-body">
                                                <?= $info; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if($foundations): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="#ff4713" stroke="#ff4713"
                                                  d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                        </svg>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($essentials): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="#ff4713" stroke="#ff4713"
                                                  d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                        </svg>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($business): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="#ff4713" stroke="#ff4713"
                                                  d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                        </svg>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($pro): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="#ff4713" stroke="#ff4713"
                                                  d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
                                        </svg>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
        <?php endforeach;
            endif;
        ?>
		
		<?php
		$buttons_group = get_sub_field('new-buttons'); // Assuming you have fetched the group earlier
		$button_a = $buttons_group['button-a'];
		$button_b = $buttons_group['button-b'];
		$button_c = $buttons_group['button-c'];
		$button_d = $buttons_group['button-d'];
		?>

		<table>
			<tbody class="pricing-compare-cta">
				<tr>
					<td><h4></h4></td>
					<td>
						<a href="<?php echo esc_url($button_a['url']); ?>" 
						   target="<?php echo esc_attr($button_a['target']); ?>" 
						   class="btn btn--orange">
							<?php echo esc_html($button_a['title']); ?>
						</a>
					</td>
					<td>
						<a href="<?php echo esc_url($button_b['url']); ?>" 
						   target="<?php echo esc_attr($button_b['target']); ?>" 
						   class="btn btn--orange">
							<?php echo esc_html($button_b['title']); ?>
						</a>
					</td>
					<td>
						<a href="<?php echo esc_url($button_c['url']); ?>" 
						   target="<?php echo esc_attr($button_c['target']); ?>" 
						   class="btn btn--orange">
							<?php echo esc_html($button_c['title']); ?>
						</a>
					</td>
					<td>
						<a href="<?php echo esc_url($button_d['url']); ?>" 
						   target="<?php echo esc_attr($button_d['target']); ?>" 
						   class="btn btn--orange">
							<?php echo esc_html($button_d['title']); ?>
						</a>
					</td>
				</tr>
			</tbody>
		</table>

        <div class="features__btns">
            <?php if(is_array($buttons) && count($buttons) > 1): ?>
                <div class="features__row">
                    <?php foreach ($buttons as $button):
                        $btn = $button['button'];
                    ?>
                        <a href="<?= $btn['url']; ?>" target="<?= $btn['target']; ?>" class="btn btn--orange"><?= $btn['title']; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if($trialBtn): ?>
                <div class="features__foot">
                    <a href="<?= $trialBtn['url']; ?>" target="<?= $trialBtn['target']; ?>" class="btn btn--orange-border"><?= $trialBtn['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>