import { slideToggle } from './utils/slideToggle';
import $ from 'jquery'
export function utils() {
    $(window).on('load', function () {
        $("body").removeClass("preload");
    });

    document.querySelectorAll('[data-dropdown-status]').forEach(el => {
        const wrapper = el
        const head = el.querySelector('[data-dropdown-head]')
        const body = wrapper.querySelector('[data-dropdown-body]')

        head.addEventListener('click', (e) => {
            // if (e.target.closest('a')) return
            const workingRange = wrapper.dataset.workingRange.split(' ')
            const minWorkingVw = workingRange[0]
            const maxWorkingVw = workingRange[1] || Infinity;
            if (window.innerWidth >= minWorkingVw &&
                maxWorkingVw >= window.innerWidth) {
                if (wrapper.dataset.dropdownStatus === 'open') {
                    wrapper.dataset.dropdownStatus = 'close'
                    wrapper.classList.remove('active')
                } else {
                    wrapper.dataset.dropdownStatus = 'open'
                    wrapper.classList.add('active')
                }
                slideToggle(body, 300)
            }
        })

    })

}