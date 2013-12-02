<?php
	foreach($data as $key){
		echo $key['Board']['comment'];
		echo $this->html->tag('br /');
	};

	echo $this->Form->create('modoru', array(
				'type' => 'post', 
				'url' => 'index'
				 ));
	echo $this->Form->submit('戻る', array('name' => 'modoru'));
	echo $this->Form->end();
?>