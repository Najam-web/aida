jQuery(document).ready(function($){
    $('.cms-approve-user').on('change', function(){
        var user_id = $(this).data('userid');
        var approved = $(this).is(':checked') ? 1 : 0;
        $.post(ajaxurl, { action: 'cms_approve_user', user_id: user_id, approved: approved }, function(response){
            alert('User approval updated!');
        });
    });
});
