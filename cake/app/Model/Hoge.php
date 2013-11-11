<?php
 class Hoge extends Model{
 	public $name = 'Hoge';
 	public $userTable = false;

 	public function handan($jikan){
 		if($jikan == '朝'){
 			$mes = 'おはよう';
 		}elseif($jikan == '夜'){
 			$mes = 'こんばんは';
 		}else{
 			$mes = 'こんにちは';
 		}
 		return $mes;
 	}
 }
 ?>