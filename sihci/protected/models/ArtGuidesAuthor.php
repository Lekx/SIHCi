<?php

/**
 * This is the model class for table "art_guides_author".
 *
 * The followings are the available columns in table 'art_guides_author':
 * @property integer $id
 * @property integer $id_art_guides
 * @property string $names
 * @property string $last_name1
 * @property string $last_name2
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property ArticlesGuides $idArtGuides
 */
class ArtGuidesAuthor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'art_guides_author';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_art_guides', 'required'),
			array('id_art_guides, position', 'numerical', 'integerOnly'=>true),
			array('names', 'length', 'max'=>30),
			array('last_name1, last_name2', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_art_guides, names, last_name1, last_name2, position', 'safe', 'on'=>'search'),
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
			'idArtGuides' => array(self::BELONGS_TO, 'ArticlesGuides', 'id_art_guides'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_art_guides' => 'Id Art Guides',
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
		$criteria->compare('id_art_guides',$this->id_art_guides);
		$criteria->compare('names',$this->names,true);
		$criteria->compare('last_name1',$this->last_name1,true);
		$criteria->compare('last_name2',$this->last_name2,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArtGuidesAuthor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
