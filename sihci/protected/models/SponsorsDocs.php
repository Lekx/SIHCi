<?php

/**
 * This is the model class for table "sponsors_docs".
 *
 * The followings are the available columns in table 'sponsors_docs':
 * @property integer $id
 * @property integer $id_sponsor
 * @property string $file_name
 * @property string $path
 *
 * The followings are the available model relations:
 * @property Sponsors $idSponsor
 */
class SponsorsDocs extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'sponsors_docs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sponsor, file_name, path', 'required'),
			array('id_sponsor', 'numerical', 'integerOnly' => true),
			array('file_name, path', 'length', 'max' => 150),
			array('path', 'file', 'on' => 'update', 'allowEmpty' => false,
			'types' => 'pdf, doc, docx, odt, jpg, jpeg, png',
			'maxSize' => array(1024 * 2000),
			'message' => 'Solo se admiten archivos pdf, doc, docx, odt, jpg, jpeg, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_sponsor, file_name, path', 'safe', 'on' => 'search'))
		;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idSponsor' => array(self::BELONGS_TO, 'Sponsors', 'id_sponsor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'id_sponsor' => 'Id Sponsor',
			'file_name' => 'Nombre del archivo',
			'path' => 'Ruta',
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
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_sponsor', $this->id_sponsor);
		$criteria->compare('file_name', $this->file_name, true);
		$criteria->compare('path', $this->path, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SponsorsDocs the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
