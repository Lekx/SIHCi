<?php

/**
 * This is the model class for table "docs_identity".
 *
 * The followings are the available columns in table 'docs_identity':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $type
 * @property string $description
 * @property string $doc_id
 * @property integer $is_Primary
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
 */
class DocsIdentity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'docs_identity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum', 'required'),
			array('id_curriculum, is_Primary', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>20),
			array('description', 'length', 'max'=>250),
			array('doc_id', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, type, description, doc_id, is_Primary', 'safe', 'on'=>'search'),
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
			'type' => 'Nombre del Documento',
			'description' => 'Descripción',
			'doc_id' => 'Documento',
			'is_Primary' => 'Is Primary',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('doc_id',$this->doc_id,true);
		$criteria->compare('is_Primary',$this->is_Primary);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DocsIdentity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
