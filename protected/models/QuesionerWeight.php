<?php

/**
 * This is the model class for table "quesioner_weight".
 *
 * The followings are the available columns in table 'quesioner_weight':
 * @property integer $id_quesioner_weight
 * @property string $name
 * @property double $weight
 * @property integer $type
 */
class QuesionerWeight extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quesioner_weight';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, weight, type', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('weight', 'numerical'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quesioner_weight, name, weight, type', 'safe', 'on'=>'search'),
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
			'id_quesioner_weight' => 'Id Quesioner Weight',
			'name' => 'Nama',
			'weight' => 'Bobot',
			'type' => 'Kategori',
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

		$criteria->compare('id_quesioner_weight',$this->id_quesioner_weight);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuesionerWeight the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
