<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property integer $id_rol
 * @property string $email
 * @property string $contrasena
 * @property string $fecha_registro
 * @property string $fecha_activacion
 * @property string $llave_act_rec
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Bitacora[] $bitacoras
 * @property Empresas[] $empresases
 * @property Patrocinios[] $patrocinioses
 * @property Patrocinios[] $patrocinioses1
 * @property Personas[] $personases
 * @property Roles $idRol
 */

//EL MINIMO DEL  LA CONTRASEÑA
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rol, email, contrasena, fecha_registro, fecha_activacion, llave_act_rec, estatus', 'required'),
			array('id_rol, estatus', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>100),
			array('contrasena', 'length', 'min'=>5, 'max'=>15),
			array('llave_act_rec', 'length', 'max'=>200),
			array('id, id_rol, email, contrasena, fecha_registro, fecha_activacion, llave_act_rec, estatus', 'safe', 'on'=>'search'),
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
			'bitacoras' => array(self::HAS_MANY, 'Bitacora', 'id_usuario'),
			'empresases' => array(self::HAS_MANY, 'Empresas', 'id_usuario'),
			'patrocinioses' => array(self::HAS_MANY, 'Patrocinios', 'id_empresa'),
			'patrocinioses1' => array(self::HAS_MANY, 'Patrocinios', 'id_investigador'),
			'personases' => array(self::HAS_MANY, 'Personas', 'id_usuario'),
			'idRol' => array(self::BELONGS_TO, 'Roles', 'id_rol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_rol' => 'Id Rol',
			'email' => 'Email',
			'contrasena' => 'Contrasena',
			'fecha_registro' => 'Fecha Registro',
			'fecha_activacion' => 'Fecha Activacion',
			'llave_act_rec' => 'Llave Act Rec',
			'estatus' => 'Estatus',
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
		$criteria->compare('id_rol',$this->id_rol);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('fecha_activacion',$this->fecha_activacion,true);
		$criteria->compare('llave_act_rec',$this->llave_act_rec,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
