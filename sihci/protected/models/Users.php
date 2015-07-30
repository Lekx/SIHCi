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
 * @property string $type
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
{	public $names;
	public $last_name1;
	public $last_name2;
	public $curp_passport;
	public $searchValue;
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
			array('email', 'email'),
			array('email', 'length', 'max'=>100),
			array('password','length', 'min'=>6, 'max'=>200),
			array('act_react_key', 'length', 'max'=>200),
			array('status', 'length', 'max'=>15),
			array('type', 'length', 'max'=>30),
			array('id, id_roles, email, password, registration_date, activation_date, act_react_key, status, type,searchValue,names,last_name1,last_name1,curp_passport', 'safe', 'on'=>'search'),
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
			'email' => 'Correo electronico',
			'password' => 'Contraseña',
			'registration_date' => 'Fecha de registro',
			'activation_date' => 'Activation Date',
			'act_react_key' => 'Act React Key',
			'status' => 'Status',
			'type' => 'Tipo',
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
		if($this->searchValue)
		{
			$criteria->addCondition("email LIKE CONCAT('%', :searchValue, '%')OR status LIKE CONCAT('%', :searchValue, '%') OR type LIKE CONCAT('%', :searchValue, '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
			$criteria->with = array( 'persons' );
			$criteria->compare( 'persons.names', $this->names, true );
			$criteria->compare( 'persons.last_name1', $this->last_name1, true );
			$criteria->compare( 'persons.last_name2', $this->last_name2, true );
			$criteria->compare( 'persons.curp_passport', $this->curp_passport, true );
		}
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
        	'attributes'=>array(
            'names'=>array(
                'asc'=>'persons.names',
            ),
            '*',
        ),
    ),
			'sort'=>array(
        	'attributes'=>array(
            'last_name1'=>array(
                'asc'=>'persons.last_name1',
            ),
            '*',
        ),
    ),
			'sort'=>array(
        	'attributes'=>array(
            'last_name2'=>array(
                'asc'=>'persons.last_name2',
            ),
            '*',
        ),
    ),
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
