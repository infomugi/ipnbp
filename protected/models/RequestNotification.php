<?php

/**
 * This is the model class for table "request_notification".
 *
 * The followings are the available columns in table 'request_notification':
 * @property integer $id_notification
 * @property string $send_date
 * @property string $description
 * @property integer $type
 * @property integer $request_id
 */
class RequestNotification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('send_date, description, type, request_id', 'required'),
			array('type, request_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_notification, send_date, description, type, request_id', 'safe', 'on'=>'search'),
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
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_notification' => 'Id Notification',
			'send_date' => 'Tanggal Kirim',
			'description' => 'Keterangan',
			'type' => 'Jenis Reminder',
			'request_id' => 'Permohonan ID',
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

		$criteria->compare('id_notification',$this->id_notification);
		$criteria->compare('send_date',$this->send_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('request_id',$this->request_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestNotification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function log($description,$type,$requestid){
		$log=new RequestNotification;
		$log->send_date = date('Y-m-d H:i:s');
		$log->description = $description;
		$log->request_id = $requestid;
		$log->type = $type;
		$log->save();
	}

	public function nameReminder($type){
		if($type==1){
			return "Disposisi";
		}else if($type==2){
			return "Surat Jawaban";
		}else if($type==3){
			return "Invoice & SPK";
		}else if($type==4){
			return "Laporan";
		}else if($type==5){
			return "Reminder Info Laporan";
		}else if($type==6){
			return "Reminder Kirim";
		}else{
			return "Nama Pemberitahuan tidak Di Set";
		}
	}

}
