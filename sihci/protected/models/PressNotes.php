<?php

/**
 * This is the model class for table "press_notes".
 *
 * The followings are the available columns in table 'press_notes':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $url_doc
 * @property string $type
 * @property string $directed_to
 * @property string $date
 * @property string $title
 * @property string $responsible_agency
 * @property string $notas_periodisticas
 * @property string $is_national
 */
class PressNotes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'press_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, title, is_national', 'required'),
			array('id_curriculum', 'numerical', 'integerOnly'=>true),
			array('url_doc, type, directed_to, title, responsible_agency, notas_periodisticas, is_national', 'length', 'max'=>45),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, url_doc, type, directed_to, date, title, responsible_agency, notas_periodisticas, is_national', 'safe', 'on'=>'search'),
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
			'url_doc' => 'Url Doc',
			'type' => 'Type',
			'directed_to' => 'Directed To',
			'date' => 'Date',
			'title' => 'Title',
			'responsible_agency' => 'Responsible Agency',
			'notas_periodisticas' => 'Notas Periodisticas',
			'is_national' => 'Is National',
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
		$criteria->compare('url_doc',$this->url_doc,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('directed_to',$this->directed_to,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('responsible_agency',$this->responsible_agency,true);
		$criteria->compare('notas_periodisticas',$this->notas_periodisticas,true);
		$criteria->compare('is_national',$this->is_national,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PressNotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
