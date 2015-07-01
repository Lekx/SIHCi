<?php

/**
 * This is the model class for table "curriculum".
 *
 * The followings are the available columns in table 'curriculum':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_actual_address
 * @property string $native_country
 * @property string $native_language
 * @property integer $status
 * @property integer $SNI
 * @property string $researcher_title
 *
 * The followings are the available model relations:
 * @property ArticlesGuides[] $articlesGuides
 * @property Books[] $books
 * @property BooksChapters[] $booksChapters
 * @property Certifications[] $certifications
 * @property Congresses[] $congresses
 * @property Copyrights[] $copyrights
 * @property Addresses $idActualAddress
 * @property Users $idUser
 * @property DocsIdentity[] $docsIdentities
 * @property Grades[] $grades
 * @property Jobs[] $jobs
 * @property KnowledgeApplication[] $knowledgeApplications
 * @property Languages[] $languages
 * @property Patent[] $patents
 * @property PostdegreeGraduates[] $postdegreeGraduates
 * @property PressNotes[] $pressNotes
 * @property Projects[] $projects
 * @property ResearchAreas[] $researchAreases
 * @property ResearchAreasCv[] $researchAreasCvs
 * @property Software[] $softwares
 */
class Curriculum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'curriculum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_actual_address, native_country', 'required'),
			array('id_user, id_actual_address, status, SNI', 'numerical', 'integerOnly'=>true),
			array('native_country', 'length', 'max'=>50),
			array('native_language', 'length', 'max'=>45),
			array('researcher_title', 'length', 'max'=>100),
			array('SNI', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, id_actual_address, native_country, native_language, status, SNI, researcher_title', 'safe', 'on'=>'search'),
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
			'articlesGuides' => array(self::HAS_MANY, 'ArticlesGuides', 'id_resume'),
			'books' => array(self::HAS_MANY, 'Books', 'id_curriculum'),
			'booksChapters' => array(self::HAS_MANY, 'BooksChapters', 'id_curriculum'),
			'certifications' => array(self::HAS_MANY, 'Certifications', 'id_curriculum'),
			'congresses' => array(self::HAS_MANY, 'Congresses', 'id_curriculum'),
			'copyrights' => array(self::HAS_MANY, 'Copyrights', 'id_curriculum'),
			'idActualAddress' => array(self::BELONGS_TO, 'Addresses', 'id_actual_address'),
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
			'docsIdentities' => array(self::HAS_MANY, 'DocsIdentity', 'id_curriculum'),
			'grades' => array(self::HAS_MANY, 'Grades', 'id_curriculum'),
			'jobs' => array(self::HAS_MANY, 'Jobs', 'id_curriculum'),
			'knowledgeApplications' => array(self::HAS_MANY, 'KnowledgeApplication', 'id_curriculum'),
			'languages' => array(self::HAS_MANY, 'Languages', 'id_curriculum'),
			'patents' => array(self::HAS_MANY, 'Patent', 'id_curriculum'),
			'postdegreeGraduates' => array(self::HAS_MANY, 'PostdegreeGraduates', 'id_curriculum'),
			'pressNotes' => array(self::HAS_MANY, 'PressNotes', 'id_curriculum'),
			'projects' => array(self::HAS_MANY, 'Projects', 'id_curriculum'),
			'researchAreases' => array(self::HAS_MANY, 'ResearchAreas', 'id_curriculum'),
			'researchAreasCvs' => array(self::HAS_MANY, 'ResearchAreasCv', 'id_research_areas_cv'),
			'softwares' => array(self::HAS_MANY, 'Software', 'id_curriculum'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'id_actual_address' => 'Id Actual Address',
			'native_country' => 'Nacionalidad',
			'native_language' => 'Idioma nativo',
			'status' => 'Activo',
			'SNI' => 'SNI',
			'researcher_title' => 'Título de Investigador',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_actual_address',$this->id_actual_address);
		$criteria->compare('native_country',$this->native_country,true);
		$criteria->compare('native_language',$this->native_language,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('SNI',$this->SNI);
		$criteria->compare('researcher_title',$this->researcher_title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Curriculum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
