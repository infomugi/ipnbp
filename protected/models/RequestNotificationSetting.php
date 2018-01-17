<?php

/**
 * This is the model class for table "request_notification_setting".
 *
 * The followings are the available columns in table 'request_notification_setting':
 * @property integer $id_notification_setting
 * @property integer $update_id
 * @property string $update_date
 * @property integer $disposition_reminder
 * @property integer $response_reminder
 * @property integer $invoice_reminder
 * @property integer $report_reminder
 * @property integer $report_info_reminder
 * @property integer $report_send_reminder
 * @property integer $status
 * @property string $email
 * @property integer $send_email
 */
class RequestNotificationSetting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_notification_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('update_id, update_date, disposition_reminder, response_reminder, invoice_reminder, report_reminder, report_info_reminder, report_send_reminder, status', 'required'),
			array('email', 'length', 'max'=>255),
			array('update_id, disposition_reminder, response_reminder, invoice_reminder, report_reminder, report_info_reminder, report_send_reminder, status, send_email', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_notification_setting, update_id, update_date, disposition_reminder, response_reminder, invoice_reminder, report_reminder, report_info_reminder, report_send_reminder, status', 'safe', 'on'=>'search'),
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
			'id_notification_setting' => 'Id Notification Setting',
			'update_id' => 'Update',
			'update_date' => 'Update Date',
			'disposition_reminder' => 'Reminder Disposisi',
			'response_reminder' => 'Reminder Surat Tanggapan',
			'invoice_reminder' => 'Reminder Invoice & SPK',
			'report_reminder' => 'Reminder Laporan',
			'report_info_reminder' => 'Reminder Info Laporan',
			'report_send_reminder' => 'Reminder Kirim Laporan',
			'status' => 'Status',
			'email' => 'Alamat Email Penerima',
			'send_email' => 'Kirim Notifikasi ke Email',
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

		$criteria->compare('id_notification_setting',$this->id_notification_setting);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('disposition_reminder',$this->disposition_reminder);
		$criteria->compare('response_reminder',$this->response_reminder);
		$criteria->compare('invoice_reminder',$this->invoice_reminder);
		$criteria->compare('report_reminder',$this->report_reminder);
		$criteria->compare('report_info_reminder',$this->report_info_reminder);
		$criteria->compare('report_send_reminder',$this->report_send_reminder);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestNotificationSetting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
