<?php

/**
 * This is the model class for table "request_activity".
 *
 * The followings are the available columns in table 'request_activity':
 * @property integer $id_activity
 * @property string $activity_date
 * @property string $request_date
 * @property integer $approve_id
 * @property string $approve_date
 * @property integer $schedule_id
 * @property string $schedule_date 
 * @property integer $response_id
 * @property string $response_date
 * @property integer $invoice_id
 * @property string $invoice_date
 * @property integer $payment_id
 * @property string $payment_date
 * @property integer $report_send_id
 * @property string $report_send_date
 * @property integer $report_accept_id
 * @property string $report_accept_date
 * @property integer $request_id
 * @property integer $status
 */
class RequestActivity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('activity_date, request_date, approve_id, approve_date, response_id, response_date, invoice_id, invoice_date, payment_id, payment_date, report_send_id, report_send_date, report_accept_id, report_accept_date, request_id, status', 'required'),
			array('approve_id, response_id, schedule_id, invoice_id, payment_id, report_send_id, report_accept_id, request_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_activity, activity_date, request_date, approve_id, approve_date, response_id, response_date, invoice_id, invoice_date, payment_id, payment_date, report_send_id, report_send_date, report_accept_id, report_accept_date, request_id, status', 'safe', 'on'=>'search'),
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
			'id_activity' => 'Id Activity',
			'activity_date' => 'Activity Date',
			'request_date' => 'Request Date',
			'approve_id' => 'Approve',
			'approve_date' => 'Approve Date',
			'schedule_id' => 'Schedule',
			'schedule_date' => 'Schedule Date',			
			'response_id' => 'Response',
			'response_date' => 'Response Date',
			'invoice_id' => 'Invoice',
			'invoice_date' => 'Invoice Date',
			'payment_id' => 'Payment',
			'payment_date' => 'Payment Date',
			'report_send_id' => 'Report Send',
			'report_send_date' => 'Report Send Date',
			'report_accept_id' => 'Report Accept',
			'report_accept_date' => 'Report Accept Date',
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

		$criteria->compare('id_activity',$this->id_activity);
		$criteria->compare('activity_date',$this->activity_date,true);
		$criteria->compare('request_date',$this->request_date,true);
		$criteria->compare('approve_id',$this->approve_id);
		$criteria->compare('approve_date',$this->approve_date,true);
		$criteria->compare('response_id',$this->response_id);
		$criteria->compare('response_date',$this->response_date,true);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('invoice_date',$this->invoice_date,true);
		$criteria->compare('payment_id',$this->payment_id);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('report_send_id',$this->report_send_id);
		$criteria->compare('report_send_date',$this->report_send_date,true);
		$criteria->compare('report_accept_id',$this->report_accept_id);
		$criteria->compare('report_accept_date',$this->report_accept_date,true);
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
	 * @return RequestActivity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
