<?php

/**
 * This is the model class for table "request_testing".
 *
 * The followings are the available columns in table 'request_testing':
 * @property integer $id_testing
 * @property string $created_date
 * @property integer $created_id
 * @property string $update_date
 * @property integer $update_id
 * @property integer $testing_type
 * @property integer $testing_lab
 * @property integer $testing_part
 * @property integer $testing_total
 * @property integer $request_id
 * @property integer $status
 */
class RequestTesting extends CActiveRecord
{
	private $request;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_testing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('created_date, created_id, update_date, update_id, testing_type, testing_lab, testing_part, request_id, status', 'required'),
			array('created_date, created_id, testing_type, testing_lab, testing_part, request_id, testing_total, status', 'required','on'=>'create'),
			array('update_date, update_id', 'required','on'=>'update'),
			array('created_id, update_id, testing_type, testing_lab, testing_part, request_id, status, testing_total', 'numerical', 'integerOnly'=>true),
			array('testing_type', 'checkUnique','on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_testing, created_date, created_id, update_date, update_id, testing_type, testing_lab, testing_part, request_id, status', 'safe', 'on'=>'search'),
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
			'Balai'=>array(self::BELONGS_TO,'Unit','testing_part'),
			'Lab'=>array(self::BELONGS_TO,'Unit','testing_lab'),
			'Testing'=>array(self::BELONGS_TO,'Testing','testing_type'),
			'Request'=>array(self::BELONGS_TO,'Request','request_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_testing' => 'Kode Pengujian',
			'created_date' => 'Tanggal Buat',
			'created_id' => 'Diinput Oleh',
			'update_date' => 'Tanggal Update',
			'update_id' => 'Diperbaharui Oleh',
			'testing_type' => 'Jenis Pengujian',
			'testing_lab' => 'Lab',
			'testing_part' => 'Balai',
			'testing_total' => 'Jumlah Sample',
			'request_id' => 'Permohonan',
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

		$criteria->compare('id_testing',$this->id_testing);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('testing_type',$this->testing_type);
		$criteria->compare('testing_lab',$this->testing_lab);
		$criteria->compare('testing_part',$this->testing_part);
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
	 * @return RequestTesting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getRequest()
	{
		$testing=Testing::model()->findByPk($this->testing_type);
		return $testing->name;
	}

	public function checkUnique($attribute,$params)
	{
		$models = $this->model()->findAllByAttributes(array('testing_type' =>$this->testing_type,'request_id'=>$this->request_id));
		if(count($models)>0){
			$this->addError($attribute, 'Tahapan Pengujian ini sudah ada.');
		}
	}	
}
