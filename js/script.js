$(document).ready(function(){
	
	$('[data-toggle="tooltip"]').tooltip();

	verTime();

	$('#myModal').modal('hide');
	$("#modalCadastroOK").modal('hide');
	$("#modalCadastroError").modal('hide');


	$("#matricula_login").mask('0.000.000-0');

	

	if (typeof(Storage) !== 'undefined') {
	    // Store
	    $("#nome_usuario").prepend(localStorage.getItem('nome'));

	    					    
	} else {
	    alert('Utilize um destes navegadores: Google Chrome ou Mozilla Firefox');
	}
	




	

	
});//ready()



function cadastrarUnidade(){

		var nome = $("#nome_unidade").val();
		var trabalho = $("#tipo_trabalho").val();
		var endereco = $("#endereco").val();
		var gerente = $("#gerente").val();
		var matricula = $("#matricula_gerente").val();
		var tel_gerente = $("#tel_gerente").val();
		var tel_gerente2 = $("#tel_gerente2").val();
		var tel_centro = $("#tel_centro").val();
		var acao = "cadastrar";
		
		
		$.ajax({url: "../sistema/unidades.php", 
				data: {	
						nome:nome, 
						tipo_trabalho:trabalho, 
						endereco:endereco, 
						gerente:gerente,
						matricula_gerente:matricula,
						tel_gerente:tel_gerente,
						tel_gerente2:tel_gerente2,
						tel_centro:tel_centro,
						acao:acao
					},

				datatype: 'JSON',
				type: 'POST',

			success: function(result,status){
				var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';
				$("#modalUnidade").modal('hide');
				//alert("retorno = "+retorno + " success = " + status);					
				var r = retorno.split(':');			    		
				var resultado = r[1];
				var tamanho = resultado.length;

				resultado = resultado.replace(resultado.substring(0,1),"");
				
				tamanho = resultado.length;
				resultado = resultado.replace(resultado.substring(tamanho-6,tamanho),"");
				//alert("resultado = "+resultado);
				if(resultado == 'true' && status == 'success'){   	 		
	    		
	    			$("#modalCadastroOK").modal('show').on('hidden.bs.modal', function (e) {
					  	window.location.href='../sistema/listar_plantao.php';
					})

	    		}else{
	    			$('#modalCadastroError').modal('show');
	    		}

		},

        }); //ajax


	} //cadastrar unidade


	function cadastrarPlantao(){

		var id_unidade = $("#id_unidade").val();
		var data_inicio = $("#data_inicio").val();
		var hora_inicio = $("#hora_inicio").val();
		var data_final = $("#data_final").val();
		var hora_final = $("#hora_final").val();
		var vagas = $("#vagas").val();
		var motorista = $("#motorista").val();
		var acao = "cadastrar";
		
		
		$.ajax({url: "../sistema/plantao.php", 
				data: {	
						id_unidade:id_unidade, 
						data_inicio:data_inicio, 
						hora_inicio:hora_inicio, 
						data_final:data_final,
						hora_final:hora_final,
						vagas:vagas,
						motorista:motorista,
						acao:acao
					},

				datatype: 'JSON',
				type: 'POST',

			success: function(result,status){
				var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';
				$("#modalPlantao").modal('hide');
				//alert("retorno = "+retorno + " success = " + status);					
				var r = retorno.split(':');			    		
				var resultado = r[1];
				var tamanho = resultado.length;

				resultado = resultado.replace(resultado.substring(0,1),"");
				
				tamanho = resultado.length;
				resultado = resultado.replace(resultado.substring(tamanho-6,tamanho),"");
				alert("resultado = "+resultado);
				if(resultado == 'true' && status == 'success'){   	 		
	    		
	    			$("#modalCadastroOK").modal('show').on('hidden.bs.modal', function (e) {
					  	window.location.href='../sistema/listar_plantao.php';
					})

	    		}else{
	    			$('#modalCadastroError').modal('show');
	    		}

		},

        }); //ajax


	} //cadastrar unidade





