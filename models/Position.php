<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $title
 *
 * @property ViType[] $viTypes
 * @property Workers[] $workers
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
           [['title'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * Gets query for [[ViTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViTypes()
    {
        return $this->hasMany(ViType::className(), ['position_id' => 'id']);
    }

    /**
     * Gets query for [[Workers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Workers::className(), ['position_id' => 'id']);
    }
}
