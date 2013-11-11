<h2>今の時間帯は？？</h2>
<?php
	//フォームの宣言
	echo $this->Form->create('Aisatsu', array(
		'type' => 'post', 
		'url' => 'show' //リンク先の指定
		));

	echo $this->Form->input('Aisatsu.jikan', array(
		'label'=>"時間帯"
		));

	echo $this->Form->submit();
	echo $this->Form->end(); //フォームの終わりを宣言
?>