<?php

/**
 * This is the model class for table "request_invoice".
 *
 * The followings are the available columns in table 'request_invoice':
 * @property integer $id_invoice
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property string $code
 * @property string $date
 * @property string $description
 * @property double $total
 * @property string $note
 * @property integer $signature_id
 * @property string $file_invoice
 * @property string $file_spk
 * @property integer $request_id
 * @property integer $status
 * @property integer $print_by
 * @property string $print_date
 * @property integer $print_click
 * @property integer $testing_id
 * @property string $spk_no
 * @property integer $spk_date
 */
class RequestInvoice extends CActiveRecord
{
	private $request;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('created_date, created_id, update_date, update_id, code, date, description, total, note, signature_id, file_invoice, file_spk, request_id, status', 'required'),
			array('created_date, created_id, code, date, description, total, signature_id, request_id, status', 'required','on'=>'create'),
			array('print_by, print_click, print_date', 'required','on'=>'print'),
			
			array('file_invoice', 'required','on'=>'upload'),
			array('update_id, update_date', 'required','on'=>'update'),
			array('created_id, update_id, signature_id, request_id, status, print_by, print_click, testing_id', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('code, spk_no', 'length', 'max'=>50),
			array('print_date, spk_date', 'length', 'max'=>25),
			array('file_invoice, file_spk, note, description, note', 'length', 'max'=>255),
			array('code','unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_invoice, created_date, created_id, update_date, update_id, code, date, description, total, note, signature_id, file_invoice, file_spk, request_id, status', 'safe', 'on'=>'search'),
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
			'Signature'=>array(self::BELONGS_TO,'Unit','signature_id'),
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
			'id_invoice' => 'Kode Invoice',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diperbaharui Oleh',
			'code' => 'Nomor Invoice',
			'date' => 'Tanggal Invoice',
			'description' => 'Uraian',
			'total' => 'Jumlah',
			'balance' => 'Sisa Bayar',
			'note' => 'Catatan',
			'signature_id' => 'Penandatangan',
			'file_invoice' => 'File Invoice',
			'file_spk' => 'File SPK',
			'request_id' => 'Permohonan ID',
			'status' => 'Status',
			'terbilang' => 'Terbilang',
			'print_by' => 'Dicetak Oleh',
			'print_click' => 'Total Cetak',
			'print_date' => 'Tanggal Cetak',
			'spk_no' => 'Nomor SPK',
			'spk_date' => 'Tanggal SPK',
			'testing_id' => 'Pengujian',
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

		$criteria->compare('id_invoice',$this->id_invoice);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('signature_id',$this->signature_id);
		$criteria->compare('file_invoice',$this->file_invoice,true);
		$criteria->compare('file_spk',$this->file_spk,true);
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
	 * @return RequestInvoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getRequest()
	{
		$testing=Testing::model()->findByPk($this->testing_id);
		return $testing->name;
	}

	
}
