<?php

/**
 * This is the model class for table "press_notes".
 *
 * The followings are the available columns in table 'press_notes':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $type
 * @property string $directed_to
 * @property string $date
 * @property string $title
 * @property string $responsible_agency
 * @property string $note
 * @property string $is_national
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Curriculum $idCurriculum
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
			array('type, directed_to, title, responsible_agency, is_national', 'length', 'max'=>45),
			array('date, note, creation_date', 'safe'),
			array('date','compare','compareValue'=> date('d/m/Y'),'operator'=>'<='),	
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, type, directed_to, date, title, responsible_agency, note, is_national, creation_date', 'safe', 'on'=>'search'),
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
			'id_curriculum' => 'Id curriculum',
			'type' => 'Tipo de participación',
			'directed_to' => 'Dirigido a ',
			'date' => 'Fecha de publicación',
			'title' => 'Título de la publicación',
			'responsible_agency' => 'Dependencia responsable',
			'note' => 'Nota periodistica',
			'is_national' => 'Tipo de publicación',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('directed_to',$this->directed_to,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('responsible_agency',$this->responsible_agency,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('is_national',$this->is_national,true);
		$criteria->compare('creation_date',$this->creation_date,true);

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
	
	protected function beforeSave()
    {
			$this->date = DateTime::createFromFormat('d/m/Y', $this->date)->format('Y-m-d');
        	return parent::beforeSave();
    }

   	protected function afterFind()
    {
       		$this->date = DateTime::createFromFormat('Y-m-d', $this->date)->format('d/m/Y');
     		return parent::afterFind();
    }
}
