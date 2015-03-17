<?php

class PostdegreeGraduates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
	public function tableName()
	{
		return 'postdegree_graduates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
	public function rules()
	{
		
		return array(
			array('id_curriculum, fullname', 'required'),
			array('id_curriculum', 'numerical','integerOnly'=>true),
			array('fullname', 'length', 'max'=>70),
		    array('id, id_curriculum, fullname', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		
		return array(
					
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_curriculum' => 'Id Curriculum',
			'fullname' => 'Nombre Completo del graduado',
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
				
		$criteria = new CDbCriteria;	
		$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('fullname',$this->fullname);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	


}
