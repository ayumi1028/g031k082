<?php
//facebook認証
App::import('Vendor','facebook',array('file' => 'facebook'.DS.'src'.DS.'facebook.php'));

class FbconnectsController extends AppController {
    public $name = 'Fbconnects';

    function index(){}

    function showdata(){//トップページ
        $facebook = $this->createFacebook(); //セッション切れ対策 (?)
        $myFbData = $this->Session->read('mydata');//facebookのデータ
       
        //pr($myFbData);//表示
        //$this->fbpost("hello world");//facebookに投稿
    }

    public function facebook(){//facebookの認証処理部分
        $this->autoRender = false;
        $this->facebook = $this->createFacebook();
        $user = $this->facebook->getUser();//ユーザ情報取得
        if($user){//認証後
            $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));//ユーザ情報を日本語で取得
            $this->Session->write('mydata',$me);//fbデータをセッションに保存
            

            $this->redirect('Boards/index');
        }else{//認証前
            $url = $this->facebook->getLoginUrl(array(
            'scope' => 'email,publish_stream,user_birthday'
            ,'canvas' => 1,'fbconnect' => 0));
            $this->redirect($url);
        }
    }

    private function createFacebook() {//appID, secretを記述
        return new Facebook(array(
            'appId' => '183755391825253',
            'secret' => 'b0e69e6c543a096699a36f2e5cf17510'
        ));
    }

    public function fbpost($postData) {//facebookのwallにpostする処理
        $facebook = $this->createFacebook();
        $attachment = array(
            'access_token' => $facebook->getAccessToken(), //access_token入手
            'message' => $postData,
            'name' => "test",
            'link' => "http://twitter.com/n0bisuke",
            'description' => "test",
        );
        $facebook->api('/me/feed', 'POST', $attachment);
    }
}