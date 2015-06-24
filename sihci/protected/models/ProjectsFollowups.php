<?php

/**
 * This is the model class for table "projects_followups".
 *
 * The followings are the available columns in table 'projects_followups':
 * @property integer $id
 * @property integer $id_project
 * @property integer $id_user
 * @property string $followup
 * @property string $url_doc
 *
 * The followings are the available model relations:
 * @property Projects $idProject
 * @property Users $idUser
 */
class ProjectsFollowups extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects_followups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_project, id_user, followup', 'required'),
			array('id_project, id_user', 'numerical', 'integerOnly'=>true),
			array('url_doc', 'length', 'max'=>150),
			array('url_doc','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'on'=>'insert','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_project, id_user, followup, url_doc', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
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
			'id_user' => 'Id User',
			'followup' => 'Followup',
			'url_doc' => 'Url Doc',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('followup',$this->followup,true);
		$criteria->compare('url_doc',$this->url_doc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProjectsFollowups the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
