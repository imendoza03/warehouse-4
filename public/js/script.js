$(function(){

	$("#registration-link").on("click", function(event){
		console.log("bla");
		event.preventDefault();
		$(".modal").modal("toggle");
	});

});
