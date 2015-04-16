<?php

/**
 * This is the model class for table "sponsorship".
 *
 * The followings are the available columns in table 'sponsorship':
 * @property integer $id
 * @property integer $id_user_sponsorer
 * @property integer $id_user_researcher
 * @property string $project_name
 * @property string $description
 * @property string $keywords
 * @property string $status
 *
 * The followings are the available model relations:
 * @property SponsoredProjects[] $sponsoredProjects
 * @property Users $idUserSponsorer
 * @property Users $idUserResearcher
 */
class Sponsorship extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sponsorship';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user_sponsorer, id_user_researcher, project_name, description, keywords', 'required'),
			array('id_user_sponsorer, id_user_researcher', 'numerical', 'integerOnly'=>true),
			array('project_name', 'length', 'max'=>45),
			array('status', 'length', 'max'=>20),
			array('description, keywords', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user_sponsorer, id_user_researcher, project_name, description, keywords, status', 'safe', 'on'=>'search'),
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
			'sponsoredProjects' => array(self::HAS_MANY, 'SponsoredProjects', 'id_sponsorship'),
			'idUserSponsorer' => array(self::BELONGS_TO, 'Users', 'id_user_sponsorer'),
			'idUserResearcher' => array(self::BELONGS_TO, 'Users', 'id_user_researcher'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user_sponsorer' => 'Empresa que patrocina',
			'id_user_researcher' => 'Investigador a patrocinar',
			'project_name' => 'Nombre del proyecto',
			'description' => 'Descripción',
			'keywords' => 'Palabras clave',
			'status' => 'Estatus',
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
		$criteria->compare('id_user_sponsorer',$this->id_user_sponsorer);
		$criteria->compare('id_user_researcher',$this->id_user_researcher);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sponsorship the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
