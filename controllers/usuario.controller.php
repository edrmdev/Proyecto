<?php 
//Incluimos nuestras clases...
require_once("../models/usuario.model.php");
    //Primero comprobaremos el metodo de solicitud, post o get...
try{
    if($_POST){

       $op = $_POST["opcion"];
       //Panel de conntrol...
       switch ($op) {
       	case 'Usuario':
       		if($_POST["accion"] == "Autenticar"){
       			$usr = new Usuario();
       			$strNombreUsuario = $_POST["txtUsuario"];
       			$strPassword = $_POST["txtPassword"];
       			$res = $usr->validarUsuario($strNombreUsuario, $strPassword); 
       		}
       		echo json_encode($res);
       		break;
       }
    }

    if($_GET){
    	//Para consulta de datos no sensibles:'v
    }
   }
 catch(Exception $e){
 	echo json_encode($e->getMessage());
 }
 ?>