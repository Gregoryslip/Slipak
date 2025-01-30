<?php
$s = isset($args['s'])? $args['s'] : false;
?>
<div class="w-full flex content-center justify-center mt-[50px] mb-[68px]">
  <form action="<?= HOME_URL; ?>" class="w-full max-w-[360px] relative flex">
      <button type="submit" aria-label="Search the blog" 
      class="absolute top-0 left-0 h-full inline-flex items-center justify-center w-[50px] shrink-0 p-2">
      <svg
          width="20"
          height="20"
          viewBox="0 0 20 20"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"
            stroke="#2D3646"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M17.5 17.5L13.875 13.875"
            stroke="#2D3646"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
        </button>
      <input type="search" name="s" placeholder="Search..." required minlength="3" value="<?= $s; ?>" 
        class="h-[46px] border border-[#E2E8ED] pl-[45px] w-full rounded-[2px]">
      
  </form>
</div>