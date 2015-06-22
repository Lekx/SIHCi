<?php

/**
 * This is the model class for table "certifications".
 *
 * The followings are the available columns in table 'certifications':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $folio
 * @property string $reference
 * @property string $reference_type
 * @property string $specialty
 * @property string $validity_date_start
 * @property string $validity_date_end
 * @property string $type
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class Certifications extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
 	public $searchValue;

	public function tableName()
	{
		return 'certifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, validity_date_start', 'required'),
			array('id_curriculum', 'numerical', 'integerOnly'=>true),
			array('folio, reference', 'length', 'max'=>30),
			array('reference_type', 'length', 'max'=>15),
			array('specialty, type', 'length', 'max'=>60),
			array('validity_date_end, creation_date', 'safe'),
			array('validity_date_end', 'safe'),
			array('validity_date_end','compare','compareAttribute'=>'validity_date_start','operator'=>'>='),	
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue','length', 'max'=>70),
			array('id, id_curriculum, folio, reference, reference_type, specialty, validity_date_start, validity_date_end, type, creation_date, searchValue', 'safe', 'on'=>'search'),
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
			'idCurriculum' => array(self::BELONGS_TO, 'Curriculum', 'id_curriculum'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_curriculum' => 'Id Curriculum',
			'folio' => 'Folio',
			'reference' => 'Referencia',
			'reference_type' => 'Tipo de Referencia',
			'specialty' => 'Especialidad',
			'validity_date_start' => 'Fecha de Inicio',
			'validity_date_end' => 'Fecha final',
			'type' => 'Tipo',
			'creation_date' => 'Creation Date',
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
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR folio LIKE CONCAT('%', :searchValue ,'%') OR specialty LIKE CONCAT('%', :searchValue , '%') OR reference LIKE CONCAT('%', :searchValue , '%') OR reference_type LIKE CONCAT('%', :searchValue , '%') ");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}
		/*$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('folio',$this->folio,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('reference_type',$this->reference_type,true);
		$criteria->compare('specialty',$this->specialty,true);
		$criteria->compare('validity_date_start',$this->validity_date_start,true);
		$criteria->compare('validity_date_end',$this->validity_date_end,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('creation_date',$this->creation_date,true);
	*/
		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		return new CActiveDataProvider($this, array(
			'criteria'=>array(
		        'condition'=>'id_curriculum='.$curriculumId,
		        'order'=>'specialty ASC',
		    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Certifications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave()
    {

			$this->validity_date_start = Datetime::createFromFormat('d/m/Y', $this->validity_date_start)->format('Y-m-d');
	        $this->validity_date_end = Datetime::createFromFormat('d/m/Y', $this->validity_date_end)->format('Y-m-d');
        	return parent::beforeSave();
    }

    	protected function afterFind()
    {
  
       		$this->validity_date_start = Datetime::createFromFormat('Y-m-d', $this->validity_date_start)->format('d/m/Y');
        	$this->validity_date_end = Datetime::createFromFormat('Y-m-d', $this->validity_date_end)->format('d/m/Y');
     		return parent::afterFind();
    }
}
