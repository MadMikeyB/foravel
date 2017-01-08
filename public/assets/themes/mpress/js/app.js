$(function() {
	// $('#post-content img').attr('data-toggle', 'Click to show full image');

	$('#post-content img').click(function() {
		$(this).toggleClass('full');
	});

	$('.reaction').click(function(e){
		e.preventDefault();

		var id = $(this).attr('id');
		var post_id = $(this).attr('data-post-id');
		var num_likes = $(this).children('.total').html();
		var user_id =  $(this).attr('data-user-id');
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		
		$.ajax({
			type 	: 'POST',
			url		: '/api/react',
    		data	: {
    					_token		: CSRF_TOKEN, 
    					post_id		: post_id, 
    					user_id		: user_id, 
    					reaction	: id
    				},
		    dataType: 'JSON',
			success:function(msg) {
				if (msg == 'err') {
					throw new Error("You have already reacted to this.");
				}
			} 
		});
		
		$(this).attr('disabled', 'disabled');
		$(this).siblings().attr('disabled', 'disabled');
		$(this).children('.total').html(++num_likes);
		$(this).children('.total').removeClass('hide');
	});
});