<?php

/**
 * This is the model class for table "main_news".
 *
 * The followings are the available columns in table 'main_news':
 * @property integer $id
 * @property string $subject
 * @property string $body
 * @property integer $hampster_id
 * @property string $created
 * @property string $last_touch
 * @property integer $state_id
 * @property integer $type_id
 *
 * The followings are the available model relations:
 * @property UsrHampster $hampster
 * @property NewsState $state
 * @property NewsType $type
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'main_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, hampster_id', 'required'),
			array('hampster_id, state_id, type_id', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>100),
			array('body, created, last_touch', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject, body, hampster_id, created, last_touch, state_id, type_id', 'safe', 'on'=>'search'),
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
			'hampster' => array(self::BELONGS_TO, 'Hampster', 'hampster_id'),
			'state' => array(self::BELONGS_TO, 'NewsState', 'state_id'),
			'type' => array(self::BELONGS_TO, 'NewsType', 'type_id'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject' => 'Subject',
			'body' => 'Body',
			'hampster_id' => 'Hampster',
			'created' => 'Created',
			'last_touch' => 'Last Touch',
			'state_id' => 'State',
			'type_id' => 'Type',
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
		$criteria->compare('hampster_id',$this->hampster_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('last_touch',$this->last_touch,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('type_id',$this->type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}