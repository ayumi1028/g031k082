<?php
	foreach($data as $key){
		echo $key['User']['name'].'　';
	 	echo $key['User']['email'].'　';
		echo $key['Board']['comment'].'　';
		echo $key['Board']['created'].'　';
		echo $this->html->tag('br /');
	};
	echo $this->Form->create('asc', array(
				'type' => 'post', 
				'url' => 'search'
				 ));
	echo $this->Form->hidden('asc.num', array('value' => $num));
	echo $this->Form->hidden('asc.word', array('value' => $word));
	echo $this->Form->submit('コメントが古い順', array('name' => 'syoujun'));
	echo $this->Form->end();

	echo $this->Form->create('desc', array(
				'type' => 'post', 
				'url' => 'search'
				 ));
	echo $this->Form->hidden('desc.num', array('value' => $num));
	echo $this->Form->hidden('desc.word', array('value' => $word));
	echo $this->Form->submit('コメントが新しい順', array('name' => 'koujun'));
	echo $this->Form->end();

	echo $this->Form->create('modoru', array(
				'type' => 'post', 
				'url' => 'index'
				 ));
	echo $this->Form->submit('戻る', array('name' => 'modoru'));
	echo $this->Form->end();
?>