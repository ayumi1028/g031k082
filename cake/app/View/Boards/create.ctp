<?php
 	if(empty($wara)){
		echo $this->Form->create('board', array(
			'url' => 'create'
			 ));
		echo "投稿内容";
		echo $this->Form->text('board.comment', array());
		echo $this->Form->submit('投稿', array('name' => 'submit'));
		echo $this->Form->end();
	}else{
		echo $this->Form->create('send', array(
		'type' => 'post',
		'url' => 'create2'
		));
		//入力された情報をcreate2アクションに受け渡す
		echo $this->Form->hidden('send.comment', array('value' => $wara));
		echo $this->html->tag('h2',$wara);
		echo $this->html->tag('br /');
		echo "この内容で投稿してよろしいですか？";
		echo $this->Form->submit('確定する', array('name' => 'kakutei'));
		echo $this->Form->end();
	}
?>