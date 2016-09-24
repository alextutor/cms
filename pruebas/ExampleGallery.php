<?php
	include $_SERVER['DOCUMENT_ROOT']."/prueba/ImgGallery.cls.php";
	
	// Host and  Database Connection.

	$Host="localhost";
	$User="pedro_creaciones";
	$Password="huizaquispe01";
	$DbName="pedro_productos";
	mysql_connect($Host,$User,$Password)or die(mysql_error());
	mysql_select_db($DbName)or die(mysql_error());

	$DbTableName="contenido";	// Table Name Used
	$DisplayPageNo=1;	// Page number you want to display.
	$NoOfRow=3;			// Number of rows to display
	$NoOfCol=4;			// Number of column to display
	$ImgLoc="imagen";		// Image folder location from current location.

	// Object instance.
	$Gallery=new ImageGallery($DbTableName,$DisplayPageNo,$NoOfRow,$NoOfCol,$ImgLoc);	

	// Draw Table of Banner including Paging.
	$Gallery->DisplayImageGallery();
	
	// Destroy Object.
	unset($Gallery);
?>