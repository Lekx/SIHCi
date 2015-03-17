<?php

/**
 * This is the model class for table "phones".
 *
 * The followings are the available columns in table 'phones':
 * @property integer $id
 * @property integer $id_person
 * @property string $type
 * @property integer $country_code
 * @property integer $local_area_code
 * @property integer $phone_number
 * @property integer $extension
 * @property integer $is_primary
 *
 * The followings are the available model relations:
 * @property Persons $idPerson
 */
class Phones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_person, type, country_code, local_area_code, phone_number, is_primary', 'required'),
			array('id_person, country_code, local_area_code, phone_number, extension, is_primary', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_person, type, country_code, local_area_code, phone_number, extension, is_primary', 'safe', 'on'=>'search'),
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
			'idPerson' => array(self::BELONGS_TO, 'Persons', 'id_person'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_person' => 'Id Person',
			'type' => 'Tipo',
			'country_code' => 'Lada País',
			'local_area_code' => 'Lada Estado',
			'phone_number' => 'Número Telefónico',
			'extension' => 'Extensión',
			'is_primary' => 'Is Primary',
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
		$criteria->compare('id_person',$this->id_person);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('country_code',$this->country_code);
		$criteria->compare('local_area_code',$this->local_area_code);
		$criteria->compare('phone_number',$this->phone_number);
		$criteria->compare('extension',$this->extension);
		$criteria->compare('is_primary',$this->is_primary);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
