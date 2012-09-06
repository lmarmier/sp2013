<?php

/**
 * This is the model class for table "camp".
 *
 * The followings are the available columns in table 'camp':
 * @property integer $id
 * @property string $city
 * @property string $startDate
 * @property string $endDate
 * @property double $priceByNight
 * @property double $priceByDay
 * @property double $priceByLunch
 * @property double $priceByDinner
 * @property integer $night
 * @property integer $lunch
 * @property integer $dinner
 * @property integer $nightSelect
 * @property integer $daySelect
 * @property integer $lunchSelect
 * @property integer $dinnerSelect
 *
 * The followings are the available model relations:
 * @property Project[] $projects
 */
class Camp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Camp the static model class
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
		return 'camp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city, startDate, endDate', 'required'),
			array('night, lunch, dinner, nightSelect, daySelect, lunchSelect, dinnerSelect', 'numerical', 'integerOnly'=>true),
			array('priceByDay, priceByLunch, priceByDinner', 'numerical'),
			array('city', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('city, startDate, endDate', 'safe', 'on'=>'search'),
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
			'projects' => array(self::HAS_MANY, 'Project', 'camp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city' => 'Ville',
			'startDate' => 'Date de début',
			'endDate' => 'Date de fin',
			'priceByNight'=>'Prix par nuit',
			'priceByDay' => 'Prix par jour',
			'priceByLunch' => 'Prix par dîner',
			'priceByDinner' => 'Prix par souper',
			'night' => 'Nuit',
			'lunch' => 'Dîner',
			'dinner' => 'Souper',
			'nightSelect' => 'Séléction de nuit',
			'daySelect' => 'Séléction de jour',
			'lunchSelect' => 'Séléction de dîner',
			'dinnerSelect' => 'Séléction de souper',
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
		$criteria->compare('city',$this->city,true);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('priceByDay',$this->priceByDay);
		$criteria->compare('priceByLunch',$this->priceByLunch);
		$criteria->compare('priceByDinner',$this->priceByDinner);
		$criteria->compare('night',$this->night);
		$criteria->compare('lunch',$this->lunch);
		$criteria->compare('dinner',$this->dinner);
		$criteria->compare('nightSelect',$this->nightSelect);
		$criteria->compare('daySelect',$this->daySelect);
		$criteria->compare('lunchSelect',$this->lunchSelect);
		$criteria->compare('dinnerSelect',$this->dinnerSelect);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}