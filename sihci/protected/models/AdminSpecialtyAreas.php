<?php

/**
 * This is the model class for table "specialty_areas".
 *
 * The followings are the available columns in table 'specialty_areas':
 * @property integer $id
 * @property string $specialty
 * @property string $subspecialty
 *
 * The followings are the available model relations:
 * @property AdminSpecialtyAreas $idSpecialtyAreas
 * @property AdminSpecialtyAreas[] $adminSpecialtyAreases
 */
class AdminSpecialtyAreas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $searchValue;

	public function tableName()
	{
		return 'specialty_areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('specialty, subspecialty', 'required'),
			array('specialty, subspecialty', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, specialty, subspecialty', 'safe', 'on'=>'search'),
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
			'idSpecialtyAreas' => array(self::BELONGS_TO, 'AdminSpecialtyAreas', 'id_specialty_areas'),
			'adminSpecialtyAreases' => array(self::HAS_MANY, 'AdminSpecialtyAreas', 'id_specialty_areas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'specialty' => 'Especialidad',
			'subspecialty' => 'Subespecialidad',
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
			$criteria->addCondition(" specialty LIKE CONCAT('%', :searchValue , '%') OR subspecialty  LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}

		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminSpecialtyAreas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
