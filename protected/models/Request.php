<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property integer $id_request
 * @property string $code
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property string $date
 * @property integer $company_id
 * @property string $letter_date
 * @property string $letter_code
 * @property string $letter_subject
 * @property string $letter_attachment
 * @property string $disposition_letter
 * @property integer $disposition_to
 * @property string $disposition_date
 * @property integer $color
 * @property integer $status
 */
class Request extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('code, created_date, created_id, update_date, update_id, date, company_id, letter_date, letter_code, letter_subject, letter_attachment, status', 'required'),
			array('code, created_date, created_id, date, company_id, letter_date, letter_code, letter_subject, letter_attachment', 'required','on'=>'create'),
			array('code, update_id, update_date, date, company_id, letter_date, letter_code, letter_subject, letter_attachment', 'required','on'=>'update'),
			array('created_id, update_id, company_id, status, disposition_to', 'numerical', 'integerOnly'=>true),
			array('code, disposition_date', 'length', 'max'=>50),
			array('letter_code', 'length', 'max'=>255),
			array('letter_subject', 'length', 'max'=>150),
			array('color', 'length', 'max'=>8),
			array('letter_attachment, disposition_letter', 'length', 'max'=>255),
			array('code','unique'),

			array('letter_attachment, disposition_letter', 'length', 'max' => 255, 'tooLong' => '{attribute} is too long (max {max} chars).', 'on' => 'create'),
			array('letter_attachment, disposition_letter', 'file', 'types' => 'pdf, doc, docx', 'allowEmpty'=>true,'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'Ukuran File Tidak Boleh Melebihi 50 Mb', 'on' => 'create'),
			array('disposition_letter', 'file', 'types' => 'pdf, doc, docx', 'allowEmpty'=>true,'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'Ukuran File Tidak Boleh Melebihi 50 Mb', 'on' => 'disposition'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_request, code, created_date, created_id, update_date, update_id, date, company_id, letter_date, letter_code, letter_subject, letter_attachment, status', 'safe', 'on'=>'search'),
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
			'Company'=>array(self::BELONGS_TO,'Company','company_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_request' => 'Kode Permohonan',
			'code' => 'Nomor Disposisi',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diperbaharui Oleh',
			'date' => 'Tanggal Masuk',
			'company_id' => 'Perusahaan',
			'letter_date' => 'Tanggal Surat',
			'letter_code' => 'Nomor Surat',
			'letter_subject' => 'Perihal',
			'letter_attachment' => 'Surat Permohonan',
			'disposition_letter' => 'Surat Disposisi',
			'disposition_to' => 'Disposisi Ke',
			'disposition_date' => 'Tanggal Disposisi',
			'color' => 'Warna',
			'status' => 'Status',
			'company_address' => 'Alamat Perusahaan',
			'company_email' => 'Email',
			'company_contact' => 'Kontak',
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

		$criteria->compare('id_request',$this->id_request);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('letter_date',$this->letter_date,true);
		$criteria->compare('letter_code',$this->letter_code,true);
		$criteria->compare('letter_subject',$this->letter_subject,true);
		$criteria->compare('letter_attachment',$this->letter_attachment,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Request the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function status($data){
		if($data==1){
			return "Aktif";
		}else{
			return "Tidak Aktif";
		}
	}

	public function history($data){
		if($data==1){
			return "Permohonan";
		}else if($data==2){
			return "Disposisi";
		}else if($data==3){
			return "Surat Tanggapan";
		}else if($data==4){
			return "Invoice & SPK";
		}else if($data==5){
			return "Kuitansi";
		}else if($data==6){
			return "Laporan Dikirim";
		}else if($data==7){
			return "Laporan Diterima";
		}else{
			return "-";
		}
	}	

	public static function getDisposition($data){
		$sql = "
		SELECT r.id_request, r.letter_date, r.letter_subject, r.letter_code, r.created_date, c.name, u.image 
		FROM request as r
		LEFT JOIN company as c ON r.company_id=c.id_company 
		LEFT JOIN users as u ON r.created_id=u.id_user
		WHERE r.status=".$data." ORDER BY r.id_request DESC LIMIT 6";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public static function countDisposision($data){
		$sql = "SELECT count(id_request) as total FROM request WHERE status=".$data;
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public function rupiah($data){
		return "Rp. " . Yii::app()->numberFormatter->format("###,###,###",$data);
	}


	public function timeNull($data){
		if($data=="01-01-1970"){
			return "-";
		}else{
			return $data;
		}
	}

	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	

}
