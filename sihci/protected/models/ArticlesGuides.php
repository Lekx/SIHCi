<?php

/**
 * This is the model class for table "articles_guides".
 *
 * The followings are the available columns in table 'articles_guides':
 * @property integer $id
 * @property integer $id_resume
 * @property integer $isbn
 * @property string $title
 * @property string $editorial
 * @property integer $edicion
 * @property integer $publishing_year
 * @property integer $volumen
 * @property integer $volumen_no
 * @property integer $start_page
 * @property integer $end_page
 * @property string $article_type
 * @property integer $copies_issued
 * @property string $magazine
 * @property string $area
 * @property string $discipline
 * @property string $subdiscipline
 * @property string $url_document
 * @property string $keywords
 * @property string $type
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property ArtGuidesAuthor[] $artGuidesAuthors
 * @property Curriculum $idResume
 */
class ArticlesGuides extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $searchValue;

	public function tableName()
	{
		return 'articles_guides';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_resume,title, start_page, end_page, article_type, magazine, area, discipline,subdiscipline,keywords', 'required'),
			array('id_resume,edicion, publishing_year, volumen, volumen_no, start_page, end_page, copies_issued', 'numerical', 'integerOnly'=>true),
			array('editorial', 'length', 'max'=>80),
			array('article_type', 'length', 'max'=>25),
			array('magazine', 'length', 'max'=>50),
			array('area, discipline, subdiscipline', 'length', 'max'=>60),
			array('keywords', 'length', 'max'=>250),
			array('type', 'length', 'max'=>15),
			array('searchValue','length','max'=>70),   		
			array('url_document', 'length', 'max'=>100),
			array('url_document','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'safe' => false,  'maxSize'=>1024 * 1024 * 2),
			array('url_document','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'allowEmpty'=>true,'on'=>'update', 'safe' => false,  'maxSize'=>1024 * 1024 * 2),
			array('end_page','compare', 'compareAttribute'=>'start_page','operator'=>'>=','message'=>'Página final no puede ser menor a la página inicial'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_resume, isbn,title, editorial, edicion, publishing_year, volumen, volumen_no, start_page, end_page, article_type, copies_issued, magazine, area, discipline, subdiscipline, url_document, keywords, type, creation_date,searchValue', 'safe', 'on'=>'search'),
			
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
			'artGuidesAuthors' => array(self::HAS_MANY, 'ArtGuidesAuthor', 'id_art_guides'),
			'idResume' => array(self::BELONGS_TO, 'Curriculum', 'id_resume'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_resume' => 'Id Resume',
			'isbn' => 'Número de ISBN:',
			'title'=> 'Título:',
			'editorial' => 'Editorial:',
			'edicion' => 'Edición:',
			'publishing_year' => 'Año de publicación:',
			'volumen' =>  'Volumen:',
			'volumen_no' => 'Número de volumen:',
			'start_page' => 'Página inicial: ',
			'end_page' => 'Página final:',
			'article_type' => 'Tipo:',
			'copies_issued' => 'Tiraje:',
			'magazine' => 'Revista:',
			'area' => 'Área:',
			'discipline' => 'Disciplina:',
			'subdiscipline' => 'Subdiciplina:',
			'url_document' => 'Archivo:',
			'keywords' => 'Palabras claves:',
			'type' => 'Clasificación del articulo o guía:',
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
		
		$criteria->condition='id_resume = '.$curriculumId;
		$criteria->order = 'title ASC';
		
		if($this->searchValue)
		{
			$criteria->addCondition("title LIKE CONCAT('%', :searchValue , '%') OR edicion LIKE CONCAT('%', :searchValue , '%') OR editorial LIKE CONCAT('%', :searchValue ,'%') OR isbn LIKE CONCAT('%', :searchValue , '%') OR volumen LIKE CONCAT('%', :searchValue , '%') OR volumen_no LIKE CONCAT('%', :searchValue , '%') OR article_type LIKE CONCAT('%', :searchValue , '%') OR publishing_year LIKE CONCAT('%', :searchValue , '%')");
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
	 * @return ArticlesGuides the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
