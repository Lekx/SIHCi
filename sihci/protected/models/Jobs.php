<?php

/**
 * This is the model class for table "jobs".
 *
 * The followings are the available columns in table 'jobs':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $organization
 * @property string $area
 * @property string $title
 * @property integer $start_day
 * @property integer $start_month
 * @property integer $start_year
 * @property string $hospital_unit
 * @property string $rud
 * @property string $schedule
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class Jobs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jobs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, organization, area, title, start_year, hospital_unit', 'required'),
			array('id_curriculum, start_day, start_month, start_year', 'numerical', 'integerOnly'=>true),
			array('organization', 'length', 'max'=>100),
			array('area, title, schedule', 'length', 'max'=>45),
			array('hospital_unit, rud', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, organization, area, title, start_day, start_month, start_year, hospital_unit, rud, schedule', 'safe', 'on'=>'search'),
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
			'organization' => 'Organización',
			'area' => 'Área',
			'title' => 'Título o Puesto',
			'start_day' => 'Día de Inicio',
			'start_month' => 'Mes de Inicio',
			'start_year' => 'Año de inicio',
			'hospital_unit' => 'HU',
			'rud' => 'RUD',
			'schedule' => 'Horario de trabajo',
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
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('start_day',$this->start_day);
		$criteria->compare('start_month',$this->start_month);
		$criteria->compare('start_year',$this->start_year);
		$criteria->compare('hospital_unit',$this->hospital_unit,true);
		$criteria->compare('rud',$this->rud,true);
		$criteria->compare('schedule',$this->schedule,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jobs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
