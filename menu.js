document.addEventListener('DOMContentLoaded', () => {
  const burger = document.querySelector('.js-menu-burger')
  const menu = document.querySelector('.js-menu')
  const menuLinks = document.querySelectorAll('.js-menu-link')

  if (burger && menu) {
    burger.addEventListener('click', () => {
      burger.classList.toggle('bg-[#ff4713]')
      burger.classList.toggle('text-white')
      menu.classList.toggle('visible')
      menu.classList.toggle('invisible')
      menu.classList.toggle('opacity-100')
      menu.classList.toggle('opacity-0')
    })
  }

  menuLinks.forEach((link) => {
    const submenu = link.nextElementSibling

    if (!submenu) {
      return
    }

    if (submenu.classList.contains('js-menu-submenu') === false) {
      return
    }

    link.addEventListener('click', (e) => {
      e.preventDefault()
      submenu.classList.toggle('block')
      submenu.classList.toggle('hidden')
    })
  })
})