function logar(){

	var matricula = $("#matricula_login").val();
	
	if(matricula.length == 11){
	//var host = document.location.host;

		$.ajax({url: "sistema/login.php", 
				data: {matricula_login:matricula},
				datatype: 'JSON',
				type: 'POST',



			success: function(result,status){
				//var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';

				var retorno = "["+result+"]";				
				
				var retorno_array = retorno.split(',');
				//alert("retorno = "+retorno + " success = " + status);
						if (typeof(Storage) !== 'undefined') {
							
							if(result != false && status == 'success'){   	 		
				    					    		
				    			setStorage(retorno_array);			    						    						    		
				    			

				    		}else{
				    			$('#myModal').modal('show');
				    		}

						}else {
		    				alert('Utilize um destes navegadores: Google Chrome ou Mozilla Firefox.');
						}
        			},

        });

	}else{
		return false;
	}

	

}

function setStorage(retorno_array){
	var r = retorno_array[0].split(':');			    		
	var matricula = r[1];
	var tamanho = matricula.length;

	matricula = matricula.replace(matricula.substring(0,1),"");
	matricula = matricula.replace(matricula.substring(tamanho-2,tamanho-1),"");
	localStorage.setItem("matricula", matricula); 

	r = retorno_array[1].split(':');			    		
	var nome = r[1];
	tamanho = nome.length;
	nome = nome.replace(nome.substring(0,1),"");
	nome = nome.replace(nome.substring(tamanho-2,tamanho-1),"");
	localStorage.setItem("nome", nome);

	r = retorno_array[2].split(':');			    		
	var lotacao = r[1];
	tamanho = lotacao.length;
	lotacao = lotacao.replace(lotacao.substring(0,1),"");
	lotacao = lotacao.replace(lotacao.substring(tamanho-2,tamanho-1),"");
	localStorage.setItem("lotacao", lotacao);

	r = retorno_array[3].split(':');			    		
	var funcao = r[1];
	tamanho = funcao.length;
	funcao = funcao.replace(funcao.substring(0,1),"");
	funcao = funcao.replace(funcao.substring(tamanho-2,tamanho-1),"");
	localStorage.setItem("funcao", funcao);

	r = retorno_array[4].split(':');			    		
	var telefone = r[1];
	tamanho = telefone.length;
	telefone = telefone.replace(telefone.substring(0,1),"");
	telefone = telefone.replace(telefone.substring(tamanho-2,tamanho-1),"");
	localStorage.setItem("telefone", telefone);
	var time = new Date();
	time = time.getTime();
	localStorage.setItem("time", time);
	window.location.href = "sistema/plantao.php?acao=listar&matricula="+matricula;

}


function logout(){	
	localStorage.clear();   	
	window.location.href="logout.php";		
}

function verTime(){
	if(localStorage.getItem("time") != null){

		var timeIn = localStorage.getItem("time");
		var timeNow = new Date();
		timeNow = timeNow.getTime();

		if(timeNow - timeIn > 600000){
			logout();
		}else{
			localStorage.setItem("time", timeNow);
		}

	}
}


	function idPlantao(id_plantao){
		
		$("#inscrever_plantao").attr("id-plantao", id_plantao);

		$.ajax({url: "plantao.php", 
				data: {
						acao:'verificar',
						id_plantao:id_plantao
					},
				datatype: 'JSON',
				type: 'POST',

				success: function(result,status){
				var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';

				var r = retorno.split(':');			    		
				var resultado = r[1];
				var tamanho = resultado.length;

				resultado = resultado.replace(resultado.substring(0,1),"");
				
				tamanho = resultado.length;
				resultado = resultado.replace(resultado.substring(tamanho-6,tamanho),"");
				
				if(resultado == 'true' && status == 'success'){   	 		
	    		
	    			$("#radio-motorista").show();

	    		}else{
	    			$("#radio-motorista").hide();
	    		}



        			},

        });




	}




	function inscreverPlantao(){	

			var id_plantao = $("#inscrever_plantao").attr("id-plantao");
			var acao = "inscrever";			
			var motorista = $( "input[type=radio][name=motor]:checked" ).val();
			//alert(motorista);
			
			if(motorista == null || motorista == ""){
				motorista = 0;
			}
			
			

			$.ajax({url: "plantao.php", 
				data: {
						acao:acao,
						id_plantao:id_plantao,
						motorista:motorista
					},
				datatype: 'JSON',
				type: 'POST',

				success: function(result,status){
				//var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';

				//var retorno = "["+result+"]";				
				
				//var retorno_array = retorno.split(',');
				//alert(retorno_array);
				//alert("retorno = "+result + " success = " + status)
							
							if(result != "false" && status == 'success'){ 
							
							$("#modalInscrever").modal('hide'); 	 		
				    		$('#modalCadastroOK').modal('show');
				    		window.location.reload();	
				    			

				    		}else{

				    			$("#modalInscrever").modal('hide'); 
				    			$('#modalCadastroError').modal('show');
				    		}

        			},

        });

		
	}





