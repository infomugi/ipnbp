<?php

class RequestScheduleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','search'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','search','update','delete'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
				),			
			array('deny',
				'users'=>array('*'),
				),
			);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
				), false, true);
		}
		else
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RequestSchedule;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestSchedule']))
		{
			$model->attributes=$_POST['RequestSchedule'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_schedule));
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestSchedule']))
		{
			$model->attributes=$_POST['RequestSchedule'];
			if($model->save()){
				$this->redirect(array('request/view','id'=>$model->request_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RequestSchedule');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RequestSchedule('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RequestSchedule']))
			$model->attributes=$_GET['RequestSchedule'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestSchedule the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestSchedule::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadUnit($id)
	{
		$model=Unit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->name;
	}	

	public function loadTesting($id)
	{
		$model=Testing::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->name;
	}	

	public function loadRequestTesting($id)
	{
		$model=RequestTesting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->testing_total;
	}		

	public function countStepTesting($data,$request,$id)
	{
		// $count = RequestSchedule::model()->countByAttributes(array('testing_type'=>$data));
		$count = RequestSchedule::model()->countDataTesting($data,$request);
		$max = $this->loadRequestTesting($id);

		if($count==0){
			$step = 1;
		}elseif($count==1){
			$step = 2;
		}elseif($count==2){
			$step = 3;
		}elseif($count==3){
			$step = 4;
		}elseif($count==4){
			$step = 5;
		}elseif($count==5){
			$step = 6;
		}elseif($count==6){
			$step = 7;
		}elseif($count==7){
			$step = 8;
		}elseif($count==8){
			$step = 9;
		}elseif($count==9){
			$step = 10;
		}elseif($count==10){
			$step = 11;
		}else{
			$step = 0;
		}

		if($step > $max){
			$number = "Jumlah Sample Maksimal Pada Pengujian Ini telah Melebihi Kapasitas yang Ditentukan: ".$max;
		}else{
			$number = $step;
		}

		return $number;
	}			

	/**
	 * Performs the AJAX validation.
	 * @param RequestSchedule $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-schedule-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionEnable($id)
	{
		$model=$this->loadModel($id);
		$model->status = 1;
		$model->save();
		$this->redirect(array('index'));
	}	

	public function actionDisable($id)
	{
		$model=$this->loadModel($id);
		$model->status = 0;
		$model->save();
		$this->redirect(array('index'));
	}		

	public function actionSearch()
	{
		$id_testing='';
		$id_type='';
		$testing_lab='';
		$testing_type='';
		$testing_part='';
		$testing_total='';
		$testing_number='';

		$criteria = new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		$itu = RequestTesting::model()->findAll($criteria);		

		foreach($itu as $i=>$ii)
		{
			if($_POST['data']==$ii->id_testing)
			{
				$id_testing=$ii->id_testing;
				$id_type=$ii->testing_type;
				$testing_type=$this->loadTesting($ii->testing_type);
				$testing_lab=$this->loadUnit($ii->testing_lab);
				$testing_part=$this->loadUnit($ii->testing_part);
				$testing_total=$ii->testing_total;
				// Show Step Number
				$testing_number=$this->countStepTesting($ii->testing_type,$ii->request_id,$ii->id_testing);
			}		      
		}        

		echo CJSON::encode(array(
			'id_testing'=>$id_testing,
			'id_type'=>$id_type,
			'testing_type'=>$testing_type,
			'testing_lab'=>$testing_lab,
			'testing_part'=>$testing_part,
			'testing_total'=>$testing_total,
			'testing_number'=>$testing_number,
			));
		Yii::app()->end();
	}			
}
