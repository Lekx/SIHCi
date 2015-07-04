<?php

/**
 * This is the model class for table "directed_thesis".
 *
 * The followings are the available columns in table 'directed_thesis':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $title
 * @property string $conclusion_date
 * @property string $author
 * @property string $path
 * @property string $grade
 * @property string $sector
 * @property string $organization
 * @property string $second_level
 * @property string $area
 * @property string $discipline
 * @property string $subdiscipline
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class DirectedThesis extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $searchValue;
	public function tableName()
	{
		return 'directed_thesis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, title, author, sector, organization, conclusion_date', 'required'),
			array('id_curriculum', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			array('author, grade', 'length', 'max'=>45),
			array('path, sector, organization, second_level', 'length', 'max'=>100),
			array('area', 'length', 'max'=>60),
			array('discipline', 'length', 'max'=>75),
			array('subdiscipline', 'length', 'max'=>100),
			array('conclusion_date, creation_date', 'safe'),
			array('path','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'allowEmpty'=>true,'on'=>'insert', 'safe' => false,  'maxSize'=>1024 * 1024 * 2),
			array('path','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'allowEmpty'=>true,'on'=>'update', 'safe' => false,  'maxSize'=>1024 * 1024 * 2),
			array('conclusion_date','compare','compareValue' => date('d/m/Y'),'operator'=>'<='),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('searchValue','length', 'max'=>70),
			array('id, id_curriculum, title, conclusion_date, author, path, grade, sector, organization, second_level, area, discipline, subdiscipline, creation_date, searchValue', 'safe', 'on'=>'search'),
			array('path, safe','safe','on'=>'update'),
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
			'title' => 'Título:',
			'conclusion_date' => 'Fecha de conclusión:',
			'author' => 'Autor:',
			'path' => 'Archivo:',
			'grade' => 'Grado:',
			'sector' => 'Sector:',
			'organization' => 'Organización:',
			'second_level' => 'Segundo nivel:',
			'area' => 'Área:',
			'discipline' => 'Disciplina:',
			'subdiscipline' => 'Subdisciplina:',
			'creation_date' => 'Creation Date:',
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
		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		
		$criteria->condition='id_curriculum = '.$curriculumId;
		$criteria->order = 'title ASC';
		if($this->searchValue)
		{
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR title LIKE CONCAT('%', :searchValue ,'%') OR author LIKE CONCAT('%', :searchValue , '%') OR sector LIKE CONCAT('%', :searchValue , '%') OR grade LIKE CONCAT('%', :searchValue , '%') OR organization LIKE CONCAT('%', :searchValue , '%') OR area LIKE CONCAT('%', :searchValue , '%') OR discipline LIKE CONCAT('%', :searchValue , '%') OR subdiscipline LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}
		/*$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('conclusion_date',$this->conclusion_date,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('path',$this->path);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('sector',$this->sector,true);
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('second_level',$this->second_level,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('subdiscipline',$this->subdiscipline,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function direccionArchivos(){
                return $model->path;
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DirectedThesis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
		protected function beforeSave()
    {

			$this->conclusion_date = DateTime::createFromFormat('d/m/Y', $this->conclusion_date)->format('Y-m-d');
	        return parent::beforeSave();
    }

    	protected function afterFind()
    {
       		$this->conclusion_date = DateTime::createFromFormat('Y-m-d', $this->conclusion_date)->format('d/m/Y');
     		return parent::afterFind();
    }
}
