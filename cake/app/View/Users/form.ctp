<h2>ユーザ登録フォーム</h2>
<?php
	echo $this->Form->create('join', array(
		'type' => 'post',
		'url' => 'result'
		));
	//名字
	echo "名字";
	echo $this->Form->text('join.myouji', array(
		
		));

	//名前
	echo "名前";
	echo $this->Form->text('join.name', array(
	
		));
	//性別
	echo "性別";
	echo $this->html->tag('br /');
	echo $this->Form->radio('join.sex', array(
		'0' => '男','1' => '女'),
		array('legend' => false, 'value' => '1')
	);

	//学年
	echo "学年";
	echo $this->html->tag('br /');
	echo $this->Form->select('join.gakunen', 
		array('0' => '学部1年', 
			'1' => '学部2年',
			'2' => '学部3年',
			'3' => '学部4年'),
		array('value' => '1'));
	echo $this->html->tag('br /');

	//好きなもの
	echo "好きなもの";
	echo $this->html->tag('br /');
	echo $this->Form->checkbox('join.like.a', array('value' => '運動','checked' => true));
	echo $this->Form->label('join.like.a', '運動');
	echo $this->Form->checkbox('join.like.b', array('value' => '漫画','checked' => false));
	echo $this->Form->label('join.like.b', '漫画');
	echo $this->Form->checkbox('join.like.c', array('value' => '女の子','checked' => true));
	echo $this->Form->label('join.like.c', '女の子');
	echo $this->html->tag('br /');

	//コメント
	echo "コメント";
	echo $this->Form->text('join.comment', array());

	echo "パスワード";
	echo $this->Form->password('join.password', array());

	//投稿時間
	$now = date("G:i:s");
	echo $this->Form->hidden('join.jikan', array(
		'value' => $now));

	echo $this->Form->submit('送信', array('name' => 'button'));
	echo $this->Form->end();
	?>