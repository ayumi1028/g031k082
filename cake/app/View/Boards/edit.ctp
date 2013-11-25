<?php
if(!isset($this->request->data['submit'])){
		echo $this->Form->create('ed', array(
				'type' => 'post', 
				'url' => 'edit'
				 ));
		echo "編集内容";
		echo $this->Form->text('ed.comment', array('value' => $word['Board']['comment']));
		//idの情報をeditアクションに受け渡す
		echo $this->Form->hidden('ed.id', array('value' => $word['Board']['id']));
		echo $this->Form->submit('投稿', array('name' => 'submit'));
		echo $this->Form->end();
 }else{
 		echo $this->Form->create('ed2', array(
 		'type' => 'post',
		'url' => 'edit2'
		));
		//入力された情報をedit2アクションに渡す
		echo $this->Form->hidden('ed2.comment', array('value' => $words['comment']));
		echo $this->Form->hidden('ed2.id', array('value' => $words['id']));
		echo $this->html->tag('h2',$words['comment']);
		echo $this->html->tag('br /');
		echo "この内容で投稿してよろしいですか？";
		echo $this->Form->submit('確定する', array('name' => 'kakutei'));
		echo $this->Form->end();
	}
?>