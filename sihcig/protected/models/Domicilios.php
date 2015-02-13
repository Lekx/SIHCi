<?php

/**
 * This is the model class for table "domicilios".
 *
 * The followings are the available columns in table 'domicilios':
 * @property integer $id
 * @property integer $id_pais
 * @property integer $cp
 * @property string $estado
 * @property string $delegacion
 * @property string $municipio
 * @property string $colonia
 * @property string $calle
 * @property string $numero_ext
 * @property string $numero_int
 * @property string $ciudad
 *
 * The followings are the available model relations:
 * @property Curriculum[] $curriculums
 * @property Curriculum[] $curriculums1
 * @property Paises $idPais
 */
class Domicilios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'domicilios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pais, cp, estado, delegacion, municipio, colonia, numero_ext, ciudad', 'required'),
			array('id_pais, cp', 'numerical', 'integerOnly'=>true),
			array('estado', 'length', 'max'=>20),
			array('delegacion, municipio', 'length', 'max'=>30),
			array('colonia', 'length', 'max'=>45),
			array('calle, ciudad', 'length', 'max'=>50),
			array('numero_ext, numero_int', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_pais, cp, estado, delegacion, municipio, colonia, calle, numero_ext, numero_int, ciudad', 'safe', 'on'=>'search'),
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
			'curriculums' => array(self::HAS_MANY, 'Curriculum', 'id_domicilio_actual'),
			'curriculums1' => array(self::HAS_MANY, 'Curriculum', 'id_domicilio_origen'),
			'idPais' => array(self::BELONGS_TO, 'Paises', 'id_pais'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pais' => 'Id Pais',
			'cp' => 'Cp',
			'estado' => 'Estado',
			'delegacion' => 'Delegacion',
			'municipio' => 'Municipio',
			'colonia' => 'Colonia',
			'calle' => 'Calle',
			'numero_ext' => 'Numero Ext',
			'numero_int' => 'Numero Int',
			'ciudad' => 'Ciudad',
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
		$criteria->compare('id_pais',$this->id_pais);
		$criteria->compare('cp',$this->cp);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('delegacion',$this->delegacion,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('numero_ext',$this->numero_ext,true);
		$criteria->compare('numero_int',$this->numero_int,true);
		$criteria->compare('ciudad',$this->ciudad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Domicilios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
