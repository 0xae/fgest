<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface {
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

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'fg_user';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return self::findOne(['auth_key' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return self::findOne(['email' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() == $authKey;
    }

    public function generateAuthKey() {
        $this->auth_key = yii::$app->security->generaterandomstring();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    public static function findModel($id) {
        if (($model = AppUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function setPassword($rawPassword) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($rawPassword);
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
