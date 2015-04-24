<?php

/**
 * This is the model class for table "congresses".
 *
 * The followings are the available columns in table 'congresses':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $work_title
 * @property integer $year
 * @property string $congress
 * @property string $type
 * @property string $country
 * @property string $work_type
 * @property string $keywords
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 * @property CongressesAuthors[] $congressesAuthors
 */
class Congresses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $searchValue;

	public function tableName()
	{
		return 'congresses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, work_title, congress, country, keywords', 'required'),
			array('id_curriculum, year', 'numerical', 'integerOnly'=>true),
			array('work_title, congress', 'length', 'max'=>200),
			array('type', 'length', 'max'=>15),
			array('country', 'length', 'max'=>50),
			array('work_type', 'length', 'max'=>25),
			array('keywords', 'length', 'max'=>250),
			array('creation_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue','length', 'max'=>70),
			array('id, id_curriculum, work_title, year, congress, type, country, work_type, keywords, searchValue', 'safe', 'on'=>'search'),
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
			'congressesAuthors' => array(self::HAS_MANY, 'CongressesAuthors', 'id_congresses'),
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
			'work_title' => 'Puesto',
			'year' => 'Año',
			'congress' => 'Congreso',
			'type' => 'Tipo',
			'country' => 'Pais',
			'work_type' => 'Tipo de Trabajo',
			'keywords' => 'Palabras Claves',
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
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR work_title LIKE CONCAT('%', :searchValue ,'%') OR congress LIKE CONCAT('%', :searchValue , '%') OR keywords LIKE CONCAT('%', :searchValue , '%') ");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}
		/*$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('work_title',$this->work_title,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('congress',$this->congress,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('work_type',$this->work_type,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('creation_date',$this->creation_date,true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Congresses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
