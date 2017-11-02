$(function(){

$('.modalButton').click(function(){

	$('#modal').modal('show')
			.find('#modalcontent')
			.load($(this).attr('value'));
});

$('#status').modal('show');
$('#failLogin').modal('show');

});

$(document).ready( function() {

      var myVal = $(window).width();
        
        //alert(myVal);
        
    if (myVal<=752) {

  $("#img").height( 200 ).css({
    height:200,
    width :200
  });

  $("#img1").height( 200 ).css({
    height:200,
    width :200
  });
  
  $("#img2").height( 200 ).css({
    height:200,
    width :200
  });
  
  
}

});