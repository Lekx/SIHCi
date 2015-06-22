<?php

/**
 * This is the model class for table "languages".
 *
 * The followings are the available columns in table 'languages':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $language
 * @property string $description
 * @property string $native_language
 * @property integer $is_traducer
 * @property integer $is_teacher
 * @property string $conversational_level
 * @property string $reading_level
 * @property string $writting_level
 * @property string $evaluation_date
 * @property integer $document_percentage
 * @property string $path
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class Languages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $searchValue;

	public function tableName()
	{
		return 'languages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, language, document_percentage', 'required'),
			array('id_curriculum, is_traducer, is_teacher, document_percentage', 'numerical', 'integerOnly'=>true),
			array('language, native_language, conversational_level, reading_level, writting_level', 'length', 'max'=>45),
			array('description', 'length', 'max'=>250),
			array('path', 'length', 'max'=>100),
			array('searchValue','length', 'max'=>70),
			array('evaluation_date, creation_date', 'safe'),
			array('path, safe','file','allowEmpty'=>true, 'on'=>'create',
				   'types'=>'pdf, doc, docx, odt, jpg, jpeg, png',
			       'maxSize'=>array(1204 * 2000),
			       'message'=>'Solo se admiten archivos pdf, doc, docx, odt, jpg, jpeg, png'),
			array('path, safe','safe','on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue, id, id_curriculum, language, description, native_language, is_traducer, is_teacher, conversational_level, reading_level, writting_level, evaluation_date, document_percentage, path, creation_date', 'safe', 'on'=>'search'),
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
			'language' => 'Lenguaje',
			'description' => 'Descripción',
			'native_language' => 'Lenguaje Nativo',
			'is_traducer' => 'Traductor',
			'is_teacher' => 'Profesor',
			'conversational_level' => 'Nivel de Conversación',
			'reading_level' => 'Nivel de Lectura',
			'writting_level' => 'Nivel de Escritura',
			'evaluation_date' => 'Fecha de Evaluación',
			'document_percentage' => 'Puntos / Porcentaje',
			'path' => 'Exámen / Documento probatorio',
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
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR language LIKE CONCAT('%', :searchValue ,'%')");
			$criteria->params = array('searchValue'=>$this->searchValue);

		}
		// $criteria->compare('id',$this->id);
		// $criteria->compare('id_curriculum',$this->id_curriculum);
		// $criteria->compare('language',$this->language,true);
		// $criteria->compare('description',$this->description,true);
		// $criteria->compare('native_language',$this->native_language,true);
		// $criteria->compare('is_traducer',$this->is_traducer);
		// $criteria->compare('is_teacher',$this->is_teacher);
		// $criteria->compare('conversational_level',$this->conversational_level,true);
		// $criteria->compare('reading_level',$this->reading_level,true);
		// $criteria->compare('writting_level',$this->writting_level,true);
		// $criteria->compare('evaluation_date',$this->evaluation_date,true);
		// $criteria->compare('document_percentage',$this->document_percentage);
		// $criteria->compare('path',$this->path,true);
		// $criteria->compare('creation_date',$this->creation_date,true);

		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		return new CActiveDataProvider($this, array(
			'criteria'=>array(
		        'condition'=>'id_curriculum='.$curriculumId,
		        'order'=>'language ASC',
		    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Languages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	protected function beforeSave() {
		$this->evaluation_date = DateTime::createFromFormat('d/m/Y', $this->evaluation_date)->format('Y-m-d');
		return parent::beforeSave();
	}

	protected function afterFind() {
		$this->evaluation_date = DateTime::createFromFormat('Y-m-d', $this->evaluation_date)->format('d/m/Y');
		return parent::afterFind();
	}
}
