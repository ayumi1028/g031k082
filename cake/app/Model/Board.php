<?php
	class Board extends Model{
		public $name = 'Boards';
		public $belongsTo = array(
			'User' => array(
				'classname' => 'User',
				'foreignKey' => 'user_id'));
		public $userTable = true;
		
		public function creat($id){
			$inputdata['comment'] = $id;
			$this->save($inputdata);
		}
		 public function ed($id){
		 	$inputdata['Board']['id'] = $id['id'];
		 	$inputdata['Board']['comment'] = $id['comment'];
		 	//saveは、更新したい情報のidがあった場合は書き換える、idがなかった場合は新規追加する
		 	$this->save($inputdata); 
		}
}


?>