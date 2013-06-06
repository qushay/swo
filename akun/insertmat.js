$("#sub").click( function() {
 
	 $.post( $("#insertmatForm").attr("action"), $("#insertmatForm :input").serializeArray(),
			 
			 function(info) {
				//alert("ting tong");
			   $("#result").empty();
			   $("#result").html("Input Material Telah Berhasil");
				clear();
			 });
	
 
	$("#insertmatForm").submit( 
		function() {
			return false;	
		}
	);
	
});
	
 
function clear() {
 
	$("#insertmatForm :input").each( 	
		function() {
			$(this).val("");
		}
	);
 
}



