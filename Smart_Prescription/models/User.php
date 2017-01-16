<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $position
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property integer $group
 * @property string $password2
 * @property string $roleId
 */
class User extends ActiveRecord implements IdentityInterface
{

    const ROLE_ADMIN = 1;
    const ROLE_DOCTOR = 2;
    const ROLE_FDA = 3;
    const ROLE_USER = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [[ 'name', 'surname', 'username', 'password', 'roleId', 'password2'], 'required'],
            [['roleId'], 'integer' ],
            ['roleId', 'default', 'value' => self::ROLE_USER],
            [['name', 'surname'], 'string', 'max' => 30],
            [['name', 'surname'], 'match', 'pattern' => '/^[A-Za-z_.]+$/u'],
            [['username', 'password', 'password2'], 'string', 'max' => 20],
            [['username'], 'unique', 'message'=>'Username has already been taken. Please change.'],
            [['password2'], 'compare', 'compareAttribute'=>'password', 'message'=>'Password and Confirm-Password do not Match, Please try again.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'password2' => Yii::t('app', 'Confirm-Password'),
            'roleId' => Yii::t('app', 'Position'),
        ];
    }

    ### Addition Method ###

    public static function findByUsername($username){
        return static::findOne(['username'=>$username]);
    }

    public function validatePassword($password){
        return $password === $this->password;
    }
    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id'=>$id]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->getPrimaryKey();
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function getItemsAlias($id){
        $items =  [

            'roleId' => [
                self::ROLE_ADMIN => 'Administrator',
                self::ROLE_DOCTOR => 'Doctor',
                self::ROLE_FDA => 'FDA',
            ]
        ];
        return array_key_exists($id, $items) ? $items[$id] : [];
    }


    public function getItemRole(){
        return self::getItemsAlias('roleId');
    }


    public function getRoleName(){
        $items =  $this->getItemRole();
        return array_key_exists($this->roleId, $items) ? $items[$this->roleId] : null;
    }

    public function getRole(){
        return $this->hasOne(Role::className(),['id'=>'roleId']);
    }

    public function getRoleUserName()
    {
        return $this->role ? $this->role->name : 'Role';
    }
}
