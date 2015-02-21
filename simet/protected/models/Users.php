<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property integer $id_roles
 * @property string $email
 * @property string $password
 * @property string $registration_date
 * @property string $activation_date
 * @property string $act_react_key
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Curriculum[] $curriculums
 * @property Emails[] $emails
 * @property Persons[] $persons
 * @property Phones[] $phones
 * @property ProjectsCoworkers[] $projectsCoworkers
 * @property Sponshorship[] $sponshorships
 * @property Sponshorship[] $sponshorships1
 * @property Sponsors[] $sponsors
 * @property SystemLog[] $systemLogs
 * @property Roles $idRoles
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, registration_date, activation_date, act_react_key', 'required'),
			array('id_roles', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>100),
			array('password, act_react_key', 'length', 'max'=>200),
			array('status', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_roles, email, password, registration_date, activation_date, act_react_key, status', 'safe', 'on'=>'search'),
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
			'curriculums' => array(self::HAS_MANY, 'Curriculum', 'id_user'),
			'emails' => array(self::HAS_MANY, 'Emails', 'id_user'),
			'persons' => array(self::HAS_MANY, 'Persons', 'id_user'),
			'phones' => array(self::HAS_MANY, 'Phones', 'id_user'),
			'projectsCoworkers' => array(self::HAS_MANY, 'ProjectsCoworkers', 'id_user_coworker'),
			'sponshorships' => array(self::HAS_MANY, 'Sponshorship', 'id_user_researcher'),
			'sponshorships1' => array(self::HAS_MANY, 'Sponshorship', 'id_user_sponsorer'),
			'sponsors' => array(self::HAS_MANY, 'Sponsors', 'id_user'),
			'systemLogs' => array(self::HAS_MANY, 'SystemLog', 'id_user'),
			'idRoles' => array(self::BELONGS_TO, 'Roles', 'id_roles'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_roles' => 'Id Roles',
			'email' => 'Email',
			'password' => 'Password',
			'registration_date' => 'Registration Date',
			'activation_date' => 'Activation Date',
			'act_react_key' => 'Act React Key',
			'status' => 'Status',
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
		$criteria->compare('id_roles',$this->id_roles);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('registration_date',$this->registration_date,true);
		$criteria->compare('activation_date',$this->activation_date,true);
		$criteria->compare('act_react_key',$this->act_react_key,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
