<?php
	class BoardsController extends AppController{
		public $name = 'Boards';
		public $uses = array('Board'); //モデルを使用
		public $components = array('DebugKit.Toolbar');
		public $helpers = array('Html');
		public $layout = "board";

		public function index(){
			$this->set('data', $this->Board->find('all'));

		}
		public function create(){
			if(isset($this->request->data['board']['comment'])){ //投稿されたか否か
				//1回目に投稿されたデータをcreate.ctpのelse文の中に持っていく
				$this->set('wara', $this->request->data['board']['comment']);
			}
		}

		public function create2(){
			$this->Board->creat($this->request->data['send']['comment']);
			$this->redirect(array('action'=>'index')); 
		}

		public function edit($id = null){
			//idがnullじゃなかったら
			if($id != null){
				//id情報を取得
			 	$data = $this->Board->findById($id);
			 	//editビューのif文に値を受け渡す
		 		$this->set('word', $data); 
			}else{
				//情報をeditビューのelse文に受け渡す
				$this->set('words', $this->request->data['ed']);
			}
		}

		public function edit2(){
				$this->Board->ed($this->request->data['ed2']);
				$this->redirect(array('action'=>'index')); 
		}

		public function delete($id){
			$this->Board->delete($id);
			$this->redirect(array('action'=>'index')); 	
		}

	}
?>