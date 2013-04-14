<?php

/**
 * This is the model class for table "lnk_tag".
 *
 * The followings are the available columns in table 'lnk_tag':
 * @property integer $id
 * @property string $tag
 *
 * The followings are the available model relations:
 * @property Link[] $lnkLinks
 */
class Tag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tag the static model class
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
		return 'lnk_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tag', 'safe', 'on'=>'search'),
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
			'LinkTag' => array(self::HAS_MANY, 'LinkTag', 'tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */

    public static function checkTag($tag) {
        $tag = (string)$tag;
        if (strlen($tag)>0) {
            $tag=mb_strtolower($tag, 'UTF-8');
            $connection=Yii::app()->db;
            $sql="SELECT id FROM main.lnk_tag WHERE tag ='".$tag."'";
            $command=$connection->createCommand($sql);
            return $command->queryScalar();
        }
        else {
            return false;
        }

    }






	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tag' => 'Tag',
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
		$criteria->compare('tag',$this->tag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}