function cancelarInscreverPlantao(){	

			var id_plantao = $("#inscrever_plantao").attr("id-plantao");
			var acao = "cancelar";
			var motorista = $("#motorista").val();
			if(motorista == null || motorista == ""){
				motorista = 0;
			}

			$.ajax({url: "plantao.php", 
				data: {
						acao:acao,
						id_plantao:id_plantao
					},
				datatype: 'JSON',
				type: 'POST',

				success: function(result,status){
				//var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';

				var retorno = "["+result+"]";				
				
				var retorno_array = retorno.split(',');
				
				//alert("retorno = "+retorno + " success = " + status)
							
							if(result != false && status == 'success'){ 
							
							$("#modalCancelInscrever").modal('hide'); 
							//$('#modalCadastroOK').modal('show');
				    		window.location.reload();	
				    			

				    		}else{

				    			$("#modalCancelInscrever").modal('hide'); 
				    			$('#modalCadastroError').modal('show');
				    		}

        			},

        });

		
	}




	function verInscritos(id_plantao){

		$.ajax({url: "plantao.php", 
				data: {
						acao:"listar_inscritos",
						id_plantao:id_plantao
					},
				datatype: 'JSON',
				type: 'POST',

				success: function(result,status){
				//var retorno = '['+ result + ']'; 
				//var j = '{"dados":' + result + '}';

				//var retorno = "["+result+"]";				
				
				var retorno_array = result.split('},{');

				//alert(retorno_array.length);
				
				//alert("retorno = "+retorno + " success = " + status)
							
							if(retorno_array != "false" && status == 'success'){ 

								$('#modalInscritos').modal('show').on('shown.bs.modal', function (e) {
								 	//listarInscritos(retorno_array);
								 	$("table > tbody").empty();
								 	//var tamanho = (retorno_array.length)/3;		
									var tamanho = retorno_array.length/3;
								 	var linha = 0;		
								 	var i = 0;
								 	//alert(retorno_array);
								 	if(tamanho > 0){

								 		while(linha < tamanho){
								 			
								 			while(i < tamanho*3){
								 				//retorno_array[i] = retorno_array.split(',');
								 				alert(retorno_array);
								 				//retorno_array[i+1] = retorno_array.split(':');
								 				//retorno_array[i+2] = retorno_array.split(':');
								 				//alert(retorno_array);
								 				$("<tr><th scope=\"row\" class=\"h5 text-center\">"+retorno_array[i]+"</th><td class=\"h5 text-center\">"+retorno_array[i+1]+"</td><td class=\"h5 text-center\">"+retorno_array[i+2]+"</td></tr>").appendTo("tbody");
								 				i  += 3;
								 			}
								 			
								 			linha++;
								 			
								 		}
								 	}

								 		
								 									 		
								 	
								 	
								});

								
				    			
								

				    		}else{
				    			


				    			$('#modalCadastroError').modal('show');
				    		
				    		}

        			},

        });

	}

function imprimirInscritos(){



}