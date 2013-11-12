<?php
 class UsersController extends AppController{
 	public $name = "Users"; //コントローラ名
 	public $components = array('DebugKit.Toolbar');
 	public $helpers = array('Html');
 	public function form(){

 	}
 	public function result(){
		if(!$this->request->is('POST')) //URLで直接アクセスした人など
			$this->flash('formアクションから来てください',array('controller' => 'Touroku','action' => 'form'));
 	}
 	
 }