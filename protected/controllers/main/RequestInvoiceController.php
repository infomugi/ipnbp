<?php

class RequestInvoiceController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','print','upload','downloadinvoice','downloadspk'),
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
		$model=new RequestInvoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestInvoice']))
		{
			$model->attributes=$_POST['RequestInvoice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_invoice));
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

		if(isset($_POST['RequestInvoice']))
		{
			$model->attributes=$_POST['RequestInvoice'];
			if($model->save())
				$this->redirect(array('request/view','id'=>$model->request_id));
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
		$model=$this->loadModel($id);
		$detail=RequestPayment::model()->deleteAll('invoice_id=:invoice_id',array(':invoice_id'=>$model->id_invoice)); 
		$model->delete();
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RequestInvoice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RequestInvoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RequestInvoice']))
			$model->attributes=$_GET['RequestInvoice'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestInvoice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestInvoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RequestInvoice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-invoice-form')
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

	public function actionPrint($id)
	{
		$this->layout = "print";
		$update=$this->loadModel($id);
		$update->setScenario('print');

		// IF Invoice Print
		$update->print_by = YII::app()->user->id;
		$update->print_date = date("Y-m-d h:i:s");
		$update->print_click += 1;
		$update->save();

		$this->render('print',array(
			'model'=>$this->loadModel($id),
			));
	}	

	public function actionUpload($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('upload');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestInvoice']))
		{
			$model->attributes=$_POST['RequestInvoice'];

			$tmp1;
			if(strlen(trim(CUploadedFile::getInstance($model,'file_invoice'))) > 0) 
			{ 
				$tmp1=CUploadedFile::getInstance($model,'file_invoice'); 
				$model->file_invoice="invoice-".$model->code.'-'.mktime().'.'.$tmp1->extensionName; 
			}

			if($model->save()){

				if(strlen(trim($model->file_invoice)) > 0){
					$tmp1->saveAs(Yii::getPathOfAlias('webroot').'/image/files/invoice/'.$model->file_invoice);	
				} 

				Yii::app()->user->setFlash('Success', 'File Invoice No. '.$model->code.' Diupload.');

				$this->redirect(array('request/view','id'=>$model->request_id));
			}
		}

		$this->render('upload',array(
			'model'=>$model,
			));
	}		

	public function downloadFile($fullpath){
		if(!empty($fullpath)){ 
			header("Content-type:application/pdf"); 
			header('Content-Disposition: attachment; filename="'.basename($fullpath).'"'); 
			header('Content-Length: ' . filesize($fullpath));
			readfile($fullpath);
			Yii::app()->end();
		}
	}

	public function actionDownloadInvoice($id){
		$model=$this->loadModel($id);
		if($model->file_invoice==""){
			throw new CHttpException(404,'File Download Invoice tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/invoice/".$model->file_invoice;
			$this->downloadFile($path);
		}

	}

	public function actionDownloadSpk($id){
		$model=$this->loadModel($id);

		if($model->file_spk==""){
			throw new CHttpException(404,'File Download SPK tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/spk/".$model->file_spk;
			$this->downloadFile($path);
		}
	}		


}
