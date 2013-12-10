<?php
	//facebook認証
	App::import('Vendor','facebook',array('file' => 'facebook'.DS.'src'.DS.'facebook.php'));
	class BoardsController extends AppController{
		public $name = 'Boards';
		public $uses = array('Board','User', 'NewUser'); //モデルを使用
		public $components = array(
			'DebugKit.Toolbar',
			'TwitterKit.Twitter', //twitter
			'Auth' => array( //ログイン機能を利用する
                'authenticate' => array(
                    'Form' => array(
                    'userModel' => 'User',
                    'fields' => array('username' => 'name','password' => 'password')
                    )
                ),
				//ログイン後の移動先
                'loginRedirect' => array('controller' => 'Boards', 'action' => 'index'),
                //ログアウト後の移動先
                'logoutRedirect' => array('controller' => 'Boards', 'action' => 'login'),
                //ログインページのパス
                'loginAction' => array('controller' => 'Boards', 'action' => 'login'),
                //未ログイン時のメッセージ
                'authError' => 'あなたのお名前とパスワードを入力して下さい。',
            )
        );
		public $helpers = array('Html');
		public $layout = "board";

		public function beforeFilter(){ //login処理の設定
			//ログインしないでアクセスできるアクションを登録する
			$this->Auth->allow('twitter_login', 'oauth_callback', 'login','logout','useradd');
			//$this->Auth->autoRedirect = false;
			//ctpで$userを使えるようにする。
			$this->set('user', $this->Auth->user());
		}

		public function twitter_login(){//twitterのOAuth用ログインURLにリダイレクト
            $this->redirect($this->Twitter->getAuthenticateUrl(null, true));
        }

        public function facebook(){//facebookの認証処理部分
	        $this->autoRender = false;
	        $this->facebook = $this->createFacebook();
	        $user = $this->facebook->getUser();//ユーザ情報取得
	        if($user){//認証後
	            $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));//ユーザ情報を日本語で取得
	            $this->Session->write('mydata',$me);//fbデータをセッションに保存
	            

	            $this->redirect('index');
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

		public function login(){ //ログイン
			if($this->request->is('post')){ //post送信なら
				if($this->Auth->login()){ //ログイン成功なら
					return $this->redirect($this->Auth->redirect());//Auth指定のログインページへ移動
				}else{//ログイン失敗なら
					$this->Session->setFlash(_('ユーザ名かパスワードが違います'), 'default', array(),'auth');
				}
			}
		}

		public function logout(){ //ログアウト
			$this->Auth->logout();
			$this->Session->destroy(); //セッションを完全削除
			$this->Session->setFlash(_('ログアウトしました'));
			$this->redirect(array('action' => 'login'));
		}

		public function oauth_callback() {
            if(!$this->Twitter->isRequested()){//認証が実施されずにリダイレクト先から遷移してきた場合の処理
                $this->flash(__('invalid access.'), '/', 5);
                return;
            }
            $this->Twitter->setTwitterSource('twitter');//アクセストークンの取得を実施
            $token = $this->Twitter->getAccessToken();
            $data = $this->NewUser->signin($token); //ユーザ登録
            $this->Auth->login($data); //CakePHPのAuthログイン処理
                        // var_dump($token);
            $this->redirect($this->Auth->loginRedirect); //ログイン後画面へリダイレクト
        }

		public function useradd(){ //新規登録
			if($this->request->is('post')){ //post送信なら
				//入力したパスワードとパスチェックの値が一致した場合
				if($this->request->data['User']['pass_check'] == $this->request->data['User']['password']){
					 //パスワードとパスチェックの値をハッシュ値変換
					$data = $this->request->data;
					$data["User"]["password"] = AuthComponent::password($data['User']['password']);

					$this->User->create(); //ユーザの作成
					if($this->User->save($data)){
						$mes = '新規ユーザを追加しました'; 
					$this->Session->setFlash(_($mes));
					$this->redirect(array('action' => 'login'));
				}else{
					$mes = '登録できませんでした。やり直してください。';
					$this->Session->setFlash(_($mes));
				}
				}else{
					$this->Session->setFlash(_('パスワードの値が一致しません'));
				}
			}
		}
	
		public function index(){
			if(isset($this->request->data['syoujun'])){
				$this->set('data', $this->Board->find('all', array('order' => 'Board.id ASC')));
			}elseif(isset($this->request->data['koujun'])){
				$this->set('data', $this->Board->find('all', array('order' => 'Board.id DESC')));
			}else{
			$this->set('data', $this->Board->find('all')); //Boardsテーブルの情報を取得
			}
		}
		public function create(){
			if(isset($this->request->data['board']['comment'])){ //投稿されたか否か
				//1回目に投稿されたデータをcreate.ctpのelse文の中に持っていく
				$this->set('wara', $this->request->data['board']['comment']);
			}
		}

		public function create2(){
			$this->Board->creat($this->request->data['send']['comment']);
			$this->request->data['Board']['user_id'] = $this->Auth->user('id');
			$this->Board->save($this->request->data);
			$this->redirect(array('action'=>'index')); 
		}

		public function edit($id = null){
			//idがnullじゃなかったら
			if($id != null){
				//id情報を取得
			 	$data = $this->Board->findById($id);
			 	//editビューのif文に値を受け渡す
		 		$this->set('word', $data); 
			}else{
				//情報をeditビューのelse文に受け渡す
				$this->set('words', $this->request->data['ed']);}
		}

		public function edit2(){
				$this->Board->ed($this->request->data['ed2']);
				$this->redirect(array('action'=>'index')); 
		}

		public function delete($id){
			$this->Board->delete($id);
			$this->redirect(array('action'=>'index')); 	
		}
		public function search(){
		
			if(isset($this->request->data['syoujun'])){
				$num = $this->request->data['asc']['num'];
				$word = $this->request->data['asc']['word'];
				$this->set('num', $num);
				$this->set('word', $word);
				$this->set('data', $this->Board->find('all', array('limit' => $num,'conditions' => array('Board.comment like' => '%'.$word.'%'), 'order' => 'Board.id ASC')));
			}elseif(isset($this->request->data['koujun'])){
				$num = $this->request->data['desc']['num'];
				$word = $this->request->data['desc']['word'];
				$this->set('num', $num);
				$this->set('word', $word);
				$this->set('data', $this->Board->find('all', array('limit' => $num,'conditions' => array('Board.comment like' => '%'.$word.'%'), 'order' => 'Board.id DESC')));
			}else{
				$num = $this->request->data['search']['num'];
				$word = $this->request->data['search']['word'];
				$this->set('num', $num);
				$this->set('word', $word);
				$this->set('data', $this->Board->find('all', array('limit' => $num,'conditions' => array('Board.comment like' => '%'.$word.'%'))));
			}

	}
}
?>