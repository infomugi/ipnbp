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
 * @property integer $testing_type
 * @property integer $testing_part
 * @property string $file
 * @property integer $request_id
 * @property integer $status
 * @property integer $status_schedule
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
			array('created_date, created_id, task, start_date, end_date, testing_number, testing_id, testing_type, request_id, status', 'required','on'=>'create'),
			array('update_date, update_id,', 'required','on'=>'update'),
			array('created_id, update_id, testing_number, testing_id, testing_type, request_id, status, testing_part, status_schedule', 'numerical', 'integerOnly'=>true),
			array('cost', 'numerical'),
			array('task, file, description, note', 'length', 'max'=>255),
			array('file', 'required','on'=>'upload'),
			array('file', 'file', 'types' => 'pdf, doc, docx, xls, xlsx', 'allowEmpty'=>true,'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'Ukuran File Tidak Boleh Melebihi 50 Mb', 'on' => 'upload'),
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
			'Request'=>array(self::BELONGS_TO,'Request','request_id'),
			'Testing'=>array(self::BELONGS_TO,'Testing','testing_type'),
			'Unit'=>array(self::BELONGS_TO,'Unit','testing_part'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_schedule' => 'Kode Penjadwalan',
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
			'testing_number' => 'Sample Ke-',
			'testing_id' => 'Jenis Pengujian',
			'testing_type' => 'Tipe Pengujian',
			'testing_part' => 'Balai',
			'file' => 'File RAB',
			'request_id' => 'Request',
			'status' => 'Status',
			'status_schedule' => 'Status Jadwal',
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
		$criteria->compare('testing_type',$this->testing_type);
		$criteria->compare('testing_part',$this->testing_part);
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

	public function testingNumber($data){
		if($data==1){
			return "Sample 1";
		}elseif($data==2){
			return "Sample 2";
		}elseif($data==3){
			return "Sample 3";
		}else{
			return "-";
		}
	}

	public function statusSchedule($data){
		if($data==1){
			return "Revisi";
		}elseif($data==2){
			return "Fix";
		}else{
			return "-";
		}
	}	

	public static function countDataTesting($type,$requestID)
	{
		$sql = "SELECT count(id_schedule) FROM request_schedule WHERE testing_type=".$type." AND request_id=".$requestID;
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryScalar();
	}	

	public static function countSchedule($type,$requestID,$status)
	{
		$sql = "
		SELECT
		count(rs.id_schedule)
		FROM
		request_schedule AS rs
		LEFT JOIN request_testing rt ON rs.testing_id = rt.id_testing
		LEFT JOIN ref_unit AS u ON u.id_unit = rt.testing_part
		WHERE u.id_unit=".$type." AND rs.request_id=".$requestID;
		$command = Yii::app()->db->createCommand($sql);
		$result = $command->queryScalar();

		if($status==1){

			if($result==0){
				return "Balai Belum Membuat Jadwal & RAB";
			}else{
				return "Terdapat ".$result." Data Jadwal & RAB";
			}

		}else{

			if($result==0){
				return "Balai Belum Menentukan Tahapan Pengujian, Jadwal & RAB";
			}else{
				return "Terdapat ".$result." Data Jadwal & RAB";
			}

		}
	}		


	public function status($data){
		if($data==1){
			return "Start";
		}elseif($data==2){
			return "On Progress";
		}elseif($data==3){
			return "Close";
		}else{
			return "-";
		}
	}


	public function unitSchedule($balai){
		$criteria = new CDbCriteria();
		$criteria->join='LEFT JOIN request_testing AS a ON a.id_testing=t.testing_id LEFT JOIN ref_unit AS u ON u.id_unit=a.testing_part';
		$criteria->condition = 't.status_schedule=:status_schedule AND u.id_unit=:unit';
		$criteria->params = array(':status_schedule'=>2,':unit'=>$balai);
		return RequestSchedule::model()->count($criteria);
	}

	public static function testingPeriode($requestID)
	{
		$start = "SELECT MIN(start_date) FROM request_schedule WHERE request_id=".$requestID;
		$end = "SELECT MAX(end_date) FROM request_schedule WHERE request_id=".$requestID;
		$startdate = Yii::app()->db->createCommand($start);
		$enddate = Yii::app()->db->createCommand($end);
		$mulai = $startdate->queryScalar();
		$berakhir = $enddate->queryScalar();

		if($mulai=="" && $berakhir==""){
			return "Jadwal Belum di Tentukan";
		}else{
			return Request::model()->date($mulai) . " s/d " . Request::model()->date($berakhir) . " - ( ".Request::model()->countMinute($mulai, $berakhir)." Hari ) ";
		}

	}	

	
}
