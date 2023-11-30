import './bootstrap';
import $ from "jquery";

$(document).ready(function () {
    $('.mini_sidebar').click(function () {
        $(this).closest('aside').toggleClass('min')
    })

    Echo.private(`notice`)
        .listen('NoticeEvent', (e) => {
            $('.desktop').append(`
                <div class="timeline-row card p-2">
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <p>Title : ${e.data.title}</p>
                        <p>Description : ${e.data.description}</p>
                    </div>
                     <div class="timeline-time">
                        <small style="font-size: 10px;">Created: ${new Date(e.data.created_at).toISOString().slice(0, 19).replace("T", " ")}</small>
                     </div>
                </div>`)
        });


    $('#filter_notice').change(function () {
        let select = $('#select');
        let value = select.val();
        $('.timeline').text('')
        axios({
            method: 'post',
            url: window.historyFilter,
            data: {
                'status': value
            }
        }).then(function (response) {
            response.data.data.forEach(function (val) {
                $('.timeline_admin').append(`
                     <div class="timeline-row card p-2">
                     ${val.status ? ' <div class="d-flex justify-content-end"><div class="status_approved"></div></div>' : '<div class="d-flex justify-content-end"><div class="status_approved not"></div></div>'}
                         <div class="timeline-content">
                            <i class="icon-attachment"></i>
                            <p>Title : ${val.title}</p>
                            <p>Description : ${val.description}</p>
                            <div class="timeline-time">
                        <small style="font-size: 10px;">Created: ${new Date(val.created_at).toISOString().slice(0, 19).replace("T", " ")}</small>
                            </div>
                        </div>
                    </div>
                    `)
            })
        }).catch(function (error) {
            // handle error
            console.error(error);
        })
    })
});

