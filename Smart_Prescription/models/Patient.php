<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;


/**
 * This is the model class for table "tbl_patient".
 *
 * @property string $personal_id
 * @property string $name
 * @property string $surname
 * @property string $prescription
 * @property string $create_by
 * @property string $username
 * @property string $password
 * @property string $create_at
 * @property string $update_by
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_patient';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute'=>'create_by',
                'updatedByAttribute' => 'create_by',

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personal_id', 'name', 'surname', 'prescription', 'username', ], 'required'],
            [['prescription'], 'string'],
            [['create_at', 'update_at', 'create_by','update_by'], 'safe'],
            [['name', 'surname', ], 'string', 'max' => 30],
            [['name', 'surname', ], 'match', 'pattern' => '/^[A-Za-z_.]+$/u'],
            [['username'], 'string', 'max' => 20],
            [['username'], 'unique', 'message'=>'Username has already been taken. Please change.'],

            [['personal_id'], 'validateIdCard'],
            [['personal_id'], 'unique', 'message'=>'Personal ID has already been exist.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'personal_id' => Yii::t('app', 'Personal ID'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'prescription' => Yii::t('app', 'Prescription'),
            'create_by' => Yii::t('app', 'Responsible'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'create_at' => Yii::t('app', 'Create Date'),
            'update_at' => Yii::t('app', 'Update Time'),
            'update_by' => Yii::t('app', 'Updater'),

        ];
    }


    public function validateIdCard()
    {
        $id = str_split(str_replace('-','', $this->personal_id));
        $sum = 0;
        $total = 0;
        $digi = 13;

        for($i=0; $i<12; $i++){
            $sum = $sum + (intval($id[$i]) * $digi);
            $digi--;
        }
        $total = (11 - ($sum % 11)) % 10;

        if($total != $id[12])
        {
            $this->addError('personal_id', 'Personal ID is Invalid.');
        }
    }

    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'create_by']);
    }



}
