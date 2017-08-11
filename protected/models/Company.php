<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $id_company
 * @property string $created_date
 * @property string $update_date
 * @property string $company_code
 * @property string $name
 * @property string $owner
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $faximile
 * @property integer $postal_code
 * @property integer $type
 * @property integer $place
 * @property string $classification
 * @property integer $province_id
 * @property integer $district_id
 * @property integer $category_id
 * @property integer $status
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_date, update_date, company_code, name, owner, address, email, phone, faximile, postal_code, type, place, classification, province_id, district_id, category_id, status', 'required'),
			array('postal_code, type, place, province_id, district_id, category_id, status', 'numerical', 'integerOnly'=>true),
			array('company_code, phone, classification', 'length', 'max'=>15),
			array('name', 'length', 'max'=>100),
			array('owner, email', 'length', 'max'=>50),
			array('faximile', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_company, created_date, update_date, company_code, name, owner, address, email, phone, faximile, postal_code, type, place, classification, province_id, district_id, category_id, status', 'safe', 'on'=>'search'),
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
			'id_company' => 'Perusahaan ID',
			'created_date' => 'Tanggal Buat',
			'update_date' => 'Tanggal Update',
			'company_code' => 'Kode',
			'name' => 'Nama',
			'owner' => 'Pemilik',
			'address' => 'Alamat',
			'email' => 'Email',
			'phone' => 'Phone',
			'faximile' => 'Fax',
			'postal_code' => 'Kode Pos',
			'type' => 'Type',
			'place' => 'Kedudukan',
			'classification' => 'Klasifikasi',
			'province_id' => 'Provinsi',
			'district_id' => 'Kecamatan',
			'category_id' => 'Kategori',
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

		$criteria->compare('id_company',$this->id_company);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('company_code',$this->company_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('faximile',$this->faximile,true);
		$criteria->compare('postal_code',$this->postal_code);
		$criteria->compare('type',$this->type);
		$criteria->compare('place',$this->place);
		$criteria->compare('classification',$this->classification,true);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
