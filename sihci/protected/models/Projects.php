<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property integer $id_curriculum
 * @property string $title
 * @property string $discipline
 * @property string $research_type
 * @property string $priority_topic
 * @property string $sub_topic
 * @property string $justify
 * @property integer $is_sni
 * @property string $develop_uh


 * @property string $participant_institutions

 * @property string $participant_institutions_international
 * @property string $colaboration_type
 * @property string $adtl_caracteristics_a
 * @property string $adtl_caracteristics_b
 * @property string $adtl_caracteristics_c
 * @property string $adtl_caracteristics_d
 * @property string $adtl_caracteristics_e
 * @property string $adtl_caracteristics_f
 * @property string $adtl_caracteristics_g
 * @property string $status
 * @property string $folio
 * @property integer $is_sponsored
 * @property string $registration_number
 *
 * The followings are the available model relations:
 * @property DesignatedCommittees[] $designatedCommittees
 * @property Curriculum $idCurriculum
 * @property ProjectsCoworkers[] $projectsCoworkers
 * @property ProjectsDocs[] $projectsDocs
 * @property ProjectsFollowups[] $projectsFollowups
 * @property SponsoredProjects[] $sponsoredProjects
 */
class Projects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $searchValue;

	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curriculum, title, discipline, research_type, priority_topic, sub_topic, justify, is_sni, folio', 'required'),
			array('id_curriculum, is_sni, is_sponsored', 'numerical', 'integerOnly'=>true),
			array('title, research_type', 'length', 'max'=>250),
			array('discipline, priority_topic, sub_topic', 'length', 'max'=>100),
			array('develop_uh', 'length', 'max'=>50),
			array('colaboration_type', 'length', 'max'=>150),
			array('status, folio, registration_number', 'length', 'max'=>20),
			array('participant_institutions, participant_institutions_international, adtl_caracteristics_a, adtl_caracteristics_b, adtl_caracteristics_c, adtl_caracteristics_d, adtl_caracteristics_e, adtl_caracteristics_f, adtl_caracteristics_g', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_curriculum, title, discipline, research_type, priority_topic, sub_topic, justify, is_sni, develop_uh, participant_institutions, participant_institutions_international, colaboration_type, adtl_caracteristics_a, adtl_caracteristics_b, adtl_caracteristics_c, adtl_caracteristics_d, adtl_caracteristics_e, adtl_caracteristics_f, adtl_caracteristics_g, status, folio, is_sponsored, registration_number, searchValue', 'safe', 'on'=>'search'),
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
			'designatedCommittees' => array(self::HAS_MANY, 'DesignatedCommittees', 'id_project'),
			'idCurriculum' => array(self::BELONGS_TO, 'Curriculum', 'id_curriculum'),
			'projectsCoworkers' => array(self::HAS_MANY, 'ProjectsCoworkers', 'id_project'),
			'projectsDocs' => array(self::HAS_MANY, 'ProjectsDocs', 'id_project'),
			'projectsFollowups' => array(self::HAS_MANY, 'ProjectsFollowups', 'id_project'),
			'sponsoredProjects' => array(self::HAS_MANY, 'SponsoredProjects', 'id_project'),
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
			'title' => 'Título del proyecto',
			'discipline' => 'Disciplina del proyecto',
			'research_type' => 'Tipo de investigación',
			'priority_topic' => 'Tema prioritario',
			'sub_topic' => 'Sub tema prioritario',
			'justify' => 'Justificación para el tema seleccionado',
			'is_sni' => 'Es SNI?',
			'develop_uh' => 'Unidad hospitalaria',

			'participant_institutions' => 'Instituciones nacionales participantes',

			'participant_institutions_international' => 'Instituciones internacionales participantes',
			'colaboration_type' => 'Tipo de colaboracion',
			'adtl_caracteristics_a' => 'Adtl Caracteristicas A',
			'adtl_caracteristics_b' => 'Adtl Caracteristicas B',
			'adtl_caracteristics_c' => 'Adtl Caracteristicas C',
			'adtl_caracteristics_d' => 'Adtl Caracteristicas D',
			'adtl_caracteristics_e' => 'Adtl Caracteristicas E',
			'adtl_caracteristics_f' => 'Adtl Caracteristicas F',
			'adtl_caracteristics_g' => 'Adtl Caracteristicas G',
			'status' => 'Estatus',
			'folio' => 'Folio',
			'is_sponsored' => '¿Patrocinado?',
			'registration_number' => 'Número de registro',
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
			$criteria->addCondition("id LIKE CONCAT('%', :searchValue , '%') OR is_sponsored LIKE CONCAT('%', :searchValue ,'%') OR title LIKE CONCAT('%', :searchValue ,'%')OR discipline LIKE CONCAT('%', :searchValue , '%') OR develop_uh LIKE CONCAT('%', :searchValue , '%') OR folio LIKE CONCAT('%', :searchValue , '%') OR registration_number LIKE CONCAT('%', :searchValue , '%') OR status LIKE CONCAT('%', :searchValue , '%') ");
			$criteria->params = array('searchValue'=>$this->searchValue);
		}

		/*$criteria->compare('id',$this->id);
		$criteria->compare('id_curriculum',$this->id_curriculum);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('research_type',$this->research_type,true);
		$criteria->compare('priority_topic',$this->priority_topic,true);
		$criteria->compare('sub_topic',$this->sub_topic,true);
		$criteria->compare('justify',$this->justify,true);
		$criteria->compare('is_sni',$this->is_sni);
		$criteria->compare('develop_uh',$this->develop_uh,true);

		$criteria->compare('participant_institutions',$this->participant_institutions,true);

		$criteria->compare('participant_institutions_international',$this->participant_institutions_international,true);
		$criteria->compare('colaboration_type',$this->colaboration_type,true);
		$criteria->compare('adtl_caracteristics_a',$this->adtl_caracteristics_a,true);
		$criteria->compare('adtl_caracteristics_b',$this->adtl_caracteristics_b,true);
		$criteria->compare('adtl_caracteristics_c',$this->adtl_caracteristics_c,true);
		$criteria->compare('adtl_caracteristics_d',$this->adtl_caracteristics_d,true);
		$criteria->compare('adtl_caracteristics_e',$this->adtl_caracteristics_e,true);
		$criteria->compare('adtl_caracteristics_f',$this->adtl_caracteristics_f,true);
		$criteria->compare('adtl_caracteristics_g',$this->adtl_caracteristics_g,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('folio',$this->folio,true);
		$criteria->compare('is_sponsored',$this->is_sponsored);
		$criteria->compare('registration_number',$this->registration_number,true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
