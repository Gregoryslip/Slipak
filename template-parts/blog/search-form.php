<?php
$s = isset($args['s'])? $args['s'] : false;
?>
<div class="w-full flex content-center justify-center mt-[50px] mb-[68px]">
  <form action="<?= HOME_URL; ?>" class="archive-search">
      <button type="submit" aria-label="Search the blog">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.967 13.967">
                <g fill="none" stroke="#2D3646" stroke-linecap="round" stroke-width="2"
                  data-name="Group 3464">
                    <g data-name="Ellipse 762" transform="translate(3.967)">
                        <circle cx="5" cy="5" r="5" stroke="none" />
                        <circle cx="5" cy="5" r="4" />
                    </g>
                    <path d="M5.967 8l-4.553 4.552" data-name="Path 1499" />
                </g>
            </svg>
        </button>
      <input type="search" name="s" placeholder="Search..." required minlength="3" value="<?= $s; ?>">
      
  </form>
</div>