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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','send','print','uploadinvoice','uploadspk','downloadinvoice','downloadspk'),
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

	public function loadRequest($id)
	{
		$model=Request::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadCompany($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		

	public function loadGreeting(){
		date_default_timezone_set("Asia/Jakarta");
		$b = time();
		$hour = date("G",$b);

		if ($hour>=0 && $hour<=11)
		{
			return "Selamat Pagi";
		}
		elseif ($hour >=12 && $hour<=14)
		{
			return "Selamat Siang";
		}
		elseif ($hour >=15 && $hour<=17)
		{
			return "Selamat Sore";
		}
		elseif ($hour >=17 && $hour<=18)
		{
			return "Selamat Petang";
		}
		elseif ($hour >=19 && $hour<=23)
		{
			return "Selamat Malam";
		}
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

	public function actionSend($id)
	{
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;	

		//Data Invoice
		$model=$this->loadModel($id);
		$model->status = 1;
		$model->save();

		$greet = $this->loadGreeting();

		//Data Request
		$request=$this->loadRequest($model->request_id);

		//Send Mail
		$message_title = "Invoice & SPK";
		$message_content = 
		$greet."
		<p>Dear Bapak/ Ibu Perwakilan Perusahaan <b>".$request->Company->name."</b>, terlampir <i>softcopy</i> untuk Invoice No. (".$model->code.") tanggal ".Yii::app()->dateFormatter->format("dd MMM yyyy", $model->date)." dan SPK No. (".$model->spk_no.") tanggal ".Yii::app()->dateFormatter->format("dd MMM yyyy", $model->spk_date).".</p></br></br></br></br> <p>Silahkan klik tombol <b>Konfirmasi</b> apabila file ini sudah diterima. Apabila file tidak terlampir harap segera hubungi petugas kami.</p></br></br></br></br> Terimakasih.
		";
		$message_link = Yii::app()->theme->baseUrl."/registration/activation/";
		$message_button = "Konfirmasi";

		//Send Email
		$email->subject = $request->Company->name." - File Invoice (".$model->code.") dan SPK";
		$email->addTo($request->Company->email);
		$email->setFrom(array('pnbp@pu.go.id' => 'PNBP - Kementerian PU'));

		// Email Attachment
		if($model->file_invoice!=""){	
			$message_link_invoice = "http://192.168.43.29".Yii::app()->baseUrl."/image/files/invoice/".$model->file_invoice;
			$swiftAttachment_invoice = Swift_Attachment::fromPath($message_link_invoice);              
			$email->attach($swiftAttachment_invoice);
		}

		if($model->file_spk!=""){	
			$message_link_spk = "http://192.168.43.29".Yii::app()->baseUrl."/image/files/spk/".$model->file_spk;
			$swiftAttachment_spk = Swift_Attachment::fromPath($message_link_spk);              
			$email->attach($swiftAttachment_spk);
		}

		// Email Template
		$message_template = $this->renderPartial('/email/informasi',
			array(
				'email'=>$request->Company->email,
				'title'=>$message_title,
				'message'=>$message_content,
				'link'=>$message_link,
				'button'=>$message_button
				),TRUE);

		$email->setBody($message_template, 'text/html');
		if(Yii::app()->mail->send($email)){
			Yii::app()->user->setFlash('Success', 'Invoice & SPK sudah Terkirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
		}

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

	public function actionUploadInvoice($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('upload_invoice');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestInvoice']))
		{
			$model->attributes=$_POST['RequestInvoice'];

			$tmp1;
			if(strlen(trim(CUploadedFile::getInstance($model,'file_invoice'))) > 0) 
			{ 
				$tmp1=CUploadedFile::getInstance($model,'file_invoice'); 
				$model->file_invoice="invoice-".$id.'.'.$tmp1->extensionName; 
			}

			if($model->save()){

				if(strlen(trim($model->file_invoice)) > 0){
					$tmp1->saveAs(Yii::getPathOfAlias('webroot').'/image/files/invoice/'.$model->file_invoice);	
				} 

				Yii::app()->user->setFlash('Success', 'File Invoice No. '.$model->code.' Diupload.');

				$this->redirect(array('request/view','id'=>$model->request_id));
			}
		}

		$this->render('upload_invoice',array(
			'model'=>$model,
			));
	}		

	public function actionUploadSpk($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('upload_spk');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestInvoice']))
		{
			$model->attributes=$_POST['RequestInvoice'];

			$tmp1;
			if(strlen(trim(CUploadedFile::getInstance($model,'file_spk'))) > 0) 
			{ 
				$tmp1=CUploadedFile::getInstance($model,'file_spk'); 
				$model->file_spk="spk-".$id.'.'.$tmp1->extensionName; 
			}

			if($model->save()){

				if(strlen(trim($model->file_spk)) > 0){
					$tmp1->saveAs(Yii::getPathOfAlias('webroot').'/image/files/spk/'.$model->file_spk);	
				} 

				Yii::app()->user->setFlash('Success', 'File SPK No. '.$model->spk_no.' Diupload.');

				$this->redirect(array('request/view','id'=>$model->request_id));
			}
		}

		$this->render('upload_spk',array(
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
