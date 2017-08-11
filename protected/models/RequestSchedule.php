<?php

/**
 * This is the model class for table "request_schedule".
 *
 * The followings are the available columns in table 'request_schedule':
 * @property integer $id_schedule
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property string $task
 * @property double $cost
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $note
 * @property integer $testing_number
 * @property integer $testing_id
 * @property string $file
 * @property integer $request_id
 * @property integer $status
 */
class RequestSchedule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('created_date, created_id, update_date, update_id, task, cost, start_date, end_date, description, note, testing_number, testing_id, file, request_id, status', 'required'),
			array('created_date, created_id, task, cost, start_date, end_date, description, note, testing_number, testing_id, request_id, status', 'required','on'=>'create'),
			array('update_date, update_id,', 'required','on'=>'update'),
			array('created_id, update_id, testing_number, testing_id, request_id, status', 'numerical', 'integerOnly'=>true),
			array('cost', 'numerical'),
			array('task, file', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_schedule, created_date, created_id, update_date, update_id, task, cost, start_date, end_date, description, note, testing_number, testing_id, file, request_id, status', 'safe', 'on'=>'search'),
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
			'id_schedule' => 'Schedule ID',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diperbaharui Oleh',
			'task' => 'Nama Kegiatan',
			'cost' => 'Biaya',
			'start_date' => 'Tanggal Mulai',
			'end_date' => 'Tanggal Berakhir',
			'description' => 'Keterangan',
			'note' => 'Catatan',
			'testing_number' => 'Pengujian Ke-',
			'testing_id' => 'Tahapan Pengujian',
			'file' => 'File RAB',
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

		$criteria->compare('id_schedule',$this->id_schedule);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('task',$this->task,true);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('testing_number',$this->testing_number);
		$criteria->compare('testing_id',$this->testing_id);
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
	 * @return RequestSchedule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
