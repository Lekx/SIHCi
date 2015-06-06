<?php

/**
 * This is the model class for table "admin_specialty_areas".
 *
 * The followings are the available columns in table 'admin_specialty_areas':
 * @property integer $id
 * @property integer $id_specialty_areas
 * @property string $ext_subspecialty
 *
 * The followings are the available model relations:
 * @property SpecialtyAreas $idSpecialtyAreas
 */
class AdSpecialtyAreas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_specialty_areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_specialty_areas,ext_subspecialty', 'required'),
			array('id_specialty_areas', 'numerical', 'integerOnly'=>true),
			array('ext_subspecialty', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_specialty_areas, ext_subspecialty', 'safe', 'on'=>'search'),
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
			'idSpecialtyAreas' => array(self::BELONGS_TO, 'SpecialtyAreas', 'id_specialty_areas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_specialty_areas' => 'Id Specialty Areas',
			'ext_subspecialty' => 'Ext Subspecialty',
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
		$criteria->compare('id_specialty_areas',$this->id_specialty_areas);
		$criteria->compare('ext_subspecialty',$this->ext_subspecialty,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdSpecialtyAreas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
