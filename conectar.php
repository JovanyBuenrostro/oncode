<?php
	function conectarBD(){
		error_reporting(0);
		$conex=mysql_connect("localhost","root","");
		if(!$conex){
			die("Error: ".mysql_error());
		}
			
		$database=mysql_select_db("oncode",$conex);
		if(!$database){
			die("Error: ".mysql_error());
		}
		}
?>