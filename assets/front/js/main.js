// let j = jQuery.noConflict();
// j(document).ready(function(){
//     let tabs = j('.tabs li a');
//     tabs.click(function(){
//         let content = this.hash.replace('/', '');
//         tabs.removeClass('active');
//         j(this).addClass('active');
//         j('#content').find('div').hide();
//         j(content).slideDown("slow","swing");
//     })
// })
jQuery(document).ready(function($) {
    const tabs = $('.tabs li a');

    tabs.on('click', function(e) {
        e.preventDefault();
        const content = this.hash.replace('/', '');

        tabs.removeClass('active');
        $(this).addClass('active');

        $('#content div').hide();
        $(content).slideDown(300, 'swing');
    });
});