<?php

namespace app\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "fg_user".
 *
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $password
 * @property string $tipo
 * @property integer $is_active
 */
class AppUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'fg_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nome', 'email', 'auth_key', 'password_hash'], 'required'],
            [['email', 'auth_key', 'password_hash'], 'string'],
            [['password_hash', 'auth_key', 'email'], 'safe'],
            [['is_active'], 'integer'],
            [['nome', 'tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'password_hash' => 'Password',
            'tipo' => 'Tipo',
            'is_active' => 'Is Active',
        ];
    }

    public static function findModel($id) {
        if (($model = AppUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findByEmail($email) {
        $data = AppUser::find(['email' => $email])->one();
        if ($data !== null) {
            return $data;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
