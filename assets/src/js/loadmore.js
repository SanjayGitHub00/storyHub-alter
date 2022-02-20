
jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    $('.loadMore__btn').click(function(){
        let button = $(this),
            data = {
                'action': 'loadmore',
                'query': storyHub_alter_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : storyHub_alter_loadmore_params.current_page
            };

        $.ajax({ // you can also use $.post here
            url : storyHub_alter_loadmore_params.ajaxUrl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                if( data ) {
                    $('#load-more-content').append(data);
                    // button.text( 'More posts' ).before(data);
                    storyHub_alter_loadmore_params.current_page++;
                    if ( storyHub_alter_loadmore_params.current_page == storyHub_alter_loadmore_params.max_page )
                        button.remove(); // if last page, remove the button

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // $( document.body ).trigger( 'post-load' );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});