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
 * @property string $editorial
 * @property integer $edition
 * @property integer $publishing_year
 * @property integer $release_date
 * @property integer $volume
 * @property integer $pages
 * @property integer $copies_issued
 * @property string $work_type
 * @property string $idioma
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
			array('id_curriculum, isbn, publisher, release_date, pages, area, discipline, path, keywords', 'required'),
			array('id_curriculum, isbn, edition, publishing_year, release_date, volume, pages, copies_issued', 'numerical', 'integerOnly'=>true),
			array('book_title, path', 'length', 'max'=>100),
			array('publisher, traductor', 'length', 'max'=>80),
			array('editorial, subdiscipline', 'length', 'max'=>45),
			array('work_type', 'length', 'max'=>30),
			array('idioma', 'length', 'max'=>15),
			array('traductor_type', 'length', 'max'=>20),
			array('area', 'length', 'max'=>40),
			array('discipline', 'length', 'max'=>60),
			array('keywords', 'length', 'max'=>250),
			array('creation_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, isbn, book_title, publisher, editorial, edition, publishing_year, release_date, volume, pages, copies_issued, work_type, idioma, traductor_type, traductor, area, discipline, subdiscipline, path, keywords, creation_date', 'safe', 'on'=>'search'),
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
			'isbn' => 'Isbn',
			'book_title' => 'Book Title',
			'publisher' => 'Publisher',
			'editorial' => 'Editorial',
			'edition' => 'Edition',
			'publishing_year' => 'Publishing Year',
			'release_date' => 'Release Date',
			'volume' => 'Volume',
			'pages' => 'Pages',
			'copies_issued' => 'Copies Issued',
			'work_type' => 'Work Type',
			'idioma' => 'Idioma',
			'traductor_type' => 'Traductor Type',
			'traductor' => 'Traductor',
			'area' => 'Area',
			'discipline' => 'Discipline',
			'subdiscipline' => 'Subdiscipline',
			'path' => 'Path',
			'keywords' => 'Keywords',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('isbn',$this->isbn);
		$criteria->compare('book_title',$this->book_title,true);
		$criteria->compare('publisher',$this->publisher,true);
		$criteria->compare('editorial',$this->editorial,true);
		$criteria->compare('edition',$this->edition);
		$criteria->compare('publishing_year',$this->publishing_year);
		$criteria->compare('release_date',$this->release_date);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('pages',$this->pages);
		$criteria->compare('copies_issued',$this->copies_issued);
		$criteria->compare('work_type',$this->work_type,true);
		$criteria->compare('idioma',$this->idioma,true);
		$criteria->compare('traductor_type',$this->traductor_type,true);
		$criteria->compare('traductor',$this->traductor,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('subdiscipline',$this->subdiscipline,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('creation_date',$this->creation_date,true);

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
