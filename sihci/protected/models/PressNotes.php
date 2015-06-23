<?php

/**
 * This is the model class for table "press_notes".
 *
 * The followings are the available columns in table 'press_notes':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $type
 * @property string $directed_to
 * @property string $date
 * @property string $title
 * @property string $responsible_agency
 * @property string $note
 * @property string $is_national
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class PressNotes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $searchValue;

	public function tableName()
	{
		return 'press_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, title, is_national', 'required'),
			array('id_curriculum', 'numerical', 'integerOnly'=>true),
			array('type, directed_to, title, responsible_agency, is_national', 'length', 'max'=>45),
			array('date, note, creation_date', 'safe'),
			array('date','compare','compareValue'=> date('d/m/Y'),'operator'=>'<='),	
			array('searchValue','length', 'max'=>70),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, type, directed_to, date, title, responsible_agency, note, is_national, creation_date, searchValue', 'safe', 'on'=>'search'),
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
			'id_curriculum' => 'Id curriculum',
			'type' => 'Tipo de participación',
			'directed_to' => 'Dirigido a ',
			'date' => 'Fecha de publicación',
			'title' => 'Título de la publicación',
			'responsible_agency' => 'Dependencia responsable',
			'note' => 'Nota periodistica',
			'is_national' => 'Tipo de publicación',
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
			$criteria->addCondition("directed_to LIKE CONCAT('%', :searchValue , '%') OR title LIKE CONCAT('%', :searchValue ,'%') OR type LIKE CONCAT('%', :searchValue , '%') OR responsible_agency LIKE CONCAT('%', :searchValue , '%') OR note LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}	

		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		/*	'criteria'=>array(
		      	'condition'=>$criteria,
		        'condition'=>'id_curriculum='.$curriculumId,
		        'order'=>'title ASC',
		    ),*/
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PressNotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave()
    {
			$this->date = DateTime::createFromFormat('d/m/Y', $this->date)->format('Y-m-d');
        	return parent::beforeSave();
    }

   	protected function afterFind()
    {
       		$this->date = DateTime::createFromFormat('Y-m-d', $this->date)->format('d/m/Y');
     		return parent::afterFind();
    }
}
