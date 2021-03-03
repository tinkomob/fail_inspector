<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vi_type".
 *
 * @property int $id
 * @property string $title
 * @property int|null $position_id
 * @property string $class
 *
 * @property Position $position
 * @property Violations[] $violations
 */
class ViType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vi_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'class'], 'required'],
            [['position_id'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['class'], 'string', 'max' => 10],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'position_id' => 'Position ID',
            'class' => 'Class',
        ];
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * Gets query for [[Violations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViolations()
    {
        return $this->hasMany(Violations::className(), ['type_id' => 'id']);
    }
}
