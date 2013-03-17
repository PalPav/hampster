<?php

/**
 * This is the model class for table "main.usr_hampster".
 *
 * The followings are the available columns in table 'main.usr_hampster':
 * @property integer $id
 * @property string $login
 * @property string $rock
 * @property string $roll
 * @property string $settings
 * @property string $email
 * @property string $registered
 * @property string $lastlogin
 */
class Hampster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Hampster the static model class
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
		return 'main.usr_hampster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, rock, roll, settings, email, registered, lastlogin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, rock, roll, settings, email, registered, lastlogin', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'rock' => 'Rock',
			'roll' => 'Roll',
			'settings' => 'Settings',
			'email' => 'Email',
			'registered' => 'Registered',
			'lastlogin' => 'Lastlogin',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('rock',$this->rock,true);
		$criteria->compare('roll',$this->roll,true);
		$criteria->compare('settings',$this->settings,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('registered',$this->registered,true);
		$criteria->compare('lastlogin',$this->lastlogin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}