<?php

/**
 * This is the model class for table "directed_thesis".
 *
 * The followings are the available columns in table 'directed_thesis':
 * @property integer $id
 * @property integer $id_grade
 * @property string $title
 * @property string $conclusion_date
 * @property string $author
 * @property string $path
 * @property string $grade
 * @property string $sector
 * @property string $organization
 * @property string $Second_level
 * @property string $area
 * @property string $discipline
 * @property string $subdisciplina
 *
 * The followings are the available model relations:
 * @property Grades $idGrade
 */
class DirectedThesis extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
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
			array('id_grade, title, author, sector, organization', 'required'),
			array('id_grade', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			array('author, grade', 'length', 'max'=>45),
			array('path, sector, organization, Second_level', 'length', 'max'=>100),
			array('area, discipline, subdisciplina', 'length', 'max'=>60),
			array('conclusion_date', 'safe'),
			array('path','file','allowEmpty'=>true,
				   'types'=>'pdf',
			       'maxSize'=>array(1204 * 2000),
			       'message'=>'Solo se admiten archivos pdf'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_grade, title, conclusion_date, author, path, grade, sector, organization, Second_level, area, discipline, subdisciplina', 'safe', 'on'=>'search'),
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
			'idGrade' => array(self::BELONGS_TO, 'Grades', 'id_grade'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_grade' => 'Id Grade',
			'title' => 'Titulo',
			'conclusion_date' => 'Fecha de Conclusión',
			'author' => 'Autor',
			'path' => 'Url',
			'grade' => 'Grado',
			'sector' => 'Sector',
			'organization' => 'Organización',
			'Second_level' => 'Segundo nivel',
			'area' => 'Área',
			'discipline' => 'Disciplina',
			'subdisciplina' => 'Subdisciplina',
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
		$criteria->compare('id_grade',$this->id_grade);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('conclusion_date',$this->conclusion_date,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('sector',$this->sector,true);
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('Second_level',$this->Second_level,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('subdisciplina',$this->subdisciplina,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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

			$this->conclusion_date = DateTime::createFromFormat('d/m/Y', $this->conclusion_date)->format('Y-m-d H:i:s');
	        return parent::beforeSave();
    }

    	protected function afterFind()
    {
       		$this->conclusion_date = DateTime::createFromFormat('Y-m-d H:i:s', $this->conclusion_date)->format('d/m/Y');
     		return parent::afterFind();
    }
}
