<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id_question
 * @property string $question
 * @property integer $type
 * @property double $point
 * @property integer $category_id
 * @property integer $sub_id
 * @property integer $status
 * @property integer $question_sort
 */
class Question extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, type, point, status, question_sort, sub_id, category_id', 'required'),
			array('type, sub_id, status, question_sort, category_id', 'numerical', 'integerOnly'=>true),
			array('question', 'length', 'max'=>255),
			array('point, question_sort', 'numerical'),
			// array('sub_id, question_sort','unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_question, question, type, point, sub_id, status', 'safe', 'on'=>'search'),
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
			'QuesionerWeight'=>array(self::BELONGS_TO,'QuesionerWeight','category_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_question' => 'Id Question',
			'question' => 'Pertanyaan',
			'type' => 'Jenis Pertanyaan',
			'point' => 'Nilai',
			'category_id' => 'Kategori Pertanyaan ',
			'sub_id' => 'Jenis ',
			'status' => 'Status',
			'question_sort' => 'Urutan Pertanyaan Ke-',
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

		$criteria->compare('id_question',$this->id_question);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('point',$this->point);
		$criteria->compare('sub_id',$this->sub_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function countQuestion(){
		$results = Question::model()->findAll();
		$count = count($results);

		if($count==NULL){
			return "0";
		}else{
			return $count;
		}		
	}

	public function type($data){
		if($data==1){
			return "Pengujian";
		}elseif($data==2){
			return "Advis Teknis";
		}elseif($data==3){
			return "Sertifikasi";
		}else{

		}
	}

	public static function getQuestion($data)
	{
		$sql = "SELECT * FROM question where type=".$data." order by question_sort";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}	

}
