<?php

/**
 * This is the model class for table "office".
 *
 * The followings are the available columns in table 'office':
 * @property integer $id_office
 * @property string $city
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $maps
 * @property integer $status
 * @property integer $organization_id
 */
class Office extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Office the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'office';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city, address, phone, fax, maps, status, organization_id', 'required'),
			array('status, organization_id', 'numerical', 'integerOnly'=>true),
			array('phone, fax', 'length', 'max'=>25),
			array('city', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_office, address, phone, fax, maps, status, organization_id', 'safe', 'on'=>'search'),
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
			'id_office' => 'Id Office',
			'city' => 'City',
			'address' => 'Address',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'maps' => 'Maps',
			'status' => 'Status',
			'organization_id' => 'Organization',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_office',$this->id_office);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('maps',$this->maps,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('organization_id',$this->organization_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}