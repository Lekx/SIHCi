<?php

/**
 * This is the model class for table "manejador_archivos".
 *
 * The followings are the available columns in table 'manejador_archivos':
 * @property integer $id
 * @property string $seccion
 * @property string $nombre_archivo
 * @property string $ruta
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class ManejadorArchivos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'manejador_archivos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seccion, nombre_archivo, ruta, fecha_inicio, fecha_fin', 'required'),
			array('seccion', 'length', 'max'=>100),
			array('nombre_archivo', 'length', 'max'=>50),
			array('ruta', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, seccion, nombre_archivo, ruta, fecha_inicio, fecha_fin', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'seccion' => 'Seccion',
			'nombre_archivo' => 'Nombre',
			'ruta' => 'Selecionar Archivo',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Final',
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
		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('nombre_archivo',$this->nombre_archivo,true);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ManejadorArchivos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave()
    {

    	//var_dump($this->fechaAutorizacion);
		// convert to display format
		
	        $this->fecha_inicio = DateTime::createFromFormat('d/m/Y', $this->fecha_inicio)->format('Y-m-d H:i:s');
	        $this->fecha_fin = DateTime::createFromFormat('d/m/Y', $this->fecha_fin)->format('Y-m-d H:i:s');
        	return parent::beforeSave();
    }

    	protected function afterFind()
    {
        // convert to display format

       
       
        	$this->fecha_inicio = DateTime::createFromFormat('Y-m-d H:i:s', $this->fecha_inicio)->format('d/m/Y');
        	$this->fecha_fin = DateTime::createFromFormat('Y-m-d H:i:s', $this->fecha_fin)->format('d/m/Y');
     		return parent::afterFind();
    }


}
