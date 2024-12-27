jQuery(document).ready(function ($) {
  // Wrap content into sections
  let sections = [];
  let contentWrapper = $('.single-content__wr'); // Select the content wrapper
  let elements = contentWrapper.children(); // Get all children
  let section = $('<section class="content"></section>'); // Start the first section
  let sectionCounter = 1; // Counter for unique section IDs
  let toc = $('<div class="table-of-contents"><h3 class="font-semibold text-[20px] leading-[30px] text-[#2D3646]">Table of Contents</h3><ul class="flex flex-col gap-[10px] mt-[12px]"></ul></div>'); // TOC container

  // Remove numbers from <h2> elements
  contentWrapper.find('h2').each(function () {
    let text = $(this).text();
    $(this).text(text.replace(/^\d+\.\s*/, '')); // Remove numbers and dots at the beginning
});

  elements.each(function () {
      if ($(this).is('h2')) {
          // If the element is <hr>, finalize the current section
          section.attr('id', `sectionNumber${sectionCounter++}`); // Assign a unique ID
          sections.push(section);
          section = $('<section class="content"></section>'); // Start a new section
          section.append($(this));
      } else {
          // Add the element to the current section
          section.append($(this));
      }
  });

  // Add the final section
  section.attr('id', `sectionNumber${sectionCounter++}`);
  sections.push(section);

  // Clear the original wrapper and append new sections
  contentWrapper.empty();
  sections.forEach(function (sec) {
      contentWrapper.append(sec);

      // Add <h2> from each section to the Table of Contents
      let h2 = sec.find('h2').first(); // Find the first <h2> in the section
      if (h2.length) {
          let sectionId = sec.attr('id');
          let h2Text = h2.text();
          toc.find('ul').append(`<li><a class="text-base text-[#424A5D] leading-[26px]" href="#${sectionId}">${h2Text}</a></li>`);
      }
  });
  contentWrapper.children().first().prepend('<h2>Summary</h2>');
  $('hr').remove();
  // Prepend the Table of Contents to the wrapper
  $('.article__right').prepend(toc);

  
});
