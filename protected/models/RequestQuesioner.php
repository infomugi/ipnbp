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
			array('created_id, created_date, company_id, request_id, report_id, unit', 'required','on'=>'create'),
			array('created_id, company_id, request_id, report_id, status', 'numerical', 'integerOnly'=>true),
			array('unit', 'length', 'max'=>255),
			array('answers', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_quesioner, created_id, created_date, company_id, request_id, report_id, unit, status', 'safe', 'on'=>'search'),
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

	public function showAnswer($data,$number){
		$pecah = explode(',',$data);
		for ( $i = 0; $i < count($pecah); $i++ ) {
			$pecahx = explode($i.'. ',$pecah[$i]);
			for ( $x = 0; $x < count($pecahx); $x++ ) {
				$no = substr($pecahx[$x], 0, 1);
				if($number==$no){	
					$answer = substr($pecahx[$x], -1);
					return $answer . " (" . $this->answer($answer).")";
				}
			}
		}
	}

	public function answer($data){
		if($data==1){
			return "Tidak Puas";
		}elseif($data==2){
			return "Kurang Puas";
		}elseif($data==3){
			return "Puas";
		}elseif($data==4){
			return "Sangat Puas";			
		}else{
			return "-";
		}
	}	

	public function color($data){
		if($data==1){
			return "danger";
		}elseif($data==2){
			return "warning";
		}elseif($data==3){
			return "success";
		}elseif($data==4){
			return "info";			
		}else{
			return "-";
		}
	}	

}
