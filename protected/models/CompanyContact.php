<?php

/**
 * This is the model class for table "ref_company_contact".
 *
 * The followings are the available columns in table 'ref_company_contact':
 * @property integer $id_company_contact
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $company_id
 * @property integer $status_contact
 * @property integer $status
 */
class CompanyContact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref_company_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, phone, email, company_id, status', 'required'),
			array('company_id, status, status_contact', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>50),
			array('phone', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_company_contact, name, address, phone, email, company_id, status', 'safe', 'on'=>'search'),
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
			'id_company_contact' => 'Id Kontak',
			'name' => 'Nama',
			'address' => 'Alamat',
			'phone' => 'HP',
			'email' => 'Alamat Email',
			'company_id' => 'Perusahaan',
			'status_contact' => 'UP',
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

		$criteria->compare('id_company_contact',$this->id_company_contact);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CompanyContact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function status($data){
		if($data==1){
			return " (UP)";
		}else{
			return "";
		}
	}

	public function showUP($company){
		echo Yii::app()->db->createCommand('SELECT name FROM ref_company_contact WHERE status_contact=1 AND company_id='.$company)->queryScalar();
	}		
}
