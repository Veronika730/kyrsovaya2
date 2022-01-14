<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "basket".
 *
 * @property int $id
 * @property int $idUser
 * @property string|null $photoBefore
 * @property int $idProblem
 *
 * @property Problem $idProblem0
 * @property User $idUser0
 */
class Basket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idProblem'], 'required'],
            [['idUser', 'idProblem'], 'integer'],
            [['photoBefore'], 'string', 'max' => 255],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idProblem'], 'exist', 'skipOnError' => true, 'targetClass' => Problem::className(), 'targetAttribute' => ['idProblem' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idUser' => 'Id User',
            'photoBefore' => 'Photo Before',
            'idProblem' => 'Id Problem',
        ];
    }

    /**
     * Gets query for [[IdProblem0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProblem0()
    {
        return $this->hasOne(Problem::className(), ['id' => 'idProblem']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
}
