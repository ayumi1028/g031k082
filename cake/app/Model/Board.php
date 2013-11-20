<?php
	class Board extends Model{
		public $name = 'Boards';
		public $userTable = true;

		public function creat($id){
			$inputdata['comment'] = $id['board']['comment'];
			$this->save($inputdata);
		}
}


?>