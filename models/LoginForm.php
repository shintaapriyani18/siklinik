<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === false) {
            $user = User::findByUsername($this->username);
            if ($user && $user->validatePassword($this->password)) {
                $this->_user = $user;
            }
        }

        return $this->_user;
    }
}

