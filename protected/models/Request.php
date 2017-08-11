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
			array('code, created_date, created_id, date, company_id, letter_date, letter_code, letter_subject, letter_attachment, status', 'required','on'=>'create'),
			array('update_id, update_date', 'required','on'=>'update'),
			array('created_id, update_id, company_id, status', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>50),
			array('letter_code', 'length', 'max'=>520),
			array('letter_subject', 'length', 'max'=>150),
			array('letter_attachment', 'length', 'max'=>255),
			array('code','unique'),
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
			'id_request' => 'Id Permohonan',
			'code' => 'Nomor Permohonan',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diperbaharui Oleh',
			'date' => 'Tanggal Masuk',
			'company_id' => 'Perusahaan',
			'letter_date' => 'Tanggal Surat',
			'letter_code' => 'Nomor Surat',
			'letter_subject' => 'Perihal',
			'letter_attachment' => 'Lampiran Surat',
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
}
