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
			array('created_date, created_id, letter_date, letter_code, description, request_id, status', 'required','on'=>'create'),
			array('update_id, update_date', 'required','on'=>'update'),
			array('created_id, update_id, request_id, status', 'numerical', 'integerOnly'=>true),
			array('letter_code', 'length', 'max'=>25),
			array('letter_attachment', 'length', 'max'=>255),
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
			'letter_attachment' => 'File Lampiran',
			'date_send' => 'Tanggal Kirim',
			'date_feedback' => 'Tanggal Feedback',
			'description' => 'Catatan',
			'request_id' => 'Permintaan ID',
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
}
