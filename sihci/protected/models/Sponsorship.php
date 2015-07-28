<?php

/**
 * This is the model class for table "sponsorship".
 *
 * The followings are the available columns in table 'sponsorship':
 * @property integer $id
 * @property integer $id_user_sponsorer
 * @property integer $id_user_researcher
 * @property string $project_name
 * @property string $description
 * @property string $keywords
 * @property string $status
 * @property string $creation_date
 * @property string $doc_commitment
 * @property string $doc_auth_cofepris
 * @property string $doc_project
 * @property string $doc_brochure
 * @property string $doc_consent
 * @property string $doc_amendment
 * @property string $doc_bank_payment
 * @property string $doc_edu_guides
 * @property string $doc_project_dev_guides
 * @property string $doc_recruitment
 * @property string $doc_conclusion_criteria
 * @property string $doc_confidentiality
 * @property string $doc_interests_conflict
 * @property string $doc_patient_payment
 * @property string $doc_participants
 *
 *
 * The followings are the available model relations:
 * @property SponsoredProjects[] $sponsoredProjects
 * @property Users $idUserSponsorer
 * @property Users $idUserResearcher
 */
class Sponsorship extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $searchValue;

	public function tableName()
	{
		return 'sponsorship';
	}

//doc_auth_cofepris, doc_edu_guides, doc_project_dev_guides, doc_recruitment, doc_conclusion_criteria,


//doc_commitment, doc_project, doc_brochure, doc_consent, doc_amendment, doc_bank_payment, doc_confidentiality, doc_interests_conflict, doc_patient_payment, doc_participants

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user_sponsorer, id_user_researcher, keywords', 'required'),
			array('id_user_sponsorer, id_user_researcher', 'numerical', 'integerOnly'=>true),
			array('project_name', 'length', 'max'=>250),
			array('description', 'length', 'max'=>500),
			array('keywords, doc_auth_cofepris, doc_edu_guides, doc_project_dev_guides, doc_recruitment, doc_conclusion_criteria, doc_commitment, doc_project, doc_brochure, doc_consent, doc_amendment, doc_bank_payment, doc_confidentiality, doc_interests_conflict, doc_patient_payment, doc_participants', 'length', 'max'=>150),
			array('status', 'length', 'max'=>20),
			array('creation_date', 'safe'),
			array('doc_auth_cofepris, doc_edu_guides, doc_project_dev_guides, doc_recruitment, doc_conclusion_criteria','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'allowEmpty'=>true,'on'=>'insert', 'safe' => false,  'maxSize'=>1024 * 1024 * 5),
			array('doc_commitment, doc_project, doc_brochure, doc_consent, doc_amendment, doc_bank_payment, doc_confidentiality, doc_interests_conflict, doc_patient_payment, doc_participants','file','types'=>'pdf, doc, docx, odt, jpg, jpeg, png', 'allowEmpty'=>false,'on'=>'insert', 'safe' => false,  'maxSize'=>1024 * 1024 * 5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user_sponsorer, id_user_researcher, project_name, description, keywords, status, creation_date, doc_commitment, doc_auth_cofepris, doc_project, doc_brochure, doc_consent, doc_amendment, doc_bank_payment, doc_edu_guides, doc_project_dev_guides, doc_recruitment, doc_conclusion_criteria, doc_confidentiality, doc_interests_conflict, doc_patient_payment, doc_participants', 'safe', 'on'=>'search'),
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
			'sponsoredProjects' => array(self::HAS_MANY, 'SponsoredProjects', 'id_sponsorship'),
			'idUserSponsorer' => array(self::BELONGS_TO, 'Users', 'id_user_sponsorer'),
			'idUserResearcher' => array(self::BELONGS_TO, 'Users', 'id_user_researcher'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user_sponsorer' => 'Empresa que patrocina',
			'id_user_researcher' => 'Investigador a patrocinar',
			'project_name' => 'Nombre del proyecto',
			'description' => 'Descripción',
			'keywords' => 'Palabras clave',
			'status' => 'Estatus',
			'creation_date' => 'Creation Date',
			'doc_commitment' => 'Contrato con investigador',
			'doc_auth_cofepris' => 'Aut. por el estudio clínico de COFEPRIS',
			'doc_project' => 'Proyecto',
			'doc_brochure' => 'Brochure del producto',
			'doc_consent' => 'Consentimiento informado',
			'doc_amendment' => 'Enmiendas',
			'doc_bank_payment' => 'Comprobante de pago bancario',
			'doc_edu_guides' => 'Guías educativas para parcientes',
			'doc_project_dev_guides' => 'Guías para el desarrollo del proyecto',
			'doc_recruitment' => 'Material de difusión para reclutamiento',
			'doc_conclusion_criteria' => 'Criterios de inclusión y no inclusión',
			'doc_confidentiality' => 'Acuerdo de confidencialidad',
			'doc_interests_conflict' => 'Declaración de conflicto de intereses',
			'doc_patient_payment' => 'Tabulador de pago por paciente incluido',
			'doc_participants' => 'Lista de pacientes participantes',
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

		if($this->searchValue)
		{
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR project_name LIKE CONCAT('%', :searchValue ,'%') OR description LIKE CONCAT('%', :searchValue ,'%') OR status LIKE CONCAT('%', :searchValue ,'%') ");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}

		/*$criteria->compare('id',$this->id);
		$criteria->compare('id_user_sponsorer',$this->id_user_sponsorer);
		$criteria->compare('id_user_researcher',$this->id_user_rx|esearcher);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('status',$this->status);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	//Customized search only for logged user
	public function customSearch()
	{
		$criteria=new CDbCriteria;
		$curriculumId = Users::model()->findByPk(Yii::app()->user->id)->curriculums[0]['id'];
		$criteria->condition='id_user_researcher = '.$curriculumId;
		$criteria->order = 'id DESC';
		if($this->searchValue)
		{
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR project_name LIKE CONCAT('%', :searchValue ,'%') OR description LIKE CONCAT('%', :searchValue ,'%') OR status LIKE CONCAT('%', :searchValue ,'%') ");
			//$criteria->addCondition("book_title LIKE CONCAT('%', :searchValue , '%') OR  publisher LIKE CONCAT('%', :searchValue , '%') OR volume LIKE CONCAT('%', :searchValue ,'%') OR isbn LIKE CONCAT('%', :searchValue , '%') OR edition LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		//Customized search only for logged users when they are sponsors
	public function customSearchSponsorship()
	{
		$criteria=new CDbCriteria;
		$curriculumId = Curriculum::model()->findByAttributes(array('id_user'=>Yii::app()->user->id))->id;

		$criteria->condition='id_user_sponsorer = '.$curriculumId;
		$criteria->order = 'id DESC';
		if($this->searchValue)
		{
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR project_name LIKE CONCAT('%', :searchValue ,'%') OR description LIKE CONCAT('%', :searchValue ,'%') OR status LIKE CONCAT('%', :searchValue ,'%') ");
			//$criteria->addCondition("book_title LIKE CONCAT('%', :searchValue , '%') OR  publisher LIKE CONCAT('%', :searchValue , '%') OR volume LIKE CONCAT('%', :searchValue ,'%') OR isbn LIKE CONCAT('%', :searchValue , '%') OR edition LIKE CONCAT('%', :searchValue , '%')");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sponsorship the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
