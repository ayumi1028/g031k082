 <?php
  if(isset($this->request->data['button'])){
	echo $this->html->tag('h2','この情報で登録して大丈夫ですか？');
	echo $this->Form->create('join', array(
		'type' => 'post',
		'url' => 'result'
		));

	echo "名字:".$this->request->data['join']['myouji'];
	echo $this->html->tag('br /');
	echo "名前:".$this->request->data['join']['name'];
	echo $this->html->tag('br /');
	if($this->request->data['join']['sex'] == '0'){ 
		echo "性別:男";
	}else{
		echo "性別:女";
	}
	echo $this->html->tag('br /');
	if($this->request->data['join']['gakunen'] == '0'){
		echo "学年:学部1年";
	}elseif($this->request->data['join']['gakunen'] == '1'){
		echo "学年:学部2年";
	}elseif($this->request->data['join']['gakunen'] == '2'){
		echo "学年:学部3年";
	}else{
		echo "学年:学部4年";
	}
	echo $this->html->tag('br /');
	echo "好きなもの:";
	foreach($this->request->data['join']['like'] as $l){
		 if($l != '0'){
			echo $l.'　';
		}
	}	
	echo $this->html->tag('br /');
	echo "コメント:".$this->request->data['join']['comment'];
	echo $this->html->tag('br /');
	echo "パスワード:".$this->request->data['join']['password'];
	echo $this->html->tag('br /');
	echo "投稿時間:".$this->request->data['join']['jikan'];

	echo $this->Form->submit('登録', array('name' => 'submit'));
	echo $this->Form->end();
}else{
	echo $this->html->tag('h2','登録ありがとうございました。');
	echo $this->html->link('最初に戻る', '/Users/form');
}
 ?>
