<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property string $fio
 * @property int $position_id
 * @property int $team_id
 *
 * @property Violations[] $violations
 * @property Position $position
 * @property Team $team
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'position_id', 'team_id'], 'required'],
            [['position_id', 'team_id'], 'integer'],
            [['fio'], 'string', 'max' => 100],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'position_id' => 'Position ID',
            'team_id' => 'Team ID',
        ];
    }

    /**
     * Gets query for [[Violations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViolations()
    {
        return $this->hasMany(Violations::className(), ['employee_id' => 'id']);
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
     * Gets query for [[Team]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }
}
