

export function formLoadFile() {



    window.addEventListener("DOMContentLoaded", function () {

        let download

        $("#download-trigger").on("click", function () {

            download = $(this).data("file-url")

        });



        var wpcf7Elm = document.querySelector('#wpcf7-f2406-o2');



        wpcf7Elm?.addEventListener('wpcf7mailsent', function (event) {

            window.open(download, "_blank");

        }, false);





    }, false);

}