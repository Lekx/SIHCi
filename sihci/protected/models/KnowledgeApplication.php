<?php

/**
 * This is the model class for table "knowledge_application".
 *
 * The followings are the available columns in table 'knowledge_application':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $term1
 * @property string $term2
 * @property string $term3
 * @property string $term4
 * @property string $term5
 */
class KnowledgeApplication extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'knowledge_application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, term1, term2, term3, term4, term5', 'required'),
			array('id_curriculum', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, term1, term2, term3, term4, term5', 'safe', 'on'=>'search'),
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
			'term1' => 'Pregunta 1',
			'term2' => 'Pregunta 2',
			'term3' => 'Pregunta 3',
			'term4' => 'Pregunta 4',
			'term5' => 'Pregunta 5',
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
		$criteria->compare('term1',$this->term1,true);
		$criteria->compare('term2',$this->term2,true);
		$criteria->compare('term3',$this->term3,true);
		$criteria->compare('term4',$this->term4,true);
		$criteria->compare('term5',$this->term5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KnowledgeApplication the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

   
}
