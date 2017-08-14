<?php

class RequestController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index'),
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
		$this->layout="page";

		//Form Permohonan
		$model=$this->loadModel($id);
		$model->setScenario('update');
		if(isset($_POST['Request']))
		{
			$model->attributes=$_POST['Request'];
			$model->update_id = YII::app()->user->id;
			$model->update_date = date('Y-m-d h:i:s');			
			if($model->save()){
				Yii::app()->user->setFlash('Success', 'Permohonan Pengujian '.$model->Company->name.' telah Disimpan.');
				$this->redirect(array('view','id'=>$id));
			}
		}

		//Form Surat Tanggapan
		$response=new Response;
		$response->setScenario('create');
		if(isset($_POST['Response']))
		{
			$response->attributes=$_POST['Response'];
			$response->created_id = YII::app()->user->id;
			$response->created_date = date('Y-m-d h:i:s');
			$response->status = 1;		
			$response->request_id = $id;	
			if($response->save()){

				Yii::app()->user->setFlash('Success', 'Surat Tanggapan Permohonan Pengujian No. '.$response->letter_code.' Disimpan.');

				//Type = 2 (Response = Tanggapan)
				$this->setActivity($id,2);
				$this->redirect(array('view','id'=>$id));
			}
		}

		//Data Surat Tanggapan
		$dataResponse=new CActiveDataProvider('Response',array('criteria'=>array('condition'=>'request_id='.$id)));

		//Form Jenis Pengujian
		$testing=new RequestTesting;
		$testing->setScenario('create');
		if(isset($_POST['RequestTesting']))
		{
			$testing->attributes=$_POST['RequestTesting'];
			$testing->created_id = YII::app()->user->id;
			$testing->created_date = date('Y-m-d h:i:s');
			$testing->status = 1;		
			$testing->request_id = $id;			
			if($testing->save()){
				Yii::app()->user->setFlash('Success', 'Tahapan '.$testing->Testing->name.' Disimpan.');
				$this->redirect(array('view','id'=>$id));
			}
		}

		//Data Pengujian
		$dataTesting=new CActiveDataProvider('RequestTesting',array('criteria'=>array('condition'=>'request_id='.$id)));

		//Form Jenis Penjadwalan
		$schedule=new RequestSchedule;
		$schedule->setScenario('create');
		if(isset($_POST['RequestSchedule']))
		{
			$schedule->attributes=$_POST['RequestSchedule'];
			$schedule->created_id = YII::app()->user->id;
			$schedule->created_date = date('Y-m-d h:i:s');
			$schedule->status = 1;		
			$schedule->request_id = $id;			
			if($schedule->save()){
				Yii::app()->user->setFlash('Success', 'Penjadwalan '.$schedule->task.' Disimpan.');
				$this->redirect(array('view','id'=>$id));
			}
		}

		//Data Penjadwalan
		$dataSchedule=new CActiveDataProvider('RequestSchedule',array('criteria'=>array('condition'=>'request_id='.$id)));


		//Form Invoice
		$invoice=new RequestInvoice;
		$invoice->setScenario('create');
		if(isset($_POST['RequestInvoice']))
		{
			$invoice->attributes=$_POST['RequestInvoice'];
			$invoice->created_id = YII::app()->user->id;
			$invoice->created_date = date('Y-m-d h:i:s');
			$invoice->status = 1;		
			$invoice->request_id = $id;
			if($invoice->save()){
				//Type = 3 (Payment = Invoice)
				Yii::app()->user->setFlash('Success', 'Invoice No. '.$invoice->code.' Disimpan.');
				$this->setActivity($id,6);
				$this->redirect(array('view','id'=>$id));
			}
		}


		//Data Invoice
		$dataInvoice=new CActiveDataProvider('RequestInvoice',array('criteria'=>array('condition'=>'request_id='.$id)));

		$payment=new RequestPayment;
		$payment->setScenario('create');
		if(isset($_POST['RequestPayment']))
		{
			$payment->attributes=$_POST['RequestPayment'];
			$payment->created_id = YII::app()->user->id;
			$payment->created_date = date('Y-m-d h:i:s');
			$payment->status = 1;		
			$payment->request_id = $id;			
			if($payment->save()){
				Yii::app()->user->setFlash('Success', 'Pembayaran atas Invoice No. '.$payment->Invoice->code.' Disimpan.');
				$this->setActivity($id,3);
				$this->redirect(array('view','id'=>$id));
			}
		}

		//Data Invoice
		$dataPayment=new CActiveDataProvider('RequestPayment',array('criteria'=>array('condition'=>'request_id='.$id)));

		//Data Activity
		$activity=$this->loadActivity($id);

		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
				'response'=>$response,
				'dataResponse'=>$dataResponse,
				'testing'=>$testing,
				'dataTesting'=>$dataTesting,
				'schedule'=>$schedule,
				'dataSchedule'=>$dataSchedule,
				'invoice'=>$invoice,
				'dataInvoice'=>$dataInvoice,
				'payment'=>$payment,
				'dataPayment'=>$dataPayment,
				'activity'=>$activity,
				), false, true);
		}
		else
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				'response'=>$response,
				'dataResponse'=>$dataResponse,
				'testing'=>$testing,
				'dataTesting'=>$dataTesting,
				'schedule'=>$schedule,
				'dataSchedule'=>$dataSchedule,
				'invoice'=>$invoice,
				'dataInvoice'=>$dataInvoice,
				'payment'=>$payment,
				'dataPayment'=>$dataPayment,
				'activity'=>$activity,
				));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Request;
		$activity=new RequestActivity;
		$model->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Request']))
		{
			$model->attributes=$_POST['Request'];
			$model->created_id = YII::app()->user->id;
			$model->created_date = date('Y-m-d h:i:s');
			$model->status = 1;

			$model->letter_attachment=CUploadedFile::getInstance($model,'letter_attachment');
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'letter_attachment'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'letter_attachment'); 
				$model->letter_attachment=$model->code.'.'.$tmp->extensionName; 
			}


			if($model->save()){

				$activity->request_id = $model->id_request;
				$activity->request_date = date('Y-m-d h:i:s');
				$activity->activity_date = date('Y-m-d h:i:s');
				$activity->save();

				Yii::app()->user->setFlash('Info', 'Permohonan Pengujian telah Disimpan.');


				if(strlen(trim($model->letter_attachment)) > 0) 
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/'.$model->letter_attachment);	
				
				$this->redirect(array('view','id'=>$model->id_request));
			}
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
		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Request']))
		{
			$model->attributes=$_POST['Request'];
			$model->update_id = YII::app()->user->id;
			$model->update_date = date('Y-m-d h:i:s');			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_request));
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
		$dataProvider=new CActiveDataProvider('Request');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Request('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Request']))
			$model->attributes=$_GET['Request'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Request the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Request::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadActivity($id)
	{
		$model=RequestActivity::model()->findByAttributes(array('request_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Request $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function setActivity($id,$type)
	{
		$activity=$this->loadActivity($id);
		$userid = YII::app()->user->id;
		$date = date('Y-m-d H:i:s');
		$activity->activity_date = $date;
		
		if($type==1){
			$activity->approve_id = $userid;
			$activity->approve_date = $date;
			$activity->save();
		}elseif($type==2){
			$activity->response_id = $userid;
			$activity->response_date = $date;
			$activity->save();	
		}elseif($type==3){
			$activity->payment_id = $userid;
			$activity->payment_date = $date;
			$activity->save();	
		}elseif($type==4){
			$activity->report_send_id = $userid;
			$activity->report_send_date = $date;
			$activity->save();	
		}elseif($type==5){
			$activity->report_accept_id= $userid;
			$activity->report_accept_date = $date;
			$activity->save();	
		}elseif($type==6){
			$activity->invoice_id = $userid;
			$activity->invoice_date = $date;
			$activity->save();				
		}else{
			throw new CHttpException(404,'Update ke Activity Gagal');
		}

		$this->redirect(array('request/view','id'=>$id));
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
}
