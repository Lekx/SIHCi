<?php

/**
 * This is the model class for table "copyrights".
 *
 * The followings are the available columns in table 'copyrights':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $participation_type
 * @property string $title
 * @property string $application_date
 * @property integer $step_number
 * @property string $resume
 * @property string $beneficiary
 * @property string $entity
 * @property string $impact_value
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class Copyrights extends CActiveRecord
{
	public $searchValue;
	/**
	 * @return string the associated database table name
	 */
	
	public function tableName()
	{
		return 'copyrights';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, participation_type, title, step_number', 'required'),
			array('id_curriculum, step_number', 'numerical', 'integerOnly'=>true),
			array('participation_type, entity', 'length', 'max'=>20),
			array('title', 'length', 'max'=>150),
			array('beneficiary', 'length', 'max'=>70),
			array('application_date, resume, impact_value, creation_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue','length', 'max'=>70),
			array('id, id_curriculum, participation_type, title, application_date, step_number, resume, beneficiary, entity, impact_value, creation_date, searchValue', 'safe', 'on'=>'search'),
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
			'id_curriculum' => 'ID Curriculum',
			'participation_type' => 'Tipo de participación:',
			'title' => 'Título de la obra:',
			'application_date' => 'Fecha de solicitud:',
			'step_number' => 'Número de tramite:',
			'resume' => 'Resumen:',
			'beneficiary' => 'Beneficiario:',
			'entity' => 'Entidad:',
			'impact_value' => 'Valor de impacto:',
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
		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		
		$criteria->condition='id_curriculum = '.$curriculumId;
		$criteria->order = 'beneficiary ASC';
		if($this->searchValue)
		{
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR title LIKE CONCAT('%', :searchValue ,'%') OR participation_type LIKE CONCAT('%', :searchValue , '%') OR beneficiary LIKE CONCAT('%', :searchValue , '%') OR step_number LIKE CONCAT('%', :searchValue , '%') OR  entity LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
	
		}
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Copyrights the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave()
    {
		$this->application_date = DateTime::createFromFormat('d/m/Y', $this->application_date)->format('Y-m-d');
		return parent::beforeSave();
    }

   	protected function afterFind()
    {
   		$this->application_date = DateTime::createFromFormat('Y-m-d', $this->application_date)->format('d/m/Y');
   		return parent::afterFind();
    }
}