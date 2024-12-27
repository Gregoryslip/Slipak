export function findMore() {



    if (document.getElementById('find-more')) {

        const findMore = document.getElementById('find-more')



        function changeLink() {

            const optionLink = $('option[data-link]:checked').data("link")
            findMore.classList.add('opacity-100')
            findMore.href = optionLink

        }



        document.addEventListener("change", changeLink);

    }



}