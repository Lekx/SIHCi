<?php

/**
 * This is the model class for table "sponsors".
 *
 * The followings are the available columns in table 'sponsors':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_address
 * @property string $sponsor_name
 * @property string $type
 * @property string $website
 * @property string $sector
 * @property string $class
 * @property string $branch
 * @property string $main_activity
 * @property string $legal_structure
 * @property integer $employeess_number
 *
 * The followings are the available model relations:
 * @property SponsorBilling[] $sponsorBillings
 * @property Addresses $idAddress
 * @property Users $idUser
 * @property SponsorsContact[] $sponsorsContacts
 * @property SponsorsContacts[] $sponsorsContacts1
 * @property SponsorsDocs[] $sponsorsDocs
 */
class Sponsors extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sponsors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_address, sponsor_name, type', 'required'),
			array('id_user, id_address, employeess_number', 'numerical', 'integerOnly'=>true),
			array('sponsor_name', 'length', 'max'=>50),
			array('type', 'length', 'max'=>150),
			array('website, sector, class, branch, main_activity, legal_structure', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, id_address, sponsor_name, type, website, sector, class, branch, main_activity, legal_structure, employeess_number', 'safe', 'on'=>'search'),
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
			'sponsorBillings' => array(self::HAS_MANY, 'SponsorBilling', 'id_sponsor'),
			'idAddress' => array(self::BELONGS_TO, 'Addresses', 'id_address'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'sponsorsContacts' => array(self::HAS_MANY, 'SponsorsContact', 'id_sponsor'),
			'sponsorsContacts1' => array(self::HAS_MANY, 'SponsorsContacts', 'id_sponsor'),
			'sponsorsDocs' => array(self::HAS_MANY, 'SponsorsDocs', 'id_sponsor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'id_address' => 'Id Address',
			'sponsor_name' => 'Nombre del patrocinador',
			'type' => 'Tipo',
			'website' => 'Sitio web',
			'sector' => 'Sector',
			'class' => 'Clase',
			'branch' => 'Rama',
			'main_activity' => 'Actividad principal',
			'legal_structure' => 'Estructura legal',
			'employeess_number' => 'Numero de trabajadores',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_address',$this->id_address);
		$criteria->compare('sponsor_name',$this->sponsor_name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('sector',$this->sector,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('branch',$this->branch,true);
		$criteria->compare('main_activity',$this->main_activity,true);
		$criteria->compare('legal_structure',$this->legal_structure,true);
		$criteria->compare('employeess_number',$this->employeess_number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sponsors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
