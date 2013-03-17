<?php

/**
 * This is the model class for table "tsk_task".
 *
 * The followings are the available columns in table 'tsk_task':
 * @property integer $id
 * @property string $subject
 * @property string $body
 * @property integer $parent_id
 * @property string $begin_time
 * @property string $end_time
 * @property integer $type_id
 * @property integer $state_id
 * @property integer $priority_level_id
 * @property integer $hampster_id
 * @property boolean $is_private
 * @property boolean $is_cycle
 * @property string $last_touch
 *
 * The followings are the available model relations:
 * @property PriorityLevel $priorityLevel
 * @property State $state
 * @property Type $type
 * @property UsrHampster $hampster
 */
class Task extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Task the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    /**
     * Возвращает списко задач хомяка для ленты.
     * @param integer id хомяка.
     * @return array Задачи хомяка
     */
    public static function getTasksByHampster($hampster_id)
    {
        $connection=Yii::app()->db;
        $hampster_id=(int)$hampster_id;
        $sql="SELECT * FROM tsk_task WHERE hampster_id=$hampster_id";
        $tasks=$connection->createCommand($sql)->queryAll();
        return $tasks;
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tsk_task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, type_id, state_id, priority_level_id, hampster_id', 'numerical', 'integerOnly'=>true),
			array('subject, body, begin_time, end_time, is_private, is_cycle, last_touch', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject, body, parent_id, begin_time, end_time, type_id, state_id, priority_level_id, hampster_id, is_private, is_cycle, last_touch', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'priorityLevel' => array(self::BELONGS_TO, 'PriorityLevel', 'priority_level_id'),
			'state' => array(self::BELONGS_TO, 'State', 'state_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
			'hampster' => array(self::BELONGS_TO, 'UsrHampster', 'hampster_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject' => 'Заголовок',
			'body' => 'Текст',
			'parent_id' => 'ID Родителя',
			'begin_time' => 'Время Начала',
			'end_time' => 'Время Окончания',
			'type_id' => 'Тип',
			'state_id' => 'Сосотояние',
			'priority_level_id' => 'Важность',
			'hampster_id' => 'Пользователь',
			'is_private' => 'Личная',
			'is_cycle' => 'Циклическая',
			'last_touch' => 'Последнее изменение',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('begin_time',$this->begin_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('priority_level_id',$this->priority_level_id);
		$criteria->compare('hampster_id',$this->hampster_id);
		$criteria->compare('is_private',$this->is_private);
		$criteria->compare('is_cycle',$this->is_cycle);
		$criteria->compare('last_touch',$this->last_touch,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}