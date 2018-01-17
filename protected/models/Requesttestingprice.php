<?php

/**
 * This is the model class for table "request_testing_price".
 *
 * The followings are the available columns in table 'request_testing_price':
 * @property integer $id_request_testing_price
 * @property integer $created_id
 * @property string $created_date
 * @property integer $update_id
 * @property string $update_date
 * @property string $name
 * @property integer $price
 * @property integer $status
 * @property integer $request_testing_id
 * @property integer $request_id
 */
class RequestTestingPrice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_testing_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('created_id, created_date, update_id, update_date, name, price, status, request_testing_id, request_id', 'required'),
			// array('name, price, request_testing_id', 'required'),
			array('created_id, update_id, price, status, request_testing_id, request_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_request_testing_price, created_id, created_date, update_id, update_date, name, price, status, request_testing_id, request_id', 'safe', 'on'=>'search'),
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
			'id_request_testing_price' => 'Id Request Testing Price',
			'created_id' => 'Created',
			'created_date' => 'Created Date',
			'update_id' => 'Update',
			'update_date' => 'Update Date',
			'name' => 'Kegiatan',
			'price' => 'Biaya',
			'status' => 'Status',
			'request_testing_id' => 'Request Testing',
			'request_id' => 'Request',
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

		$criteria->compare('id_request_testing_price',$this->id_request_testing_price);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('status',$this->status);
		$criteria->compare('request_testing_id',$this->request_testing_id);
		$criteria->compare('request_id',$this->request_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestTestingPrice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
