export function select() {
    const selects = document.querySelectorAll('.select')

    selects.forEach(select => {
        select.addEventListener('click', e => {
            select.parentElement.classList.toggle('select-active')
        })
        select.addEventListener("blur", function (event) {
            select.parentElement.classList.remove('select-active')
        }, true);
    })

    
}