<?php

/**
 * This is the model class for table "books_chapters".
 *
 * The followings are the available columns in table 'books_chapters':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $chapter_title
 * @property string $book_title
 * @property string $publishing_year
 * @property string $publishers
 * @property string $editorial
 * @property string $volume
 * @property integer $pages
 * @property integer $citations
 * @property integer $total_of_authors
 * @property string $area
 * @property string $discipline
 * @property string $subdiscipline
 * @property string $creation_date
 * @property string $url_doc
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class BooksChapters extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'books_chapters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, chapter_title, book_title,publishing_year', 'required'),
			array('id_curriculum, pages, citations, total_of_authors', 'numerical','integerOnly'=>true),
			array('chapter_title, url_doc', 'length', 'max'=>100),
			array('discipline, subdiscipline','length', 'max'=>200),
			array('book_title, editorial, volume, area' , 'length', 'max'=>45),
			array('publishers', 'length', 'max'=>255),
			array('publishing_year, creation_date', 'safe'),
			array('url_doc','file','allowEmpty'=>true,
				   'types'=>'pdf, doc, docx, odt, jpg, jpeg, png',
			       'maxSize'=>array(1204 * 2000),
			       'message'=>'Solo se admiten archivos pdf, doc, docx, odt, jpg, jpeg, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, chapter_title, book_title, publishing_year, publishers, editorial, volume, pages, citations, total_of_authors, area, discipline, subdiscipline, creation_date, url_doc', 'safe', 'on'=>'search'),
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
			'chapter_title' => 'Capítulo de libro',
			'book_title' => 'Titulo de libro',
			'publishing_year' => 'Año de publicación',
			'publishers' => 'Editores',
			'editorial' => 'Editorial',
			'volume' => 'No. Volumen',
			'pages' => 'No. Paginas',
			'citations' => 'No. Citas',
			'total_of_authors' => 'Total de autores',
			'area' => 'Área',
			'discipline' => 'Disciplina',
			'subdiscipline' => 'Subdisciplina',
			'creation_date' => 'Creation Date',
			'url_doc' => 'Documento aprobatorio',
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
		$criteria->compare('chapter_title',$this->chapter_title,true);
		$criteria->compare('book_title',$this->book_title,true);
		$criteria->compare('publishing_year',$this->publishing_year,true);
		$criteria->compare('publishers',$this->publishers,true);
		$criteria->compare('editorial',$this->editorial,true);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('pages',$this->pages);
		$criteria->compare('citations',$this->citations);
		$criteria->compare('total_of_authors',$this->total_of_authors);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('subdiscipline',$this->subdiscipline,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('url_doc',$this->url_doc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BooksChapters the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

		protected function beforeSave()
    {

			$this->publishing_year = DateTime::createFromFormat('d/m/Y', $this->publishing_year)->format('Y-m-d');
	        return parent::beforeSave();
    }

    	protected function afterFind()
    {
       		$this->publishing_year = DateTime::createFromFormat('Y-m-d', $this->publishing_year)->format('d/m/Y');
     		return parent::afterFind();
    }
}