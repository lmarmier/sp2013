<?php

/**
 * This is the model class for table "participant".
 *
 * The followings are the available columns in table 'participant':
 * @property integer $id
 * @property string $lastName
 * @property string $gender
 * @property string $name
 * @property string $phone
 * @property string $mail
 * @property string $birthdate
 * @property integer $family_id
 *
 * The followings are the available model relations:
 * @property Family $family
 */
class Participant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Participant the static model class
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
		return 'participant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lastName, gender, name, birthdate, family_id', 'required'),
			array('family_id', 'numerical', 'integerOnly'=>true),
			array('lastName, gender, name, phone', 'length', 'max'=>45),
			array('mail', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lastName, gender, name, birthdate, family_id', 'safe', 'on'=>'search'),
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
			'family' => array(self::BELONGS_TO, 'Family', 'family_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lastName' => 'Prénom',
			'gender' => 'Sexe',
			'name' => 'Nom',
			'phone'=>'Natel',
			'birthdate' => 'Date d\'anniversaire',
			'family_id' => 'Id de la famille',
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
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('family_id',$this->family_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}