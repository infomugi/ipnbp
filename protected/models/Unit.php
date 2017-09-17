<?php

/**
 * This is the model class for table "ref_unit".
 *
 * The followings are the available columns in table 'ref_unit':
 * @property integer $id_unit
 * @property string $name
 * @property string $address
 * @property integer $type
 * @property integer $status
 */
class Unit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, type, status', 'required'),
			array('type, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_unit, name, address, type, status', 'safe', 'on'=>'search'),
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
			'id_unit' => 'Id Unit',
			'name' => 'Nama Unit',
			'address' => 'Pejabat',
			'type' => 'Tipe',
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

		$criteria->compare('id_unit',$this->id_unit);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Unit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function type($a)
	{
		if($a==1){
			return "Balai";
		}else if($a==2){
			return "Lab";
		}else if($a==3){
			return "Petugas";
		}else{
			return "-";
		} 
	}

	public function getBalai(){
		$sql = "SELECT * FROM ref_unit WHERE type=1 AND status=1";
		$command = YII::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public function name($id){
		$model = $this->model()->findByPk($id);
		return $model->name;
	}
}
