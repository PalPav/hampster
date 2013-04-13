<?php

/**
 * This is the model class for table "lnk_link".
 *
 * The followings are the available columns in table 'lnk_link':
 * @property integer $id
 * @property string $subject
 * @property string $body
 * @property string $added
 * @property string $last_check
 * @property integer $state_id
 * @property integer $hampster_id
 * @property boolean $is_private
 *
 * The followings are the available model relations:
 * @property UsrHampster $hampster
 * @property State $state
 * @property Tag[] $lnkTags
 */
class Link extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Link the static model class
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
		return 'lnk_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, body, hampster_id', 'required'),
			array('state_id, hampster_id', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>100),
			array('added, last_check, is_private', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject, body, added, last_check, state_id, hampster_id, is_private', 'safe', 'on'=>'search'),
            array('body','url'),
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
			'state' => array(self::BELONGS_TO, 'State', 'state_id'),
			'linktag' => array(self::HAS_MANY, 'LinkTag', 'link_id'),
            'tags'=>array(self::HAS_MANY, 'Tag', 'tag_id', 'through'=>'linktag')
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Код',
			'subject' => 'Описание',
			'body' => 'Ссылка',
			'added' => 'Добавлено',
			'last_check' => 'Проверено',
			'state_id' => 'Статус',
			'hampster_id' => 'Хомяк',
			'is_private' => 'Личная',
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
		$criteria->compare('added',$this->added,true);
		$criteria->compare('last_check',$this->last_check,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('hampster_id',$this->hampster_id);
		$criteria->compare('is_private',$this->is_private);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}