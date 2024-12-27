document.addEventListener('DOMContentLoaded', function() {
    var variants = [
        { text: 'Start my Free Trial', utm: 'utm_source=split_test&utm_campaign=variantA' },
        { text: 'Get your forecast', utm: 'utm_source=split_test&utm_campaign=variantB' },
        { text: 'Get started', utm: 'utm_source=split_test&utm_campaign=variantC' },
        { text: 'Try free', utm: 'utm_source=split_test&utm_campaign=variantD' },
        { text: 'Start free', utm: 'utm_source=split_test&utm_campaign=variantG' },
        // ... add more variants as needed
    ];

    // Randomly select a variant
    var selectedVariant = variants[Math.floor(Math.random() * variants.length)];

    var splitElements = [
        ...document.querySelectorAll('.split')
    ];

    splitElements.forEach(function(element) {
        if (element) {
            // Modify the href to include the UTM parameter
            if(element.tagName === 'A') {
                element.href += '?' + selectedVariant.utm;
            }

            // Modify the text content of the element
            element.textContent = selectedVariant.text;

            // Show the element
            element.style.display = 'inherit'; // or 'block' depending on your design
        }
    });
});
