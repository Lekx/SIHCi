

<?php

/**
 * This is the model class for table "postdegree_graduates".
 *
 * The followings are the available columns in table 'postdegree_graduates':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $fullname
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */

class PostdegreeGraduates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $searchValue;
	
	public function tableName()
	{
		return 'postdegree_graduates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

		return array(
			array('id_curriculum, fullname', 'required'),
			array('id_curriculum', 'numerical','integerOnly'=>true),
			array('fullname', 'length', 'max'=>70),
			array('searchValue', 'length', 'max'=>70),
			array('creation_date', 'safe'),
		    array('id, id_curriculum, fullname, searchValue', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		
		return array(
			'idCurriculum' => array(self::BELONGS_TO, 'Curriculum', 'id_curriculum'),			
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_curriculum' => 'Id Curriculum',
			'fullname' => 'Nombre completo del graduado.',
			'creation_date' => 'Fecha de creación.',
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
				
		
		$criteria=new CDbCriteria;
		$sort= new CSort();
		$sort->defaultOrder='name ASC';

		if($this->searchValue)
		{
			$criteria->addCondition("fullname LIKE CONCAT('%', :searchValue , '%') OR creation_date LIKE CONCAT('%', :searchValue ,'%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}	

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	


}
