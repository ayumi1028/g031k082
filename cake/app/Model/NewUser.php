<?php
    class NewUser extends Model{
        public $name = 'User';
       
        var $validate = array(
            'username' => array(
                'rule' => 'isUnique', //重複登録回避
                'message' => '重複です'
            )
        );
 
        //新規登録＆ログイン
        public function signin($token){
            //アクセストークンを正しく取得できなかった場合の処理
            if(is_string($token))return; //エラー
 
            $data['id'] = $token['user_id'];
            $data['name'] = $token['screen_name'];
            $data['password'] = Security::hash($token['oauth_token']);
 
            //バリデーションチェックでエラーがなければ、新規登録
            if($this->validates())
                $this->save($data);

            return $data; //ログイン情報
        }

        public function signinfb($token){
                        //アクセストークンを正しく取得できなかった場合の処理
                        if(is_string($token))return; //エラー
                $data['id'] = $token['id'];
                $data['name'] = $token['name'];
                $data['email'] = $token['email'];

                    //バリデーションチェックでエラーがなければ、新規登録
                    if($this->validates())$this->save($data);
                    //$data = $this->find('first', array('conditions' => array('name' => $data['name'], 'email' => $data['email'])));
                        return $data; //ログイン情報
        }
    }
?>