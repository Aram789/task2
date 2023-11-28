import './bootstrap';
import $ from "jquery";

$(document).ready(function () {
    $('.mini_sidebar').click(function () {
        $(this).closest('aside').toggleClass('min')
    })

    Echo.private(`notice`)
        .listen('NoticeEvent', (e) => {

            $('.desktop').append(`<div class="timeline-row card p-2">
                    <div class="timeline-content">
                        <i class="icon-attachment"></i>
                        <p>Title : ${e.data.title}</p>
                        <p>Description : ${e.data.description}</p>
                    </div>
                     <div class="timeline-time">
                        <small>Created: ${new Date(e.data.created_at).toISOString().slice(0, 19).replace("T", " ")}</small>
                     </div>
                </div>`)
        });
});

