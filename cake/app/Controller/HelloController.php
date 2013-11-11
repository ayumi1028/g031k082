<?php
 class HelloController extends AppController{
 	public $name = "Hello";
 	//public $uses = null;
 	public $compontents = array('DebugKit.Toolbar');

 	function index(){
 		echo "Hello";
 	}
 }