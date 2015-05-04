<?php

/**
 * This is the model class for table "research_areas".
 *
 * The followings are the available columns in table 'research_areas':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 * @property ResearchAreasCv[] $researchAreasCvs
 */
class ResearchAreas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $searchValue;

	public function tableName()
	{
		return 'research_areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, name', 'required'),
			array('id_curriculum', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue','length', 'max'=>70),
			array('id, id_curriculum, name, searchValue', 'safe', 'on'=>'search'),
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
			'researchAreasCvs' => array(self::HAS_MANY, 'ResearchAreasCv', 'id_research_areas'),
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
			'name' => 'Nombre de investigación',
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
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR name LIKE CONCAT('%', :searchValue ,'%')  ");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}

		/*$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('name',$this->name,true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResearchAreas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
