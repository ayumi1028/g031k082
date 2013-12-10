<?php
    class User extends Model{
        public $name = 'User';
 
        public $validate = array(
            'name' => array(
                'name1' => array(
                'rule' => array('between',0,10),
                'required' => true,
                'alloEmpty' => false,
                'message' => '10文字以内で入力して下さい'
                ),
                'name2' => array(
                    'rule' => 'isUnique',
                    'message' => 'このユーザは既に登録されています'
                ),
                'name3' => array(
                    'rule' => array('custom', '/^[a-zA-Z]+$/'),
                    'message' => '半角英字で入力してください'
                )
            ),
            'email' => array(
                'rule' => 'email',
                'required' => true,
                'alloEmpty' => false,
                'message' => 'メールアドレスの形式で必ず入力して下さい'
                ),
            'password' => array(
                'password1' => array( 
                'rule' => 'alphaNumeric',
                'required' => true,
                'alloEmpty' => false,
                'message' => '半角英数字で入力して下さい'
                ),
                'password2' => array(
                'rule' => array('notEmpty'),
                'message' => '必ず入力して下さい' 
                )
            ),
            'sex' => array(
                'rule' => array('notEmpty'),
                'required' => true,
                'alloEmpty' => false,
                'message' => '必ず入力して下さい'
            )
        );
    }
?>