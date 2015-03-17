<?php

/**
 * This is the model class for table "grades".
 *
 * The followings are the available columns in table 'grades':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $country
 * @property string $grade
 * @property string $writ_number
 * @property string $title
 * @property string $obtention_date
 * @property string $status
 * @property string $thesis_title
 * @property string $state
 * @property integer $sector
 * @property string $institution
 * @property string $area
 * @property string $discipline
 * @property string $subdiscipline
 *
 * The followings are the available model relations:
 * @property DirectedThesis[] $directedThesises
 * @property Curriculum $idCurriculum
 */
class Grades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, grade, title, obtention_date, thesis_title, institution', 'required'),
			array('id_curriculum, sector', 'numerical', 'integerOnly'=>true),
			array('country', 'length', 'max'=>50),
			array('grade, writ_number, title, state, area, discipline, subdiscipline', 'length', 'max'=>45),
			array('status', 'length', 'max'=>25),
			array('thesis_title', 'length', 'max'=>250),
			array('institution', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, country, grade, writ_number, title, obtention_date, status, thesis_title, state, sector, institution, area, discipline, subdiscipline', 'safe', 'on'=>'search'),
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
			'directedThesises' => array(self::HAS_MANY, 'DirectedThesis', 'id_grade'),
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
			'country' => 'País',
			'grade' => 'Grado',
			'writ_number' => 'Número de Cédula',
			'title' => 'Titulo',
			'obtention_date' => 'Fecha de Obtención',
			'status' => 'Estatus',
			'thesis_title' => 'Título de Tésis',
			'state' => 'Estado',
			'sector' => 'Sector',
			'institution' => 'Institución',
			'area' => 'Área',
			'discipline' => 'Disciplina',
			'subdiscipline' => 'Subdisciplina',
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
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('writ_number',$this->writ_number,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('obtention_date',$this->obtention_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('thesis_title',$this->thesis_title,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('sector',$this->sector);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('subdiscipline',$this->subdiscipline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Grades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
