<?php

/**
 * This is the model class for table "request_report".
 *
 * The followings are the available columns in table 'request_report':
 * @property integer $id_report
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property string $upload_date
 * @property string $accept_date
 * @property string $description
 * @property string $file
 * @property integer $request_id
 * @property integer $status
 */
class RequestReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, created_id, request_id, status', 'required','on'=>'create'),
			array('created_id, update_id, request_id, status', 'numerical', 'integerOnly'=>true),
			array('file, description, update_date, upload_date, accept_date', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_report, created_date, created_id, update_date, update_id, upload_date, accept_date, description, file, request_id, status', 'safe', 'on'=>'search'),
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
			'id_report' => 'Id Report',
			'created_date' => 'Created Date',
			'created_id' => 'Created',
			'update_date' => 'Update Date',
			'update_id' => 'Update',
			'upload_date' => 'Tanggal Upload',
			'accept_date' => 'Tanggal Laporan di Terima',
			'description' => 'Catatan',
			'file' => 'File Laporan',
			'request_id' => 'Request',
			'status' => 'Status',
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

		$criteria->compare('id_report',$this->id_report);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('upload_date',$this->upload_date,true);
		$criteria->compare('accept_date',$this->accept_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	protected function beforeSave()
	{
		$this->upload_date = date('Y-m-d', strtotime($this->upload_date));
		$this->accept_date = date('Y-m-d', strtotime($this->accept_date));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->upload_date = date('d-m-Y', strtotime($this->upload_date));
		$this->accept_date = date('d-m-Y', strtotime($this->accept_date));
		return TRUE;
	}   
}
