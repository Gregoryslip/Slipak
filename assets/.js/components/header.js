import $ from 'jquery'
export function header() {
    const header = document.getElementById('header');

    window.addEventListener('scroll', function () {
        if (document.documentElement.scrollTop > 80) {
            header.classList.add("header--on-scroll");
        } else {
            header.classList.remove("header--on-scroll");
        }
    })

    const triggers = document.querySelectorAll('.menu-trigger')
    const menu = document.querySelector('.header__mobile-menu')

    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            menu.classList.toggle('nav-active')
            open()
        })
    })
    function open() {
        if ($('.menu-trigger').hasClass("non-checked")) {
            $('html').css({ overflow: 'hidden', height: '100%' });
            $('.menu-trigger').addClass('checked')
            $('.menu-trigger').removeClass('non-checked')
        } else {
            $('html').css({ overflow: 'auto', height: 'auto' });
            $('.menu-trigger').removeClass('checked')
            $('.menu-trigger').addClass('non-checked')
        }
    }

}
