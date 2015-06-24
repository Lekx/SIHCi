<?php
/**
 * This is the model class for table "system_log".
 *
 * The followings are the available columns in table 'system_log':
 * @property integer $id
 * @property integer $id_user
 * @property string $section
 * @property string $details
 * @property string $action
 * @property string $datetime
 *
 * The followings are the available model relations:
 * @property Users $idUser
 */
class SystemLog extends CActiveRecord {
	/**
	 * @return string the associated database table name
	 */
	public $searchValue;
	public function tableName() {
		return 'system_log';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, section, details, action, datetime', 'required'),
			array('id_user', 'numerical', 'integerOnly' => true),
			array('section', 'length', 'max' => 60),
			array('details', 'length', 'max' => 150),
			array('action', 'length', 'max' => 250),
			array('searchValue','length', 'max'=>70),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, section, details, action, datetime, searchValue', 'safe', 'on' => 'search'),
		);
	}
	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'Número de Acción',
			'id_user' => 'Número de Usuario',
			'section' => 'Sección',
			'details' => 'Detalles',
			'action' => 'Acción',
			'datetime' => 'Fecha',
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
		if($this->searchValue)
		{
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR id_user LIKE CONCAT('%', :searchValue ,'%') OR section LIKE CONCAT('%', :searchValue , '%') OR details LIKE CONCAT('%', :searchValue , '%')OR action LIKE CONCAT('%', :searchValue , '%')OR datetime LIKE CONCAT('%', :searchValue , '%') ");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}
		// $criteria->compare('id', $this->id);
		// $criteria->compare('id_user', $this->id_user);
		// $criteria->compare('section', $this->section, true);
		// $criteria->compare('details', $this->details, true);
		// $criteria->compare('action', $this->action, true);
		// $criteria->compare('datetime', $this->datetime, true);
		$_SESSION['filteredData'] = new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => false,
		));
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SystemLog the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

/* checar con saul este error
	protected function beforeSave(){
	$this->datetime = DateTime::createFromFormat('d/m/Y H:i:s', $this->datetime)->format('Y-m-d H:i:s');
	return parent::beforeSave();
	}

	protected function afterFind(){
	$this->datetime = DateTime::createFromFormat('Y-m-d H:i:s', $this->datetime)->format('d/m/Y H:i:s');
	return parent::beforeSave();
	}*/
}






