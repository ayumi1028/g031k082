<?php
class HogeController extends AppController{
	public $name = "Hoge"; //コントローラの名前を指定
	//便利機能
	public $compontents = array('Debugkit.Toolbar');
	//クラスについて
	public function index(){ //アクション
	
	}

	public function show(){
		if($this->request->is('POST')){
			$jikan = $this->request->data['Aisatsu']['jikan'];
			$mes = $this->Hoge->handan($jikan);
			$this->set('say', $mes); //ビューに値を受け渡す
		}else{ //URLで直接アクセスした人など
			$this->flash(
				'inputアクションから来てください',
				array(
					'controller' => 'hoge',
					'action' => 'input'
					)
				);

		}

	}

	public function input(){

	}
} 
?>