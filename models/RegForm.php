<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Problem[] $problems
 */
class RegForm extends User
{
    public $passwordConfrim;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password', 'passwordConfrim', 'agree'], 'required', 'message'=> 'Поле обязательно для заполнения'],
            ['fio', 'match', 'pattern' =>'/^[А-Яа-я\s\-]{5,}$/u', 'message'=>'Только кириллица, пробелы и дефис'],
            ['login', 'match', 'pattern' =>'/^[a-zA-Z\s\-]{5,}$/u', 'message' => 'Только латинские буквы'],
            ['login', 'unique','message' => 'Такой логин уже используется'],
            ['email', 'email', 'message'=> 'Некоректный email'],
            ['passwordConfrim', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласится'],
            [['admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'passwordConfrim' => 'Подтверждение пароля',
            'agree' => 'Даю согласие на обработку данных',
        ];
    }

   
}
