<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "tbl_allergy".
 *
 * @property integer $allergy_id
 * @property string $personal_id
 * @property string $name
 * @property string $surname
 * @property string $allergy_drug
 * @property string $reporter
 * @property string $create_at
 */
class Allergy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_allergy';
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
                    'createdByAttribute'=>'reporter',
                    'updatedByAttribute' => 'reporter',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['personal_id', 'name', 'surname', 'allergy_drug',], 'required'],
            [['allergy_drug'], 'string'],
            [['create_at', 'update_at'], 'safe'],

            [['name', 'surname', ], 'string', 'max' => 30],
            [['name', 'surname', ], 'match', 'pattern' => '/^[A-Za-z_.]+$/u'],

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
            'allergy_id' => Yii::t('app', 'Allergy ID'),
            'personal_id' => Yii::t('app', 'Personal ID'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'allergy_drug' => Yii::t('app', 'Allergy Drug'),
            'reporter' => Yii::t('app', 'Reporter'),
            'create_at' => Yii::t('app', 'Create Date'),
            'update_at' => Yii::t('app', 'Update Time'),
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

    public function getReporterName()
    {
        return $this->hasOne(User::className(), ['id' => 'reporter']);
    }
}
