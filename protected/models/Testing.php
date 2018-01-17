<?php

/**
 * This is the model class for table "ref_testing".
 *
 * The followings are the available columns in table 'ref_testing':
 * @property integer $id_testing
 * @property string $code
 * @property string $name
 * @property integer $part_id
 * @property integer $category_id
 * @property integer $time
 * @property integer $price
 * @property string $method
 * @property integer $type
 * @property integer $status
 */
class Testing extends CActiveRecord
{
	private $showTesting;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref_testing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, name, time, price, part_id, category_id, type, method', 'required'),
			array('status, part_id, category_id, time, price, type', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>25),
			array('name', 'length', 'max'=>100),
			array('method', 'length', 'max'=>255),
			array('part_name, category_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_testing, code, name, part_id, category_id, status', 'safe', 'on'=>'search'),
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
			'Balai'=>array(self::BELONGS_TO,'Unit','part_id'),
			'Category'=>array(self::BELONGS_TO,'Category','category_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_testing' => 'Id Pengujian',
			'code' => 'Kode',
			'name' => 'Nama',
			'part_id' => 'Balai',
			'category_id' => 'Kategori',
			'time' => 'Waktu',
			'price' => 'Tarif PP 38 Tahun 2012',
			'method' => 'Metode',
			'type' => 'Tipe Pengujian',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('part_id',$this->part_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Testing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getShowTesting()
	{
		return $this->name . " - " . $this->category_name;
	}

	public function getUnit($id){
		$unit = Unit::model()->findBypk($id);
		if($unit===NULL){
			return "-";
		}else{
			return $unit->name;
		}
	}

	public function getCategory($id){
		$category = Category::model()->findBypk($id);
		if($category===NULL){
			return "-";
		}else{
			return $category->name;
		}
	}	

}
