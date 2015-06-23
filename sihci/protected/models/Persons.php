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
 * @property string $country
 * @property string $state_of_birth
 * @property string $curp_passport
 * @property string $photo_url
 * @property string $person_rfc
 *
 * The followings are the available model relations:
 * @property Emails[] $emails
 * @property Users $idUser
 * @property Phones[] $phones
 * @property Sponsors[] $sponsors
 * @property SponsorsContacts[] $sponsorsContacts
 */

class Persons extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'persons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, names, last_name1, marital_status, country, genre, birth_date, curp_passport', 'required'),
			array('id_user', 'numerical', 'integerOnly' => true),
			array('names', 'length', 'max' => 30),
			array('curp_passport', 'length', 'min' => 11, 'max' => 18),
			array('last_name1, last_name2, marital_status, curp_passport', 'length', 'max' => 20),
			array('genre', 'length', 'max' => 10),
			array('country', 'length', 'max' => 50),
			array('state_of_birth', 'length', 'max' => 45),
			array('photo_url', 'file', 'allowEmpty' => true,
				'on' => 'update',
				'types' => 'png, jpg, jpeg',
				'maxSize' => array(1024 * 2000),
				'message' => 'Solo se admiten archivos PNG, JPG, JPEG'),
			array('person_rfc', 'length', 'min' => 13, 'max' => 13),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, names, last_name1, last_name2, marital_status, genre, birth_date, country, state_of_birth, curp_passport, photo_url, person_rfc', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'emails' => array(self::HAS_MANY, 'Emails', 'id_person'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'phones' => array(self::HAS_MANY, 'Phones', 'id_person'),
			'sponsors' => array(self::HAS_MANY, 'Sponsors', 'id_person_representative'),
			'sponsorsContacts' => array(self::HAS_MANY, 'SponsorsContacts', 'id_person'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'names' => 'Nombre(s)',
			'last_name1' => 'Apellido Paterno',
			'last_name2' => 'Apellido Materno',
			'marital_status' => 'Estado Civil',
			'genre' => 'Genero',
			'birth_date' => 'Fecha de Nacimiento',
			'country' => 'País',
			'native_country' => 'Nacionalidad',
			'state_of_birth' => 'Estado de Nacimiento',
			'curp_passport' => 'Curp o Pasaporte',
			'photo_url' => 'Foto de Perfil',
			'person_rfc' => 'RFC',
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
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_user', $this->id_user);
		$criteria->compare('names', $this->names, true);
		$criteria->compare('last_name1', $this->last_name1, true);
		$criteria->compare('last_name2', $this->last_name2, true);
		$criteria->compare('marital_status', $this->marital_status, true);
		$criteria->compare('genre', $this->genre, true);
		$criteria->compare('birth_date', $this->birth_date, true);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('state_of_birth', $this->state_of_birth, true);
		$criteria->compare('curp_passport', $this->curp_passport, true);
		$criteria->compare('photo_url', $this->photo_url, true);
		$criteria->compare('person_rfc', $this->person_rfc, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persons the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
	protected function beforeSave() {
		$this->birth_date = DateTime::createFromFormat('d/m/Y', $this->birth_date)->format('Y-m-d');
		return parent::beforeSave();
	}

	protected function afterFind() {
		//$this->birth_date = DateTime::createFromFormat('Y-m-d', $this->birth_date)->format('d/m/Y');
		return parent::afterFind();
	}


}
