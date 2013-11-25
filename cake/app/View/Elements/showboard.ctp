<?php 
	echo $mes;
	echo $this->html->tag('br /');
 	foreach($data as $key){ 
 	$id = $key['Board']['id'];
	echo $key['Board']['comment'].'　';
	echo $key['Board']['timestamp'].'　';
	echo $this->html->link('編集','/boards/edit/'.$id).'　';
	echo $this->html->link('×','/boards/delete/'.$id);
	echo $this->html->tag('br /');
	}
 ?>