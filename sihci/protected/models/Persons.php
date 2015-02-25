<?php

/**
 * This is the model class for table "persons".
 *
 * The followings are the available columns in table 'persons':
 * @property integer $id
 * @property integer $id_user
 * @property string $names
 * @property string $last_name1
 * @property string $last_name2
 * @property string $marital_status
 * @property string $genre
 * @property string $birth_date
 * @property string $rfc_rud
 * @property string $country
 *
 * The followings are the available model relations:
 * @property Users $idUser
 * @property Sponsors[] $sponsors
 */
class Persons extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, names, last_name1, marital_status, genre, birth_date, rfc_rud, country', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('names', 'length', 'max'=>30),
			array('last_name1, last_name2, marital_status', 'length', 'max'=>20),
			array('genre', 'length', 'max'=>10),
			array('rfc_rud', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, names, last_name1, last_name2, marital_status, genre, birth_date, rfc_rud,country', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'sponsors' => array(self::HAS_MANY, 'Sponsors', 'id_person_representative'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id de usuario',
			'names' => 'Nombres',
			'last_name1' => 'Apellido Paterno',
			'last_name2' => 'Apellido Materno',
			'marital_status' => 'Estado civil',
			'genre' => 'Genero',
			'birth_date' => 'Fecha de Nacimiento',
			'rfc_rud' => 'Curp / Pasaporte',
			'country' => 'Pais'
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
		$criteria->compare('names',$this->names,true);
		$criteria->compare('last_name1',$this->last_name1,true);
		$criteria->compare('last_name2',$this->last_name2,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('genre',$this->genre,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('rfc_rud',$this->rfc_rud,true);
		$criteria->compare('country',$this->country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persons the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
