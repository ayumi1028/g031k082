<div id="hero-unit">
    新規ユーザー登録
    <?php echo $this->Session->flash('Auth'); 
    echo $this->Form->create('User', array('url' => 'useradd')); 
    echo $this->Form->input('User.name',array('label'=>'ユーザ名')); 
    echo $this->Form->input('User.password',array('label'=>'パスワード')); 
    echo $this->Form->input('User.pass_check',array('label'=>'パスワード確認','type'=>"password")); 
    echo $this->Form->input('User.email',array('label'=>'メールアドレス'));
    $option = array(0 => '男', 1 => '女');
    $option2 = array('legend' => false, 'value' => 1);
    echo $this->Form->label('User.sex','性別');
    echo $this->Form->radio('User.sex',$option,$option2); 
    echo $this->Form->end('新規ユーザを作成する'); ?>
    <a href="login" id="switch2" class="label btn-primary">ログインへ</a>
</div>