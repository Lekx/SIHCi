<?php

/**
 * This is the model class for table "projects_committee".
 *
 * The followings are the available columns in table 'projects_committee':
 * @property integer $id
 * @property integer $id_project
 * @property integer $id_user_designator
 * @property integer $id_user_reviewer
 * @property string $status
 * @property string $committee
 * @property string $creation_date
 * @property string $revision_date
 *
 * The followings are the available model relations:
 * @property Projects $idProject
 * @property Addresses $idUserDesignator
 * @property Users $idUserReviewer
 */
class ProjectsCommittee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects_committee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_project, id_user_designator, id_user_reviewer, committee', 'required'),
			array('id_project, id_user_designator, id_user_reviewer', 'numerical', 'integerOnly'=>true),
			array('status, committee', 'length', 'max'=>20),
			array('creation_date, revision_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_project, id_user_designator, id_user_reviewer, status, committee, creation_date, revision_date', 'safe', 'on'=>'search'),
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
			'idProject' => array(self::BELONGS_TO, 'Projects', 'id_project'),
			'idUserDesignator' => array(self::BELONGS_TO, 'Addresses', 'id_user_designator'),
			'idUserReviewer' => array(self::BELONGS_TO, 'Users', 'id_user_reviewer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_project' => 'Id Project',
			'id_user_designator' => 'Id User Designator',
			'id_user_reviewer' => 'Id User Reviewer',
			'status' => 'Status',
			'committee' => 'Committee',
			'creation_date' => 'Creation Date',
			'revision_date' => 'Revision Date',
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
		$criteria->compare('id_project',$this->id_project);
		$criteria->compare('id_user_designator',$this->id_user_designator);
		$criteria->compare('id_user_reviewer',$this->id_user_reviewer);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('committee',$this->committee,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('revision_date',$this->revision_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProjectsCommittee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
