<?php

/**
 * This is the model class for table "request_disposition".
 *
 * The followings are the available columns in table 'request_disposition':
 * @property integer $id_disposition
 * @property string $created_date
 * @property integer $created_by
 * @property integer $request_id
 * @property string $disposition_date
 * @property integer $disposition_to
 * @property string $last_view
 * @property integer $status
 */
class RequestDisposition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_disposition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, created_by, request_id, disposition_date, disposition_to, status', 'required'),
			array('created_by, request_id, disposition_to, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_disposition, created_date, created_by, request_id, disposition_date, disposition_to, last_view, status', 'safe', 'on'=>'search'),
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
			'Balai'=>array(self::BELONGS_TO,'unit','disposition_to'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_disposition' => 'Disposisi ID',
			'created_date' => 'Tanggal Buat',
			'created_by' => 'Di Buat Oleh',
			'request_id' => 'Permohonan',
			'disposition_date' => 'Tanggal Disposisi',
			'disposition_to' => 'Disposisi Ke',
			'last_view' => 'Terakhir Dilihat',
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

		$criteria->compare('id_disposition',$this->id_disposition);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('disposition_date',$this->disposition_date,true);
		$criteria->compare('disposition_to',$this->disposition_to);
		$criteria->compare('last_view',$this->last_view,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestDisposition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function status($a)
	{
		if($a==0)
			return "Terkirim";
		else if($a==1)
			return "Diterima";
		else 
			return "-";
	}

	public function views($b)
	{
		if($b=="0000-00-00")
			return "-";
		else 
			return $b;
	}	

	public static function getDisposition($data,$division){
		$sql = "
		SELECT r.id_request, rd.disposition_date, r.letter_subject, r.letter_code, r.created_date, c.name, u.image 
		FROM request as r
		LEFT JOIN company as c ON r.company_id=c.id_company 
		LEFT JOIN users as u ON r.created_id=u.id_user
		LEFT JOIN request_disposition as rd ON rd.request_id=r.id_request
		WHERE rd.status=".$data." AND rd.disposition_to=".$division." ORDER BY r.id_request DESC LIMIT 6";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public static function countDisposision($data,$division){
		$sql = "SELECT count(id_disposition) as total FROM request_disposition WHERE status=".$data." AND disposition_to=".$division;
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}
