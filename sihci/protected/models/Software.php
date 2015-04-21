<?php

/**
 * This is the model class for table "software".
 *
 * The followings are the available columns in table 'software':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $country
 * @property string $participation_type
 * @property string $title
 * @property string $beneficiary
 * @property string $entity
 * @property double $manwork_hours
 * @property string $end_date
 * @property string $sector
 * @property string $organization
 * @property string $second_level
 * @property string $resumen
 * @property string $objective
 * @property string $contribution
 * @property string $valor_impacto
 * @property string $innovation_trascen
 * @property string $transfer_mechanism
 * @property string $hr_formation
 * @property integer $economic_support
 * @property string $path
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class Software extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'software';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, country, title, sector, organization', 'required'),
			array('id_curriculum, economic_support', 'numerical', 'integerOnly'=>true),
			array('manwork_hours', 'numerical'),
			array('country', 'length', 'max'=>50),
			array('participation_type, entity', 'length', 'max'=>20),
			array('title', 'length', 'max'=>150),
			array('beneficiary', 'length', 'max'=>70),
			array('sector, organization, second_level, path', 'length', 'max'=>100),
		    array('path','file','allowEmpty'=>true,
				   'types'=>'pdf, doc, docx, odt, jpg, jpeg, png',
			       'maxSize'=>array(1204 * 5000),
			       'message'=>'Solo se admiten archivos pdf, doc, docx, odt, jpg, jpeg, png'),
		    array('end_date','compare','compareValue'=> date('d/m/Y'),'operator'=>'>='),	
			array('end_date, resumen, objective, contribution, valor_impacto, innovation_trascen, transfer_mechanism, hr_formation, creation_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, country, participation_type, title, beneficiary, entity, manwork_hours, end_date, sector, organization, second_level, resumen, objective, contribution, valor_impacto, innovation_trascen, transfer_mechanism, hr_formation, economic_support, path, creation_date', 'safe', 'on'=>'search'),
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
			'id_curriculum' => 'Id Curriculum',
			'country' => 'País',
			'participation_type' => 'Tipo de participación',
			'title' => 'Título',
			'beneficiary' => 'Beneficiario',
			'entity' => 'Entidad',
			'manwork_hours' => 'Horas hombre',
			'end_date' => 'Fecha de termino',
			'sector' => 'Sector',
			'organization' => 'Organización',
			'second_level' => 'Segundo nivel',
			'resumen' => 'Resumen',
			'objective' => 'Objetivo',
			'contribution' => 'Contribución',
			'valor_impacto' => 'Valor de impacto',
			'innovation_trascen' => 'Innovacón',
			'transfer_mechanism' => 'Mecanismo de transferencia.',
			'hr_formation' => 'Formación HR',
			'economic_support' => 'Apoyo económico',
			'path' => 'URL',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('participation_type',$this->participation_type,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('beneficiary',$this->beneficiary,true);
		$criteria->compare('entity',$this->entity,true);
		$criteria->compare('manwork_hours',$this->manwork_hours);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('sector',$this->sector,true);
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('second_level',$this->second_level,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('objective',$this->objective,true);
		$criteria->compare('contribution',$this->contribution,true);
		$criteria->compare('valor_impacto',$this->valor_impacto,true);
		$criteria->compare('innovation_trascen',$this->innovation_trascen,true);
		$criteria->compare('transfer_mechanism',$this->transfer_mechanism,true);
		$criteria->compare('hr_formation',$this->hr_formation,true);
		$criteria->compare('economic_support',$this->economic_support);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('creation_date',$this->creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Software the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected  function beforeSave()
	{
		$this->end_date = DateTime::createFromFormat('d/m/Y',$this->end_date)->format('Y-m-d');
		return parent::beforeSave();
	}

	protected function afterFind()
	{
		$this->end_date = DateTime::createFromFormat('Y-m-d', $this->end_date)->format('d/m/Y');
		return parent::afterFind();
	}
}
