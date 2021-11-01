$(document).ready(function () {   
    $(document).delegate('.js-wrapper-open', 'click', function(){
        if(!$(this).parent().hasClass('active')){
            $('.js-wrapper').removeClass('active');
        }
        $(this).parent().toggleClass('active');
    });

    /* Клик по любому месту, чтобы закрыть все выпадающие списки */
    $(document).delegate('body', 'click', function(e){
        if($(e.target).parents('.js-wrapper').length < 1){
            $('.js-wrapper').removeClass('active');
            // return false;
        }
    });

    $(document).delegate('.js-loading-data', 'click', function(e){
        var elem = $(this);
        var text = $(this).text();
        var href = $(this).attr('href');
        var parents = elem.parents('.js-wrapper');
        var id = $(this).attr('data-id');
        if(parents.hasClass('js-wrapper-brand')){
            $('.js-wrapper').each(function(){
                if(!$(this).hasClass('js-wrapper-brand')){
                    var txt = $(this).find('.js-no-select').html();
                    $(this).find('.js-wrapper-open span').html(txt);
                }
            });
        }
        // $('.preloader').addClass('active');
        parents.addClass('wrapper-dropdown-loader');
        $.ajax({
              type: 'GET',
              url: '/loadingData',
              data: 'id='+ id +'&YUPE_TOKEN='+ yupeToken,
              success: function(data){
                parents.find('.js-wrapper-open span').text(text);
                if(parents.hasClass('js-wrapper-brand')){
                    $('.js-wrapper-category').find('.js-loading-item').remove();
                    $('.js-wrapper-category').removeClass('noactive').find('ul').append(data);
                    $('.js-wrapper-category').find('.js-no-select').attr('href', href);
                }
                if(parents.hasClass('js-wrapper-category')){
                    $('.js-wrapper-model').find('.js-loading-item').remove();
                    $('.js-wrapper-model').removeClass('noactive').find('ul').append(data);
                    $('.js-wrapper-model').find('.js-no-select').attr('href', href);
                }
              },
              complete: function(data){
                $('.js-wrapper').removeClass('active');
                $('.js-search-select').attr('href', href);
                // $('.preloader').removeClass('active');
                parents.removeClass('wrapper-dropdown-loader');
              }

        });
        return false;
    });
    $(document).delegate('.js-no-select', 'click', function(e){
        var elem = $(this);
        var text = $(this).html();
        var href = $(this).attr('href');
        var parents = elem.parents('.js-wrapper');
        parents.find('.js-wrapper-open span').html(text);
        if(parents.hasClass('js-wrapper-brand')){
            $('.js-wrapper').each(function(){
                text = $(this).find('.js-no-select').html();
                $(this).find('.js-wrapper-open span').html(text);
                $('.js-loading-item').remove();
                if(!$(this).hasClass('js-wrapper-brand')){
                    $(this).find('.js-no-select').attr('href', '#');
                }
            });
        }
        if(parents.hasClass('js-wrapper-category')){
            var model = $('.js-wrapper-model');
            text = model.find('.js-no-select').html();
            console.log(text);
            model.find('.js-wrapper-open span').html(text);
            model.find('.js-loading-item').remove();
            model.find('.js-no-select').attr('href', '#');
        }
        if(parents.hasClass('js-wrapper-model')){
            $('.js-wrapper-model').find('.js-no-select').attr('href', '#');
        }
        $('.js-wrapper').removeClass('active');
        $('.js-search-select').attr('href', href);
        return false;
    });

    $(document).delegate('.js-reload-page', 'click', function(e){
        window.location.reload();
        return false;
    });
});