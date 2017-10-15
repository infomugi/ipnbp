<?php

/**
 * This is the model class for table "request_quesioner".
 *
 * The followings are the available columns in table 'request_quesioner':
 * @property integer $id_quesioner
 * @property integer $created_id
 * @property string $created_date
 * @property integer $company_id
 * @property integer $request_id
 * @property integer $report_id
 * @property string $unit
 * @property integer $question_1
 * @property integer $question_2
 * @property integer $question_3
 * @property integer $question_4
 * @property integer $question_5
 * @property integer $question_6
 * @property integer $question_7
 * @property integer $question_8
 * @property integer $question_9
 * @property integer $question_10
 * @property integer $question_11
 * @property integer $question_12
 * @property integer $question_13
 * @property integer $question_14
 * @property integer $question_15
 * @property integer $question_16
 * @property integer $question_17
 * @property integer $question_18
 * @property integer $question_19
 * @property integer $question_20
 * @property integer $question_21
 * @property integer $question_22
 * @property integer $status
 */
class RequestQuesioner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'request_quesioner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_id, created_date, company_id, request_id, report_id, unit, question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9, question_10, question_11, question_12, question_13, question_14, question_15, question_16, question_17, question_18, question_19', 'required','on'=>'create'),
			array('created_id, company_id, request_id, report_id, question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9, question_10, question_11, question_12, question_13, question_14, question_15, question_16, question_17, question_18, question_19, question_20, question_21, question_22, status', 'numerical', 'integerOnly'=>true),
			array('unit', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quesioner, created_id, created_date, company_id, request_id, report_id, unit, question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9, question_10, question_11, question_12, question_13, question_14, question_15, question_16, question_17, question_18, question_19, question_20, question_21, question_22, status', 'safe', 'on'=>'search'),
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
			'Request'=>array(self::BELONGS_TO,'Request','request_id'),
			'Report'=>array(self::BELONGS_TO,'Report','report_id'),
			'CreatedBy'=>array(self::BELONGS_TO,'Company','created_id'),
			'Company'=>array(self::BELONGS_TO,'Company','company_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_quesioner' => 'Id Quesioner',
			'created_id' => 'Diiput Oleh',
			'created_date' => 'Tanggal Input',
			'company_id' => 'Nama Perusahaan',
			'request_id' => 'Pengujian',
			'report_id' => 'Report ID',
			'unit' => 'Pelayanan',
			'question_1' => '1. a',
			'question_2' => '1. b',
			'question_3' => '2. a',
			'question_4' => '2. b',
			'question_5' => '3. a',
			'question_6' => '3. b',
			'question_7' => '4. a',
			'question_8' => '4. b',
			'question_9' => '5. a',
			'question_10' => '5 b',
			'question_11' => '6. a',
			'question_12' => '6. b',
			'question_13' => '7. a',
			'question_14' => '7. b',
			'question_15' => '8. a',
			'question_16' => '8. b',
			'question_17' => '9. a',
			'question_18' => '9. b',
			'question_19' => '10. a',
			'question_20' => '10. b',
			'question_21' => '11. a',
			'question_22' => '11. b',
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

		$criteria->compare('id_quesioner',$this->id_quesioner);
		$criteria->compare('created_id',$this->created_id);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('report_id',$this->report_id);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('question_1',$this->question_1);
		$criteria->compare('question_2',$this->question_2);
		$criteria->compare('question_3',$this->question_3);
		$criteria->compare('question_4',$this->question_4);
		$criteria->compare('question_5',$this->question_5);
		$criteria->compare('question_6',$this->question_6);
		$criteria->compare('question_7',$this->question_7);
		$criteria->compare('question_8',$this->question_8);
		$criteria->compare('question_9',$this->question_9);
		$criteria->compare('question_10',$this->question_10);
		$criteria->compare('question_11',$this->question_11);
		$criteria->compare('question_12',$this->question_12);
		$criteria->compare('question_13',$this->question_13);
		$criteria->compare('question_14',$this->question_14);
		$criteria->compare('question_15',$this->question_15);
		$criteria->compare('question_16',$this->question_16);
		$criteria->compare('question_17',$this->question_17);
		$criteria->compare('question_18',$this->question_18);
		$criteria->compare('question_19',$this->question_19);
		$criteria->compare('question_20',$this->question_20);
		$criteria->compare('question_21',$this->question_21);
		$criteria->compare('question_22',$this->question_22);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequestQuesioner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function unit($id){
		$unit = Unit::model()->findbypk($id);
		return $unit->name;
	}

	public function show($data){
		$pecah = explode(',',$data);
		for ( $i = 0; $i < count($pecah); $i++ ) {
			echo $this->unit($pecah[$i]) . "<br />";
		}
	}

	public function answer($data){
		if($data==1){
			return "Tidak Setuju";
		}elseif($data==2){
            return "Kurang Setuju";
		}elseif($data==3){
			return "Setuju";
		}elseif($data==4){
			return "Sangat Setuju";			
		}else{
			return "-";
		}
	}

	// public function count($id){
	// 	$data = $this->model()->findbyPk($id);

	// 	$total = SUM($data->question_1,$data->question_2,$data->question_3,$data->question_4,$data->question_5,$data->question_6,$data->question_7,$data->question_8,$data->question_9,$data->question_10,$data->question_11,$data->question_12,$data->question_13,$data->question_14,$data->question_15,$data->question_16,$data->question_17,$data->question_18,$data->question_19,$data->question_20,$data->question_21,$data->question_22);

	// 	return $total;
	// }
}
