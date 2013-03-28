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
 * @property string $password
 * @property string $password2
 */


class Hampster extends CActiveRecord
{

    public $password;
    public $password2;
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
            array('email, login, password, password2', 'required'),
            array('password2', 'compare', 'compareAttribute' => 'password'),
            array('email',    'match',   'pattern'    => '/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/', 'message' => 'Не верный формат e-mail адреса.'),
            array('login', 'match',   'pattern'    => '/^[A-Za-z0-9_\.\#-А-Яа-я\s,]+$/u','message'  => 'Логин содержит недопустимые символы.'),
            array('login, email',     'length',  'max' => '100', 'min' => '2',),
            array('password, password2', 'length',  'max' => '40',  'min' => '5',),
			array('id, login, settings, email, registered, lastlogin', 'safe', 'on'=>'search'),
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


    public function touchtouch()
    {

    }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'login' => 'Хомяк',
			'rock' => 'Что',
			'roll' => 'Кто',
			'settings' => 'Настройки',
			'email' => 'Почта',
			'registered' => 'Регистрация',
                'lastlogin' => 'Забегал',
            'password' => 'Заначку сюда',
            'password2' => 'и еще разочек сюда'
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
		$criteria->compare('settings',$this->settings,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('registered',$this->registered,true);
		$criteria->compare('lastlogin',$this->lastlogin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}