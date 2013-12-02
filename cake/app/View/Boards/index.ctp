<?php 
	//debug($user);
	//debug($data);
	echo $user['name'].'さんがログインしています';
	echo $this->html->tag('br /');
	echo $this->html->link('投稿する','/Boards/create/', array('name' =>'toukou'));
	echo $this->Form->create('asc', array(
				'type' => 'post', 
				'url' => 'index'
				 ));
	echo $this->Form->submit('昇順', array('name' => 'syoujun'));
	echo $this->Form->end();
	echo $this->Form->create('desc', array(
				'type' => 'post', 
				'url' => 'index'
				 ));
	echo $this->Form->submit('降順', array('name' => 'koujun'));
	echo $this->Form->end();
	//コメント検索 
	echo $this->Form->create('search', array(
				'type' => 'post', 
				'url' => 'search'
				 ));
	echo $this->Form->select('search.num', 
		array('1' => '1件', 
			'2' => '2件',
			'3' => '3件',
			'4' => '4件',
			'5' => '5件'));
	echo $this->Form->text('search.word');
	echo $this->Form->submit('検索', array('name' => 'sea'));
	echo $this->Form->end();


	echo $this->html->tag('br /');
 	foreach($data as $key){ 
	 	$id = $key['Board']['id'];
	 	echo $key['User']['name'].'　';
	 	echo $key['User']['email'].'　';
		echo $key['Board']['comment'].'　';
		echo $key['Board']['created'].'　';
		if($user['id'] == $key['User']['id']){
			echo $this->html->link('編集','/boards/edit/'.$id).'　';
			echo $this->html->link('×','/boards/delete/'.$id);
		}
		echo $this->html->tag('br /');
	}
	echo $this->html->link('ログアウト',array('controller' => 'Boards', 'action' =>'logout'));
 ?>