<?php

/**
 * This is the model class for table "main_news_comments".
 *
 * The followings are the available columns in table 'main_news_comments':
 * @property integer $id
 * @property string $body
 * @property integer $hampster_id
 * @property string $created
 * @property string $edited
 * @property integer $news_id
 * @property integer $parent_id
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property UsrHampster $hampster
 * @property News $news
 */
class NewsComments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NewsComments the static model class
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
		return 'main_news_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('body, hampster_id, news_id', 'required'),
			array('hampster_id, news_id, parent_id, level', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, body, hampster_id, created, edited, news_id, parent_id, level', 'safe', 'on'=>'search'),
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
			'news' => array(self::BELONGS_TO, 'News', 'news_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'body' => 'Body',
			'hampster_id' => 'Hampster',
			'created' => 'Created',
			'edited' => 'Edited',
			'news_id' => 'News',
			'parent_id' => 'Parent',
			'level' => 'Level',
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
		$criteria->compare('body',$this->body,true);
		$criteria->compare('hampster_id',$this->hampster_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('edited',$this->edited,true);
		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}