<?php
	class BoardsController extends AppController{
		public $name = 'Boards';
		public $uses = array('Board'); //モデルを使用
		public $components = array('DebugKit.Toolbar');
		public $helpers = array('Html');

		public function index(){
			$this->set('data', $this->Board->find('all'));


		}
		public function create(){
			$word = $this->request->data;
			$this->set('set', $word);
			if($this->request->is('post')){ //postが送信されたとき
				$words = $this->Board->creat($this->request->data);
				$this->set('data', $words);}	
		}
		public function edit(){

		}
		public function delete($id){
			$this->Board->delete($id);
			$this->redirect(array('action'=>'index')); 	
		}

}
?>