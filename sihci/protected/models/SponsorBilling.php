<?php

/**
 * This is the model class for table "sponsor_billing".
 *
 * The followings are the available columns in table 'sponsor_billing':
 * @property integer $id
 * @property integer $id_sponsor
 * @property integer $id_address_billing
 * @property string $name
 * @property string $rfc
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Addresses $idAddressBilling
 * @property Sponsors $idSponsor
 */
class SponsorBilling extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sponsor_billing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sponsor', 'required'),
			array('id_sponsor, id_address_billing', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('rfc', 'length', 'max'=>20),
			array('email', 'length', 'max'=>70),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_sponsor, id_address_billing, name, rfc, email', 'safe', 'on'=>'search'),
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
			'idAddressBilling' => array(self::BELONGS_TO, 'Addresses', 'id_address_billing'),
			'idSponsor' => array(self::BELONGS_TO, 'Sponsors', 'id_sponsor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_sponsor' => 'Id Sponsor',
			'id_address_billing' => 'Id Address Billing',
			'name' => 'Name',
			'rfc' => 'Rfc',
			'email' => 'Email',
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
		$criteria->compare('id_sponsor',$this->id_sponsor);
		$criteria->compare('id_address_billing',$this->id_address_billing);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SponsorBilling the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
