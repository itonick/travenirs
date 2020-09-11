$(function(){
    　$(‘.post_index’).scroll(function() {
    　　box_offset = $(‘.post_index’).offset().top;
    　　item_offset = $(‘.post_content’).offset().top;
    　　if ( box_offset == item_offset ) {
    　　　$(‘.post_list’).append($(‘.post_person’));
    　　}
    　});
});