<?php

/**
 * This is the model class for table "request_response".
 *
 * The followings are the available columns in table 'request_response':
 * @property integer $id_response
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property string $letter_date
 * @property string $letter_code
 * @property string $letter_attachment
 * @property string $date_send
 * @property string $date_feedback
 * @property string $description
 * @property string $description_email
 * @property string $description_reject
 * @property string $confirmation_attachment
 * @property integer $confirmation_status
 * @property integer $request_id
 * @property integer $status
 */
class Response extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_response';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, created_id, request_id', 'required','on'=>'create'),
			array('update_id, update_date', 'required','on'=>'update'),
			array('created_id, update_id, request_id, status', 'numerical', 'integerOnly'=>true),
			array('letter_code, status', 'length', 'max'=>25),
			array('date_send, date_feedback, letter_date', 'length', 'max'=>35),
			array('letter_attachment, description, description_email, description_reject', 'length', 'max'=>255),

			array('letter_attachment, confirmation_attachment', 'file', 'types' => 'pdf, doc, docx, xls, xlsx, png, jpg, jpeg, rar, zip', 'allowEmpty'=>true,'maxSize' => 1024 * 1024 * 100, 'tooLarge' => 'Ukuran File Tidak Boleh Melebihi 100 Mb', 'on' => 'create'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_response, created_date, created_id, update_date, update_id, letter_date, letter_code, letter_attachment, date_send, date_feedback, description, request_id, status', 'safe', 'on'=>'search'),
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
			'CreatedBy'=>array(self::BELONGS_TO,'Users','created_id'),
			'UpdateBy'=>array(self::BELONGS_TO,'Users','update_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_response' => 'Response ID',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diupdate Oleh',
			'letter_date' => 'Tanggal Surat',
			'letter_code' => 'Nomor Surat',
			'letter_attachment' => 'File Surat Tanggapan',
			'date_send' => 'Tanggal Kirim',
			'date_feedback' => 'Tanggal Feedback',
			'description' => 'Catatan',
			'description_email' => 'Email Penolakan',
			'description_reject' => 'Alasan Penolakan',
			'request_id' => 'Permintaan ID',
			'status' => 'Status Tanggapan',
			'confirmation_status' => 'Status Konfirmasi',
			'confirmation_attachment' => 'File Lembar Konfirmasi',
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

		$criteria->compare('id_response',$this->id_response);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('letter_date',$this->letter_date,true);
		$criteria->compare('letter_code',$this->letter_code,true);
		$criteria->compare('letter_attachment',$this->letter_attachment,true);
		$criteria->compare('date_send',$this->date_send,true);
		$criteria->compare('date_feedback',$this->date_feedback,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return Response the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function status($a)
	{
		if($a==1)
			return "Diterima";
		else if($a==2)
			return "Ditolak";
		else 
			return "-";
	}	

	public function Reminder($expire){
		$sql = "
		SELECT
		r.id_request AS id,
		r.letter_code AS code,
		r.letter_subject AS subject,
		r.date AS date,
		datediff(CURDATE(), r.date) AS countDate,
		(
		SELECT
		count(id_response)
		FROM
		request_response
		WHERE
		request_id=r.id_request
		) AS totalTanggapan
		FROM
		request AS r
		LEFT JOIN company AS c ON r.company_id = c.id_company
		WHERE
		datediff(CURDATE(), r.date) >= ".$expire."
		AND (
		SELECT
		count(id_response)
		FROM
		request_response
		WHERE
		request_id = r.id_request
		) = 0
		";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}	

	public function ReminderInvoice(){
		$sql = "SELECT request_id FROM request_invoice GROUP BY request_id";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public function ReminderResponse($expire){
		$sql = "
		SELECT r.id_request AS id, r.letter_code AS code, r.letter_subject AS subject,  DATE_FORMAT(rr.created_date, '%Y-%m-%d') AS date, rr.letter_code, datediff(CURDATE(), rr.created_date) AS countDate FROM `request_response` as rr LEFT JOIN request as r ON rr.request_id=r.id_request WHERE rr.status=1 AND (SELECT count(id_invoice) FROM request_invoice WHERE request_id=r.id_request )=0 AND datediff(CURDATE(), rr.created_date) >= ".$expire."
		";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}		

}
