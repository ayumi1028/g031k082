<div class="hero-unit">
    <?php echo $this->Session->flash('Auth'); ?>
    <?php echo $this->Form->create('User', array('url' => 'login')); ?>
    <?php echo $this->Form->input('User.name', array('label' => 'ユーザ名')); ?>
    <?php echo $this->Form->input('User.password', array('label' => 'パスワード')); ?>
    <?php echo $this->Form->end('ログイン'); ?>
    <a href="useradd" id="switch" class="label btn-primary">新規登録</a>
</div>
<?php 
if(empty($user)): /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ 
     echo $this->Form->create('TwLogins',
        array('action'=>'twitter_login'));
     echo $this->Form->end(__('Twitter で Login'));
else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ 
    echo 'ログイン済みです。';
    echo $user['username'];
     ?> 
    <strong><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?> </strong>
<?php endif ; ?>

<?php
if(empty($user)): /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ 
     echo $this->Form->create('Fbconnects',
        array('action'=>'facebook'));
     echo $this->Form->end(__('Facebook で Login'));
else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ 
    echo 'ログイン済みです。';
    echo $user['username'];
     ?> 
    <strong><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?> </strong>
<?php endif ; ?>