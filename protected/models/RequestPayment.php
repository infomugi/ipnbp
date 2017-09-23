<?php

/**
 * This is the model class for table "request_payment".
 *
 * The followings are the available columns in table 'request_payment':
 * @property integer $id_payment
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property string $code
 * @property string $date
 * @property integer $term
 * @property integer $total
 * @property string $file
 * @property integer $invoice_id
 * @property integer $request_id
 * @property integer $status
 * @property integer $print_by
 * @property string $print_date
 * @property integer $print_click 
 */
class RequestPayment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('created_date, created_id, update_date, update_id, code, date, term, total, file, invoice_id, request_id, status', 'required'),
			array('created_date, created_id, code, date, term, total, invoice_id, request_id, status', 'required','on'=>'create'),
			array('print_by, print_click, print_date', 'required','on'=>'print'),
			array('update_date, update_id', 'required','on'=>'update'),
			array('created_id, update_id, term, total, invoice_id, request_id, status, print_by, print_click', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>50),
			array('file', 'length', 'max'=>255),
			array('print_date', 'length', 'max'=>25),
			array('code','unique'),

			array('file', 'required','on'=>'upload'),
			array('file_payment', 'required','on'=>'upload_payment'),

			array('file', 'file', 'types' => 'pdf, doc, docx', 'allowEmpty'=>true,'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'Ukuran File Tidak Boleh Melebihi 50 Mb', 'on' => 'upload'),
			array('file_payment', 'file', 'types' => 'pdf, doc, docx', 'allowEmpty'=>true,'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'Ukuran File Tidak Boleh Melebihi 50 Mb', 'on' => 'upload_payment'),			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_payment, created_date, created_id, update_date, update_id, code, date, term, total, file, invoice_id, request_id, status', 'safe', 'on'=>'search'),
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
			'Invoice'=>array(self::BELONGS_TO,'RequestInvoice','invoice_id'),
			'Request'=>array(self::BELONGS_TO,'Request','request_id'),
			'CreatedBy'=>array(self::BELONGS_TO,'Users','created_id'),
			'UpdateBy'=>array(self::BELONGS_TO,'Users','update_id'),
			'PrintBy'=>array(self::BELONGS_TO,'Users','print_by'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_payment' => 'Kode Payment',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diperbaharui Oleh',
			'code' => 'Nomor Kuitansi',
			'date' => 'Tanggal Kuitansi',
			'term' => 'Termin',
			'total' => 'Jumlah Bayar',
			'balance' => 'Sisa Bayar',
			'file' => 'Bukti Bayar',
			'invoice_id' => 'Nomor Invoice',
			'request_id' => 'Permohonan ID',
			'status' => 'Status',
			'terbilang' => 'Terbilang',
			'file_payment' => 'File Kwintansi',
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

		$criteria->compare('id_payment',$this->id_payment);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('term',$this->term);
		$criteria->compare('total',$this->total);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('invoice_id',$this->invoice_id);
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
	 * @return RequestPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function term($data){
		if($data==1){
			return "Termin Ke-1";
		}elseif($data==2){
			return "Termin Ke-2";
		}elseif($data==3){
			return "Termin Ke-3";
		}elseif($data==4){
			return "Termin Ke-4";
		}elseif($data==5){
			return "Termin Ke-5";
		}else{
			return "-";
		}
	}

	public static function findCompany($id)
	{
		$model= Company::model()->findByPk($id);
		return strtoupper($model->name);
	}	


	public static function findCompanyAddress($id)
	{
		$model= Company::model()->findByPk($id);
		return $model->address;
	}	

	public static function findSignature($id)
	{
		$model= Unit::model()->findByPk($id);
		return $model->address;
	}		

	public static function findGrandTotalInvoice($id,$payment)
	{
		$model= RequestInvoice::model()->findByPk($id);
		$sum = $model->balance - $payment;
		return $sum;
	}	


}
