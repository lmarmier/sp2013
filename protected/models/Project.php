<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $title
 * @property string $startDate
 * @property string $endDate
 * @property double $priceByDay
 * @property double $priceByLunch
 * @property double $priceByDinner
 * @property double $priceByNight
 * @property integer $night
 * @property integer $lunch
 * @property integer $dinner
 * @property integer $daySelect
 * @property integer $nightSelect
 * @property integer $lunchSelect
 * @property integer $dinnerSelect
 * @property integer $camp_id
 *
 * The followings are the available model relations:
 * @property Family[] $families
 * @property Camp $camp
 * @property User[] $users
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, startDate, endDate, camp_id', 'required'),
			array('night, lunch, dinner, daySelect, nightSelect, lunchSelect, dinnerSelect, camp_id', 'numerical', 'integerOnly'=>true),
			array('priceByDay, priceByLunch, priceByDinner', 'numerical'),
			array('title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, startDate, endDate, priceByDay, priceByLunch, priceByDinner, night, lunch, dinner, daySelect, nightSelect, lunchSelect, dinnerSelect, camp_id', 'safe', 'on'=>'search'),
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
			'families' => array(self::HAS_MANY, 'Family', 'form_id'),
			'camp' => array(self::BELONGS_TO, 'Camp', 'camp_id'),
			'users' => array(self::HAS_MANY, 'User', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Titre du projet',
			'startDate' => 'Date de début',
			'endDate' => 'Date de fin',
			'priceByDay' => 'Prix par jours',
			'priceByLunch' => 'Prix par dîner',
			'priceByDinner' => 'Prix par souper',
			'night' => 'Nuit',
			'lunch' => 'Dîner',
			'dinner' => 'Souper',
			'daySelect' => 'Séléction des jours',
			'nightSelect' => 'Séléction des nuits',
			'lunchSelect' => 'Séléction des dîner',
			'dinnerSelect' => 'Séléction des souper',
			'camp_id' => 'Camp',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('priceByDay',$this->priceByDay);
		$criteria->compare('priceByLunch',$this->priceByLunch);
		$criteria->compare('priceByDinner',$this->priceByDinner);
		$criteria->compare('night',$this->night);
		$criteria->compare('lunch',$this->lunch);
		$criteria->compare('dinner',$this->dinner);
		$criteria->compare('daySelect',$this->daySelect);
		$criteria->compare('nightSelect',$this->nightSelect);
		$criteria->compare('lunchSelect',$this->lunchSelect);
		$criteria->compare('dinnerSelect',$this->dinnerSelect);
		$criteria->compare('camp_id',$this->camp_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}