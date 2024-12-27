import $ from 'jquery'
export function pricing() {

    $('button, :radio, select').on('change', getActive);

    function getActive(e) {
        const place = document.querySelectorAll(".pricing-card__price-place");
        const symbolPlace = document.querySelectorAll('.pricing-card__price-symbol')

        symbolPlace.forEach(element => {
            const symbol = $('input[name=currency]:checked').data("symbol")
            element.innerHTML = symbol
        })
        
        place.forEach(element => {
            const monthAnnual = $('input[name=monthly-annually]:checked').data("month-annual")
            const currency = $('input[name=currency]:checked').data("currency")
            const tempAttribute = 'data-' + currency + '-' + monthAnnual

            let parent = element.closest('.pricing-card')
            let tempValue = $(parent).attr(tempAttribute)

            element.innerText = tempValue

            if ($('.select').closest('.pricing-card') !== null) {
                let parent = $('.select').closest('.pricing-card')
                parent.addClass('with-select')
            }

            if ($('.pricing-card').hasClass("with-select")) {
                let child = document.querySelector('.with-select > .pricing-card__inner > .pricing-card__price > .pricing-card__price-place-wrap > .pricing-card__price-place')

                const selectValue = tempAttribute + '-value'
                const tempAttributeValue = $('option[name=month-annual]:checked').attr(selectValue)

                if ($('input[name=monthly-annually]:checked').data("month-annual") == 'month') {
                    child.innerText = tempAttributeValue
                } else {
                    child.innerText = tempAttributeValue
                }

            }

        })
    }

    const itemsWrap = document.getElementById('pricing-inner')

    $('#monthly').change(function () {
        itemsWrap.classList.add('pricing--month')
        itemsWrap.classList.remove('pricing--annual')
    });
    $('#annually').change(function () {
        itemsWrap.classList.remove('pricing--month')
        itemsWrap.classList.add('pricing--annual')
    });

}