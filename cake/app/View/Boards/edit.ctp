<?php
	echo $this->Form->create('board', array(
			'url' => 'create'
			 ));
	echo "投稿内容";
	echo $this->Form->text('board.comment', array());
	echo $this->Form->submit('投稿', array('name' => 'submit'));
	echo $this->Form->end();
?>