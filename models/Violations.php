<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "violations".
 *
 * @property int $id
 * @property int $worker_id
 * @property string $date
 * @property int $type_id
 * @property int $author_id 
 *
 * @property Workers $worker
 * @property ViType $type
 * @property User $author 
 */
class Violations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'violations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'date', 'type_id'], 'required'],
            [['worker_id', 'type_id', 'author_id'], 'integer'],
            [['date'], 'safe'],
            // [['date'], 'date', 'format' => 'yyyy-M-d H:m:s'],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['worker_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ViType::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Worker ID',
            'date' => 'Date',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Workers::className(), ['id' => 'worker_id']);
    }
    /** 
    * Gets query for [[Author]]. 
    * 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getAuthor() 
   { 
       return $this->hasOne(User::className(), ['id' => 'author_id']);
   }
    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ViType::className(), ['id' => 'type_id']);
    }
    public function beforeSave($insert)

    {

        $this->date = Yii::$app->formatter->asDate($this->date, 'yyyy-MM-dd HH:i UTC');


        parent::beforeSave($insert);

        return true;

    }
}
