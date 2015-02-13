<?php

/**
 * This is the model class for table "personas".
 *
 * The followings are the available columns in table 'personas':
 * @property integer $id
 * @property integer $id_usuario
 * @property string $nombres
 * @property string $a_paterno
 * @property string $a_materno
 * @property string $edo_civil
 * @property string $sexo
 * @property string $fecha_nacimiento
 * @property string $rfc_rud
 *
 * The followings are the available model relations:
 * @property Curriculum[] $curriculums
 * @property Emails[] $emails
 * @property Usuarios $idUsuario
 * @property Telefonos[] $telefonoses
 */
class Personas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, nombres, a_paterno, edo_civil, sexo, fecha_nacimiento, rfc_rud', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('nombres', 'length', 'max'=>30),
			array('a_paterno, a_materno, edo_civil', 'length', 'max'=>20),
			array('sexo', 'length', 'max'=>10),
			array('rfc_rud', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_usuario, nombres, a_paterno, a_materno, edo_civil, sexo, fecha_nacimiento, rfc_rud', 'safe', 'on'=>'search'),
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
			'curriculums' => array(self::HAS_MANY, 'Curriculum', 'id_persona'),
			'emails' => array(self::HAS_MANY, 'Emails', 'id_persona'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'telefonoses' => array(self::HAS_MANY, 'Telefonos', 'id_persona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_usuario' => 'Id Usuario',
			'nombres' => 'Nombres',
			'a_paterno' => 'A Paterno',
			'a_materno' => 'A Materno',
			'edo_civil' => 'Edo Civil',
			'sexo' => 'Sexo',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'rfc_rud' => 'Rfc Rud',
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
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('a_paterno',$this->a_paterno,true);
		$criteria->compare('a_materno',$this->a_materno,true);
		$criteria->compare('edo_civil',$this->edo_civil,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('rfc_rud',$this->rfc_rud,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
