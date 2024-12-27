$(function() {
    $(window).on('load', function() {
        setPricing();
        setFAQ();
        if (isBusinessDoctorsPage()) {
            customizeForBusinessDoctors();  // Apply customizations only if on the specific URL
        }
    });

    function setPricing() {
        if (!$("section#pricing").length) return;

        if ($("section#pricing .plans .slider").length) {
            $("section#pricing .plans .slider").slider({
                min: 1,
                max: 15,
                create: function() {
                    // handle.text($(this).slider("value"));
                },
                slide: function(event, ui) {
                    var sliderValue = ui.value;
                    var plans = getPlans(sliderValue);
                    if (isBusinessDoctorsPage()) {
                        updateBusinessDoctorsBarWidth(sliderValue);
                    } else {
                        $("section#pricing .plans .bar").width((sliderValue - 1) * 7.14 + '%');
                    }
                    $("section#pricing .plans").attr('plans', plans);
                    updatePrice();
                    updatePremiumURL();
                }
            });
        }

        if ($("section#pricing input#period").length) {
            $("section#pricing input#period").on('change', function() {
                updatePrice();
                updatePremiumURL();
            });
        }

        if ($("section#pricing select#currency").length) {
            $("section#pricing select#currency").on('change', function() {
                updatePrice();
                updatePremiumURL();
            });
        }

        updatePrice();
        setDefaultCurrency();
        toggleSavingsLabel();
        updatePremiumURL(); // Initial call to update the URL
    }

    function isBusinessDoctorsPage() {
        var currentURL = window.location.href;
        return currentURL.includes('business-doctors-achieve-your-vision');
    }

    function customizeForBusinessDoctors() {
        // Trim unnecessary spans, only keep those for plans 7 to 15
        var planSpans = $("section#pricing .plans span");
        planSpans.slice(0, 6).remove(); // Remove spans before plan 7
        planSpans.slice(9).remove(); // Remove spans after plan 15

        // Remove any existing slider (to ensure clean re-initialization)
        $("section#pricing .plans .slider").slider("destroy");

        // Initialize the slider with the correct configuration
        $("section#pricing .plans .slider").slider({
            min: 7,
            max: 15,
            value: 7,
            step: 1,
            create: function() {
                // Set initial width to 0% for plan 7
                $("section#pricing .plans .bar").width('0%');
            },
            slide: function(event, ui) {
                var sliderValue = ui.value;
                var plans = getPlans(sliderValue);
                updateBusinessDoctorsBarWidth(sliderValue);
                $("section#pricing .plans").attr('plans', plans);
                updatePrice();
                updatePremiumURL();
            }
        });

        // Ensure the slider value display is correctly set to 7 on load
        $("section#pricing .plans .slider").slider("value", 7);
        $("section#pricing .plans").attr('plans', 7);
        updateBusinessDoctorsBarWidth(7);
        updatePrice();
        updatePremiumURL();

        // Adjust the bar width calculation to start at 7
        $("section#pricing .plans .bar").width('0%');  // Set initial width to 0% for plan 7
    }

    function updateBusinessDoctorsBarWidth(sliderValue) {
        // Custom bar width calculation for the business doctors page
        var sliderMin = 7;
        var sliderMax = 15;

        var totalSteps = sliderMax - sliderMin;
        var currentStep = sliderValue - sliderMin;

        // Calculate the percentage width based on the slider value
        var barWidthPercentage = (currentStep / totalSteps) * 100;
        $("section#pricing .plans .bar").width(barWidthPercentage + '%');
    }

    function getPlans(sliderValue) {
        switch (sliderValue) {
            case 11: return 15;
            case 12: return 20;
            case 13: return 30;
            case 14: return 40;
            case 15: return 50;
            default: return sliderValue;
        }
    }

    // Other functions remain unchanged
    function setDefaultCurrency() {
        if (!$("section#pricing select#currency").length) return;

        $.ajax("https://ipapi.co/currency/", {
            success: function(e) {
                var currency = e.toLowerCase();
                if ($("section#pricing select#currency option[value=" + currency + "]").length > 0) {
                    $("section#pricing select#currency").val(currency);
                    $("section#pricing select#currency").trigger('change');
                }
            },
            error: function() {
                console.error('Unable to fetch default currency');
            }
        });
    }

    function updatePrice() {
        if (!$("section#pricing").length) return;

        var period = $("section#pricing input#period").is(':checked') ? 'annually' : 'monthly';
        var currency = $("section#pricing select#currency").val();
        var plans = parseInt($("section#pricing .plans").attr('plans'));
        var planPrice = parseFloat($("section#pricing .plans").attr(currency + '-' + period + '-extra-plan'));

        var price = parseFloat($("section#pricing .plans").attr(currency + '-' + period)) + (plans - 1) * planPrice;
        var billed = period == 'monthly' ? price : price * 12;

        $("section#pricing .plans-value").text(plans == 1 ? plans + ' plan' : plans + ' plans');
        $("section#pricing").attr('currency', currency);
        $("section#pricing .price-value").text(price.toFixed(2));
        $("section#pricing .period-value").text(period);
        $("section#pricing .billed-value").text(billed.toFixed(2));
        $("section#pricing .box.premium .details p label").text((planPrice.toString().includes('.') ? planPrice.toFixed(2) : planPrice));
    }

    function toggleSavingsLabel() {
        var periodCheckbox = document.getElementById('period');
        var savingsLabel = document.getElementById('savings-label');

        if (!periodCheckbox || !savingsLabel) return;

        function updateSavingsLabelVisibility() {
            if (periodCheckbox.checked) {
                savingsLabel.style.display = 'block';
            } else {
                savingsLabel.style.display = 'none';
            }
        }

        periodCheckbox.addEventListener('change', updateSavingsLabelVisibility);
        updateSavingsLabelVisibility();
    }

    function setFAQ() {
        if (!$('section#faq-alternate').length) return;

        $('section#faq-alternate').each(function(i, section) {
            section = $(section);
            section.find('.faq .question').on('click', toggleFAQ);
            section.find('.expand-all').on('click', toggleExpandAll);
        });
    }

    function toggleFAQ(e) {
        var item = e.currentTarget ? $(e.currentTarget).parent() : $(e.target).parent();
        var answer = item.find('.answer');
        var span = answer.find('> span');
        answer.height(answer.height());
        item.toggleClass('open');

        if (item.hasClass('open')) {
            var height = span.outerHeight();
            answer.height(height);
            setTimeout(function() {
                answer.attr('style', 'height: auto;');
            }, 250);
        } else {
            setTimeout(function() {
                answer.removeAttr('style');
            }, 1);
        }

        checkExpandAll(item.parent());
    }

    function checkExpandAll(items) {
        var expandAll = items.parent().find('.expand-all');
			if (items.find('.item').length === items.find('.item.open').length)
            expandAll.addClass('open');
        else
            expandAll.removeClass('open');
    }

    function toggleExpandAll(e) {
        var expandAll = $(e.currentTarget);
        var section = expandAll.parent().parent();

        if (expandAll.hasClass('open')) {
            section.find('.item .question').trigger('click');
            expandAll.removeClass('open');
        } else {
            section.find('.item:not(.open) .question').trigger('click');
            expandAll.addClass('open');
        }
    }

    function updatePremiumURL() {
        var sliderValue = parseInt($("section#pricing .plans").attr('plans'));
        var period = $("section#pricing input#period").is(':checked') ? 'Annually' : 'Monthly';
        var currency = $("section#pricing select#currency").val();

        // If slider value is 15, directly get the value from the plans-value div
        var plans = sliderValue === 15 ? parseInt($("section#pricing .plans-value").text()) : getPlans(sliderValue);

        // Get the current URL
        var currentURL = window.location.href;

        // Check if the URL contains 'business-doctors'
        var url;
        if (currentURL.includes('business-doctors')) {
            url = `https://businessdoctors.brixx.com/paid-sign-up/brixx/${plans}/${period}/${currency}`;
        } else {
            url = `https://app.brixx.com/paid-sign-up/brixx/${plans}/${period}/${currency}`;
        }

        $("section#pricing .box.premium .btn-orange").attr('href', url);
    }

    // Fallback URL, can be left for safety
    $("section#pricing .box.premium .btn-orange").attr('href', 'https://app.brixx.com/sign-up/?mtm_campaign=pricing-page&mtm_source=website&mtm_medium=subscription');
});
