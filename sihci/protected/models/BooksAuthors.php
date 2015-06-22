<?php

/**
 * This is the model class for table "books_authors".
 *
 * The followings are the available columns in table 'books_authors':
 * @property integer $id
 * @property integer $id_book
 * @property string $names
 * @property string $last_name1
 * @property string $last_name2
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property Books $idBook
 */
class BooksAuthors extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'books_authors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_book, names, last_name1, last_name2, position', 'required'),
			array('id_book', 'numerical','position', 'integerOnly'=>true),
			array('names', 'length', 'max'=>30),
			array('last_name1, last_name2', 'length', 'max'=>20),


			array('position', 'length', 'max'=>45, 'integerOnly'=>true),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_book, names, last_name1, last_name2, position', 'safe', 'on'=>'search'),
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
			'idBook' => array(self::BELONGS_TO, 'Books', 'id_book'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_book' => 'Id Book',
			'names' => 'Names',
			'last_name1' => 'Last Name1',
			'last_name2' => 'Last Name2',
			'position' => 'Position',
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
		$criteria->compare('id_book',$this->id_book);
		$criteria->compare('names',$this->names,true);
		$criteria->compare('last_name1',$this->last_name1,true);
		$criteria->compare('last_name2',$this->last_name2,true);
		$criteria->compare('position',$this->position,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BooksAuthors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
