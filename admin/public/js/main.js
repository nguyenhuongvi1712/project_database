$(document).ready(function() {

    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

    //  CHECK ALL
    $('input[name="checkAll"]').click(function() {
        var status = $(this).prop('checked');
        $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
    });

    // EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function() {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });
    //LIST SEARCH 
    $('#productSearch #s').on("keyup", function() {
        var keyWord = $(this).val();
        data = { keyWord: keyWord };
        if (keyWord != "" && keyWord.length > 1) {
            $.ajax({
                url: '?action=search',
                method: 'POST',
                data: data,
                dataType: 'text',
                cache: false,
                success: function(data) {
                    $('#productSearch #searchList').html(data);
                    $('#productSearch #searchList').fadeIn();
                }
            })
        } else {
            $('#productSearch #searchList').html("");
            $('#productSearch #searchList').fadeOut();
        }
    })
    $('#userSearch #s').on("keyup", function() {
        var keyWord = $(this).val();
        data = { keyWord: keyWord };
        if (keyWord != "") {
            $.ajax({
                url: '?mod=customer&action=search',
                method: 'POST',
                data: data,
                dataType: 'text',
                cache: false,
                success: function(data) {
                    $('#userSearch #searchList').html(data);
                    $('#userSearch #searchList').fadeIn();
                }
            })
        } else {
            $('#userSearch #searchList').html("");
            $('#userSearch #searchList').fadeOut();
        }
    })
    $(document).on("click", "#searchList li a", function() {
        $('#s').val($(this).text());
        $('#searchList').fadeOut("fast");
    })
    $(document).on("click", function() {
        $('#s').val("");
        $('#searchList').fadeOut("fast");
    })
});