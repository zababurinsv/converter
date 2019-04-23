<?php

namespace backend\modules\converter\models;

use Yii;

/**
 * This is the model class for table "converter".
 *
 * @property int $id
 * @property string $object
 * @property string $code
 * @property string $name
 * @property int $population
 */
class Converter extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'converter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object', 'code', 'name', 'population'], 'required'],
            [['population'], 'integer'],
            [['object', 'name', 'image'], 'string', 'max' => 45],
            [['code'], 'string', 'max' => 3],
            [['file'], 'file'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['name'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'object' => Yii::t('app', 'Object'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'population' => Yii::t('app', 'Population'),
            'file' => 'image',
        ];
    }
}
