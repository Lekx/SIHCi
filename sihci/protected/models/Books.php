<?php

/**
 * This is the model class for table "books".
 *
 * The followings are the available columns in table 'books':
 * @property integer $id
 * @property integer $id_curriculum
 * @property integer $isbn
 * @property string $book_title
 * @property string $publisher
 * @property integer $edition
 * @property integer $release_date
 * @property integer $volume
 * @property integer $pages
 * @property integer $copies_issued
 * @property string $work_type
 * @property string $language
 * @property string $traductor_type
 * @property string $traductor
 * @property string $area
 * @property string $discipline
 * @property string $subdiscipline
 * @property string $path
 * @property string $keywords
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 * @property BooksAuthors[] $booksAuthors
 */
class Books extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $searchValue;


	public function tableName()
	{
		return 'books';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, isbn,book_title, publisher, release_date, pages, area, discipline, keywords', 'required'),
			array('id_curriculum, isbn, edition, release_date, volume, pages, copies_issued', 'numerical', 'integerOnly'=>true),
			array('book_title, path', 'length', 'max'=>100),
			array('publisher, traductor', 'length', 'max'=>80),
			array('work_type', 'length', 'max'=>30),
			array('language', 'length', 'max'=>20),
			array('traductor_type', 'length', 'max'=>20),
			array('area', 'length', 'max'=>40),
			array('searchValue', 'length', 'max'=>60),
			array('discipline', 'length', 'max'=>60),
			array('subdiscipline', 'length', 'max'=>45),
			array('keywords', 'length', 'max'=>250),
			array('creation_date', 'safe'),
			array('path','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png','on'=>'insert','allowEmpty'=>false,'safe' => false,  'maxSize'=>1024 * 1024 * 5),
			array('path','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png','on'=>'update','allowEmpty'=>true,'safe' => false,  'maxSize'=>1024 * 1024 * 5),
			
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, isbn, book_title, publisher, edition, release_date, volume, pages, copies_issued, work_type, language, traductor_type, traductor, area, discipline, subdiscipline, path, keywords, searchValue ,creation_date', 'safe', 'on'=>'search'),
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
			'booksAuthors' => array(self::HAS_MANY, 'BooksAuthors', 'id_book'),
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
			'isbn' => 'Número de ISBN:',
			'book_title' => 'Título del libro:',
			'publisher' => 'Editorial:',					       		
			'edition' => 'Edición:',
			'release_date' => 'Año de publicación:',
			'volume' => 'Volume:',
			'pages' => 'Número de paginas:',
			'copies_issued' => 'Tiraje:',
			'work_type' => 'Identificador libro:',
			'language' => 'Idioma:',
			'traductor_type' => 'Tipo de traductor:',
			'traductor' => 'Nombre del traductor:',
			'area' => 'Área:',
			'discipline' => 'Disciplina:',
			'subdiscipline' => 'Subdisciplina:',
			'path' => 'Documento:',
			'keywords' => 'Palabras claves:',					       			
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
		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;
		
		$criteria->condition='id_curriculum = '.$curriculumId;
		$criteria->order = 'book_title ASC';
		if($this->searchValue)
		{
			$criteria->addCondition("book_title LIKE CONCAT('%', :searchValue , '%') OR  publisher LIKE CONCAT('%', :searchValue , '%') OR volume LIKE CONCAT('%', :searchValue ,'%') OR isbn LIKE CONCAT('%', :searchValue , '%') OR edition LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}	
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Books the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}