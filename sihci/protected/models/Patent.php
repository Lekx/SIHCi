<?php

/**
 * This is the model class for table "patent".
 *
 * The followings are the available columns in table 'patent':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $country
 * @property string $participation_type
 * @property string $name
 * @property string $state
 * @property string $application_type
 * @property integer $application_number
 * @property string $patent_type
 * @property string $consession_date
 * @property string $record
 * @property string $presentation_date
 * @property string $international_clasification
 * @property string $title
 * @property string $owner
 * @property string $resumen
 * @property integer $industrial_exploitation
 * @property string $resource_operator
 */
class Patent extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public $searchValue;
	public function tableName()
	{
		return 'patent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, name, application_type, application_number, presentation_date, country', 'required'),
			array('id_curriculum, application_number, industrial_exploitation', 'numerical', 'integerOnly'=>true),
			array('country, state', 'length', 'max'=>50),
			array('participation_type, application_type, patent_type', 'length', 'max'=>20),
			array('name, title', 'length', 'max'=>150),
			array('record', 'length', 'max'=>250),
			array('international_clasification', 'length', 'max'=>100),
			array('owner, resource_operator', 'length', 'max'=>70),
			array('consession_date, resumen', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue','length', 'max'=>70),
			array('id, id_curriculum, country, participation_type, name, state, application_type, application_number, patent_type, consession_date, record, presentation_date, international_clasification, title, owner, resumen, industrial_exploitation, resource_operator, searchValue', 'safe', 'on'=>'search'),
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
			'country' => 'País:',
			'participation_type' => 'Tipo de participación:',
			'name' => 'Nombre de la patente:',
			'state' => 'Estado de la patente:',
			'application_type' => 'Tipo de aplicación:',
			'application_number' => 'Número de registro o Número de solicitud:',
			'patent_type' => 'Tipo de patente:',
			'consession_date' => 'Fecha de concesión:',
			'record' => 'Expediente:',
			'presentation_date' => 'Fecha de presentación:',
			'international_clasification' => 'Clasificación internacional:',
			'title' => 'Titular de la patente:',
			'owner' => 'Propietario:',
			'resumen' => 'Resumen:',
			'industrial_exploitation' => 'Explotación industrial:',
			'resource_operator' => 'Quién lo explota:',
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

		$sort= new CSort();
		$sort->defaultOrder='name ASC';



		if($this->searchValue)
		{
			$criteria->addCondition("name LIKE CONCAT('%', :searchValue , '%') OR owner LIKE CONCAT('%', :searchValue ,'%') OR application_number LIKE CONCAT('%', :searchValue , '%') OR state LIKE CONCAT('%', :searchValue , '%') OR application_type LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}


		return new CActiveDataProvider($this, array('criteria'=>$criteria,'sort'=>$sort));


		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		return new CActiveDataProvider($this, array(
			'criteria'=>array(
		        'condition'=>'id_curriculum='.$curriculumId,
		        'order'=>'presentation_date ASC',
		    ),
		));

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Patent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave()
    {
		$this->presentation_date = DateTime::createFromFormat('d/m/Y', $this->presentation_date)->format('Y-m-d');
		$this->consession_date = DateTime::createFromFormat('d/m/Y', $this->consession_date)->format('Y-m-d');
    	return parent::beforeSave();
    }

   	protected function afterFind()
    {
   		$this->presentation_date = DateTime::createFromFormat('Y-m-d', $this->presentation_date)->format('d/m/Y');
   		$this->consession_date = DateTime::createFromFormat('Y-m-d', $this->consession_date)->format('d/m/Y');
   		return parent::afterFind();
    }

    public function compareDate($attribute,$params) 
    {	
		if(!empty($this->attributes['presentation_date'])) 
		{
			if(strtotime($this->attributes['presentation_date']) > strtotime($this->attributes['consession_date'])) 
			{
				$this->addError($attribute,'La fecha de presentación no puede ser mayor a la fecha de concesión');
			}
		}
	}
	
}
