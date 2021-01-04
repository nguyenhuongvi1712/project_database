$(document).ready(function() {
    //CAROUSEL
    $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
        //  EVEN MENU RESPON
    $('html').on('click', function(event) {
        var target = $(event.target);
        var site = $('#site');

        if (target.is('#btn-respon i')) {
            if (!site.hasClass('show-respon-menu')) {
                site.addClass('show-respon-menu');
            } else {
                site.removeClass('show-respon-menu');
            }
        } else {
            $('#container').click(function() {
                if (site.hasClass('show-respon-menu')) {
                    site.removeClass('show-respon-menu');
                    return false;
                }
            });
        }
    });
    $('#s').on("keyup", function() {
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
                    $('#searchList').html(data);
                    $('#searchList').fadeIn();
                }
            })
        } else {
            $('#searchList').html("");
            $('#searchList').fadeOut();
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

    //FILTER-BOX
    $('#input-option #filter-box').fadeOut();
    $('#input-option #option button').click(function() {
        $('#filter-box').slideToggle();
    })
    $('#filter-box input').change(function() {
        if ($('#option span[name=' + $(this).val() + ']').length) {
            $('#input-option #option span[name=' + $(this).val() + ']').remove();
        } else {
            $('#input-option #option').append('<span class="btn btn-outline-secondary btn-sm m-2" name="' + $(this).val() + '">' + $(this).val() + '</span>');
        }
    });
    $('#option').on('click', "span", function() {
        if ($('#filter-box input[value="' + $(this).text() + '"]').is(':checked'))
            $('#filter-box input[value="' + $(this).text() + '"]').attr('checked', false);
        $(this).remove();
    })
    if ($('#option span').length) {
        $('#option span ').each(function() {
            $('#filter-box input[value="' + $(this).text() + '"]').attr('checked', true);
        })
    }


    //    MENU RESPON
    $('#main-menu-respon li .sub-menu').after('<span class="fa fa-angle-right arrow"></span>');
    $('#main-menu-respon li .arrow').click(function() {
        if ($(this).parent('li').hasClass('open')) {
            $(this).parent('li').removeClass('open');
            $(this).parent('li').find('.sub-menu').slideUp();
        } else {
            $('.sub-menu').slideUp();
            $('#main-menu-respon li').removeClass('open');
            $(this).parent('li').addClass('open');
            $(this).parent('li').find('.sub-menu').slideDown();
        }
    });
});