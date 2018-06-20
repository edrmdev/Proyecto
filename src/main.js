$("#frmLogin").submit(function(e){
   e.preventDefault();

   if($("#txtUsuario").val() == "")
   {
   	  $("#txtUsuario").addClass('validError');
   }
   else if($("#txtPassword").val() == "")
   {
      $("#txtPassword").addClass('validError');
   } 
   else{
   	   
   	  $.ajax({
   	 	url:"/proyecto/controllers/usuario.controller.php",
   	 	method:"POST",
   	 	data:{
   	 		txtUsuario: $("#txtUsuario").val(), 
   	 		txtPassword: $("#txtPassword").val(),
   	 		opcion: "Usuario",
   	 		accion: "Autenticar"
   	 	},
   	 	dataType:"json"
   	 })
   	  .done(function(data){
   	  	console.log(data);
         if(data.indexOf("correcto") >= 1){
            location.href = "index.php";
         }
   	  })
   	  .fail(function(xhr){
   	  	console.log(xhr);
   	  })
   }
});