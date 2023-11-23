import './bootstrap';
import $ from "jquery";

$( document ).ready(function() {
    $('.mini_sidebar').click(function (){
        $(this).closest('aside').toggleClass('min')
    })
});

