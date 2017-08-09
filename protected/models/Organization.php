<?php

/**
 * This is the model class for table "organization".
 *
 * The followings are the available columns in table 'organization':
 * @property integer $id_organization
 * @property string $name
 * @property string $description
 * @property string $vision
 * @property string $mision
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property string $image
 * @property string $tags
 */
class Organization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Organization the static model class
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
		return 'organization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, vision, mision, address, phone, email, website, image, tags', 'required'),
			array('history', 'required','on'=>'history'),
			array('name, image, tags', 'length', 'max'=>255),
			array('history', 'length', 'max'=>5000),
			array('phone', 'length', 'max'=>15),
			array('email, website', 'length', 'max'=>25),
			array('email','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_organization, name, description, vision, mision, address, phone, email, website, image, tags', 'safe', 'on'=>'search'),
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
			'id_organization' => 'Id Organization',
			'name' => 'Company Name',
			'description' => 'About',
			'vision' => 'Vision',
			'mision' => 'Mision',
			'address' => 'Location',
			'phone' => 'Phone',
			'email' => 'Email',
			'website' => 'Website',
			'image' => 'Logo',
			'tags' => 'Keywords',
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

		$criteria->compare('id_organization',$this->id_organization);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('vision',$this->vision,true);
		$criteria->compare('mision',$this->mision,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('tags',$this->tags,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}