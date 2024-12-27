export function initBlog(){
    let currentPage = 1
    const maxPage = parseInt($('[name="maxPage"]').val())
    const maxPageNewQuery = parseInt($('[name="maxPageNewQuery"]').val())
    const hasAppenderTemplate = $('[name="has_template_appender"]').length

    $('[data-load-more]').on('click', function (e) {
        e.preventDefault()
        const loader = $('.archive__foot')
        const query = $('[name="query"]').val()
        currentPage++

        const data = {
            'action': 'blog_load_more',
            'page': currentPage,
            'has_appender_template': hasAppenderTemplate,
            'maxPageNewQuery': maxPageNewQuery,
            'query': query
        }

        if(currentPage <= maxPage){
            $.ajax({
                url : customjs_ajax_object.ajax_url,
                data : data,
                type : 'POST',
                dataType: 'json',
                beforeSend : function (xhr) {
                    loader.addClass('loading')
                },
                success : function(data) {
                    $('[data-archive-body]').append(data.html)
                    loader.removeClass('loading')
                    if(currentPage === maxPage){
                        loader.addClass('hidden')
                    }
                }
            });
        } else {
            loader.addClass('hidden')
        }
    })
}

