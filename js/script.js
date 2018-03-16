$(document).ready(function(){

	
	$("#matricula_login").mask('0.000.000-0', {reverse: true});


	

	
});


function logar(){

	var matricula = $("#matricula_login").val();

	$.post("sistema/login.php",
    {
        matricula_login: matricula
    },
    function(data, status){

    	if(data != false){    		
    		 window.location.href="sistema/listar_plantao.php";
    	}else{
    		$('#myModal').modal('show');
    	}

       
    });



}