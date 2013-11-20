<?php
 	if(empty($set)){
		echo $this->Form->create('board', array(
			'url' => 'create'
			 ));
		echo "投稿内容";
		echo $this->Form->text('board.comment', array());
		echo $this->Form->submit('投稿', array('name' => 'submit'));
		echo $this->Form->end();
	}else{
		echo $this->Form->create('board', array(
		'type' => 'post',
		'url' => 'index'
		));
		echo $this->html->tag('h2',$set['board']['comment']);
		echo $this->html->tag('br /');
		echo "この内容で投稿してよろしいですか？";
		echo $this->Form->submit('確定する', array('name' => 'kakutei'));
		echo $this->Form->end();
	}
?>