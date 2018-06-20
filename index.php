<?php
session_start();
if(!$_SESSION["Activa"])
	include "views/login.view.html";
else
	include "views/home.view.html";
 ?>