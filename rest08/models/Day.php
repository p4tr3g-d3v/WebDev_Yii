<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "day".
 *
 * @property int $day_id
 * @property string $name
 *
 * @property Schedule[] $schedules
 */
class Day extends ActiveRecord
{

    public function fields(){
        $fields = parent::fields();
        return array_merge($fields, [
            'day_id' => function () { return $this->day_id;},
            'name' => function () { return $this->name;},
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'day_id' => 'Day ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['day_id' => 'day_id']);
    }
}
