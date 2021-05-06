//
$(document).foundation();

/** */
$(function () {

    //
    $('table').resizableColumns();

    /** */
    $('#collapsed-sidebar').click(function (e) {
        e.preventDefault();

        if ($("#actions-sidebar.large-2").hasClass('actions-sidebar-hide')) {
            openNav();
            $("#actions-sidebar.large-2").removeClass('actions-sidebar-hide');
        } else {
            closeNav();
        }
    });

    /** */
    function openNav() {
        $("#actions-sidebar.large-2").css('display', 'block');
        $(".content.large-10").css('width', '83.33333%');
    }

    /** */
    function closeNav() {
        $("#actions-sidebar.large-2").addClass('actions-sidebar-hide').css('display', 'none');
        $(".content.large-10").css('width', '100%');
    }

    $('.side-nav').after('<p class="show-hide-side-nav">Toggle side nav</p>');

    $(document).on('click', '.show-hide-side-nav', function(e) {
        $('.side-nav').slideToggle();
    });

    $('.search-block').before('<p class="show-hide-search-block">Toggle search block</p>');

    $(document).on('click', '.show-hide-search-block', function(e) {
        $('.search-block').slideToggle();
    });

});