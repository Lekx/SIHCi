<?php
/**
 * This is the model class for table "files_manager".
 *
 * The followings are the available columns in table 'files_manager':
 * @property integer $id
 * @property string $section
 * @property string $file_name
 * @property string $path
 * @property string $start_date
 * @property string $end_date
 */

class FilesManager extends CActiveRecord
{
	
	public function tableName()
	{
		return 'files_manager';
	}

	public function rules()
	{
		return array(
			array('section, file_name, path, start_date, end_date', 'required'),
			array('section', 'length', 'max'=>100),
			array('file_name', 'length', 'max'=>100),
			array('path, safe','file','allowEmpty'=>true, 'on'=>'create',
				   'types'=>'pdf,PDF',
			       'message'=>'Solo se admiten archivos pdf, doc, docx, odt, jpg, jpeg, png'),		
			array('path', 'length', 'max'=>250),
			array('id, section, file_name, path, start_date, end_date', 'safe', 'on'=>'search'),
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
			'section' => 'Seccion',
			'file_name' => 'Nombre archivo',
			'path' => 'Ruta',
			'start_date' => 'Fecha Inicio',
			'end_date' => 'Fecha de final',
		);
	}

	
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('section',$this->section,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	protected function beforeSave()
    {

			$this->start_date = DateTime::createFromFormat('d/m/Y', $this->start_date)->format('Y-m-d H:i:s');
	        $this->end_date = DateTime::createFromFormat('d/m/Y H:i:s', $this->end_date)->format('Y-m-d H:i:s');
        	return parent::beforeSave();
    }

    	protected function afterFind()
    {
  
       		$this->start_date = DateTime::createFromFormat('Y-m-d H:i:s', $this->start_date)->format('d/m/Y');
        	$this->end_date = DateTime::createFromFormat('Y-m-d H:i:s', $this->end_date)->format('d/m/Y');
     		return parent::afterFind();
    }
}
