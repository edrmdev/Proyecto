<?php 
//Incluimos nuestra clase para la conexion...
require_once("../models/conexion.model.php");

class Usuario
{
	private function getIdUsuario($strNombre, $strPassword, $cnnMYSQL){
	//Estructuramos nuestro query...		
		$IDUsuario = 0;//La inicializamos en 0...
		$query = $cnnMYSQL->prepare("SELECT * FROM usuario WHERE UsuarioV = :NombreV AND PasswordV = :PasswordV LIMIT 1;");
		$query->bindParam(":NombreV", $strNombre);
		$query->bindParam(":PasswordV", $strPassword);
		if($query->execute()){
		   $res = $query->fetch();
		   $IDUsuario = $res["UsuarioV"];
		}
		
		return(($IDUsuario != null) ? $IDUsuario : "NoExiste");
	}

	//Esta funcion sirve para nosotros validar nuestro usuario...
	public function validarUsuario($strNombre, $strPassword){
		$cnnMYSQL = new ConexionMYSQL();
		//$msg = Array();
		$IDUsuario = $this->getIdUsuario($strNombre, $strPassword, $cnnMYSQL);
		if($IDUsuario != "NoExiste"){
			$query = $cnnMYSQL->prepare("SELECT * FROM rol WHERE IDRolI = :IDRolI");
			$query->bindParam("IDRolI", $IDUsuario);
			$query->execute();
			$res = $query->fetch();
			//Asignacion de las variables de sesion...
			session_start();
			$_SESSION["Nombre"] = $res["NombreV"];
			$_SESSION["Activa"] = true;
			$msg = "correcto";
			//header("location: index.php");
		}else{
			$msg = "No existe el usuario";
			$_SESSION["Activa"] = false;
			//array_push($msg[0], "Error" => $ret);
		}

		header("Content-Type: application/json");
		return json_encode($msg);
	}
}
 ?>