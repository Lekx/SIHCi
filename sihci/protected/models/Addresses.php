<?php

/**
 * This is the model class for table "addresses".
 *
 * The followings are the available columns in table 'addresses':
 * @property integer $id
 * @property string $country
 * @property integer $zip_code
 * @property string $state
 * @property string $delegation
 * @property string $city
 * @property string $town
 * @property string $colony
 * @property string $street
 * @property string $external_number
 * @property string $internal_number
 *
 * The followings are the available model relations:
 * @property Curriculum[] $curriculums
 * @property SponsorBilling[] $sponsorBillings
 * @property Sponsors[] $sponsors
 */
class Addresses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'addresses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country, zip_code, state, delegation, city, town, colony, external_number', 'required'),
			array('zip_code', 'numerical', 'integerOnly'=>true),
			array('country, city, street', 'length', 'max'=>50),
			array('state', 'length', 'max'=>20),
			array('delegation, town', 'length', 'max'=>30),
			array('colony', 'length', 'max'=>45),
			array('external_number, internal_number', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country, zip_code, state, delegation, city, town, colony, street, external_number, internal_number', 'safe', 'on'=>'search'),
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
			'curriculums' => array(self::HAS_MANY, 'Curriculum', 'id_actual_address'),
			'sponsorBillings' => array(self::HAS_MANY, 'SponsorBilling', 'id_address_billing'),
			'sponsors' => array(self::HAS_MANY, 'Sponsors', 'id_address'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country' => 'Country',
			'zip_code' => 'Zip Code',
			'state' => 'State',
			'delegation' => 'Delegation',
			'city' => 'City',
			'town' => 'Town',
			'colony' => 'Colony',
			'street' => 'Street',
			'external_number' => 'External Number',
			'internal_number' => 'Internal Number',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('delegation',$this->delegation,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('colony',$this->colony,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('external_number',$this->external_number,true);
		$criteria->compare('internal_number',$this->internal_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Addresses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
