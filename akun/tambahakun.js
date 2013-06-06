$("#tambahakun").click( function() {
 
	 $.post( $("#tambahakunForm").attr("action"),
	         $("#tambahakunForm :input").serializeArray(),
			 function(info) {
 
			   $("#result").empty();
			   $("#result").html("Registrasi Telah Berhasil");
				clear();
			 });
 
	$("#tambahakunForm").submit( function() {
	   return false;	
	});
});
 
function clear() {
 
	$("#tambahakunForm :input").each( function() {
	      $(this).val("");
	});
 
}


/*
$("#tambahakun").click(
						function(){
							$.post("tambahakun.php",$("#tambahakunForm").serialize(),
								function(data){
									if($("#id_sto").val()==""){
										//alert("Maaf ID STO Masih Kosong");
									}

								}
															
							);
							return false;
						}
)


*/