<?php

/**
 * This is the model class for table "family".
 *
 * The followings are the available columns in table 'family':
 * @property integer $id
 * @property string $name
 * @property string $adresse
 * @property integer $zip
 * @property string $city
 * @property string $project
 * @property integer $form_id
 * @property string $mail
 * @property integer $phone
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Project $form
 * @property Participant[] $participants
 * @property Participation[] $participations
 */
class Family extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Family the static model class
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
		return 'family';
	}
	
	/**
	* Is 
	*/
	public function beforeSave() {
	
	    if ($this->isNewRecord)
	        $this->created = new CDbExpression('NOW()');
	 
	    return parent::beforeSave();
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, zip, city, form_id, mail, phone', 'required'),
			array('zip, form_id', 'numerical', 'integerOnly'=>true),
			array('name, mail', 'length', 'max'=>45),
			array('adresse, city, project', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, adresse, zip, city, project, form_id, mail, phone', 'safe', 'on'=>'search'),
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
			'form' => array(self::BELONGS_TO, 'Project', 'form_id'),
			'participants' => array(self::HAS_MANY, 'Participant', 'family_id'),
			'participations' => array(self::HAS_MANY, 'Participation', 'family_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nom',
			'adresse' => 'Adresse',
			'zip' => 'NPA',
			'city' => 'Localité',
			'project' => 'Projet',
			'form_id' => 'Identifiant du projet',
			'mail' => 'Mail',
			'phone' => 'Téléphone',
			'created' => 'Date dinscription',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('adresse',$this->adresse,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('project',$this->project,true);
		$criteria->compare('form_id',$this->form_id);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}