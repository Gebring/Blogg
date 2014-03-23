function getComments(postid) {

	$.post("Inc/comments_fetch.php", {id: postid})
	.done(function(data){
		//console.log(data);
		$("#comments-" + postid).html(data);
		$("#comments-" + postid).slideToggle();
	});

}