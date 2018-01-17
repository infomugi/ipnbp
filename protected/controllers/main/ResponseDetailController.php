<?php

class ResponsedetailController extends Controller
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
			// 'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','download'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','download'),
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
	public function actionCreate($request,$response)
	{
		$model=new ResponseDetail;
		$model->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ResponseDetail']))
		{
			$model->attributes=$_POST['ResponseDetail'];
			$model->request_id = $request;
			$model->response_id = $response;
			$model->created_id = YII::app()->user->id;
			$model->created_date = date('Y-m-d h:i:s');
			$model->status = 1;	

			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'letter_attachment'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'letter_attachment'); 
				$model->letter_attachment="surat-tanggapan-".$model->request_id.'-'.time().'.'.$tmp->extensionName; 
			}

			if($model->save()){

				if(strlen(trim($model->letter_attachment)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/response/'.$model->letter_attachment);	
				} 				

				Yii::app()->user->setFlash('Success', 'Tambahan Lampiran Surat Tanggapan Permohonan Pengujian Disimpan.');


				$this->redirect(array('request/view','id'=>$model->request_id));
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

		if(isset($_POST['ResponseDetail']))
		{
			$model->attributes=$_POST['ResponseDetail'];
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'letter_attachment'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'letter_attachment'); 
				$model->letter_attachment="surat-tanggapan-".$model->request_id.'-'.time().'.'.$tmp->extensionName; 
			}	
			if($model->save()){
				Yii::app()->user->setFlash('Success', 'Tambahan Lampiran Surat Tanggapan Permohonan Pengujian Disimpan.');
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
	public function actionDelete($id,$requestid)
	{
		$this->loadModel($id)->delete();
		Yii::app()->user->setFlash('Warning', 'Tambahan Lampiran Surat Tanggapan Dihapus.');
		$this->redirect(array('request/view','id'=>$requestid));
		
		// if(!isset($_GET['ajax']))
			// $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ResponseDetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ResponseDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ResponseDetail']))
			$model->attributes=$_GET['ResponseDetail'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ResponseDetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ResponseDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ResponseDetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='response-detail-form')
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

	public function downloadFile($fullpath){
		if(!empty($fullpath)){ 
			header("Content-type:application/pdf"); 
			header('Content-Disposition: attachment; filename="'.basename($fullpath).'"'); 
			header('Content-Length: ' . filesize($fullpath));
			readfile($fullpath);
			Yii::app()->end();
		}
	}

	public function actionDownload($id){
		$model=$this->loadModel($id);
		if($model->letter_attachment==""){
			throw new CHttpException(404,'File Download Detail Surat Tanggapan tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/response/".$model->letter_attachment;
			$this->downloadFile($path);
		}

	}	


}
