<?php

class RequestpaymentController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','send','print','upload','uploadpayment','search','downloadpayment','download'),
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
		$model=new RequestPayment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestPayment']))
		{
			$model->attributes=$_POST['RequestPayment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_payment));
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

		if(isset($_POST['RequestPayment']))
		{
			$model->attributes=$_POST['RequestPayment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_payment));
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
		$dataProvider=new CActiveDataProvider('RequestPayment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RequestPayment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RequestPayment']))
			$model->attributes=$_GET['RequestPayment'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestPayment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestPayment::model()->findByPk($id);
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
	 * @param RequestPayment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-payment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
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

	public function actionUpload($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('upload');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestPayment']))
		{
			$model->attributes=$_POST['RequestPayment'];

			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'file'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'file'); 
				$model->file="bukti-pembayaran-".$id.'.'.$tmp->extensionName; 
			}

			if($model->save()){

				if(strlen(trim($model->file)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/payment/'.$model->file);	
				} 		

				Yii::app()->user->setFlash('Success', 'Bukti Pembayaran atas Invoice No. '.$model->Invoice->code.' Disimpan.');

				$this->redirect(array('request/view','id'=>$model->request_id));
			}
		}

		$this->render('upload',array(
			'model'=>$model,
			));
	}

	public function actionUploadPayment($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('upload_payment');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestPayment']))
		{
			$model->attributes=$_POST['RequestPayment'];

			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'file_payment'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'file_payment'); 
				$model->file_payment="kwitansi-".$id.'.'.$tmp->extensionName; 
			}

			if($model->save()){

				if(strlen(trim($model->file_payment)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/receipt/'.$model->file_payment);	
				} 		

				Yii::app()->user->setFlash('Success', 'Kwintansi atas Invoice No. '.$model->Invoice->code.' Disimpan.');

				$this->redirect(array('request/view','id'=>$model->request_id));
			}
		}

		$this->render('upload_payment',array(
			'model'=>$model,
			));
	}	

	public function actionSearch()
	{
		$id_invoice='';
		$code='';
		$balance='';
		$total='';

		$criteria = new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		$itu = RequestInvoice::model()->findAll($criteria);		

		foreach($itu as $i=>$ii)
		{
			if($_POST['data']==$ii->id_invoice)
			{
				$id_invoice=$ii->id_invoice;
				$code=$ii->code;
				$balance=$ii->balance;
				$total=$ii->total;
			}		      
		}        

		echo CJSON::encode(array(
			'id_invoice'=>$id_invoice,
			'code'=>$code,
			'balance'=>$balance,
			'total'=>$total,
			));
		Yii::app()->end();
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
		if($model->file==""){
			throw new CHttpException(404,'File Download Bukti Pembayaran tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/payment/".$model->file;
			$this->downloadFile($path);
		}

	}	

	public function actionDownloadPayment($id){
		$model=$this->loadModel($id);
		if($model->file_payment==""){
			throw new CHttpException(404,'File Download Kwitansi tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/receipt/".$model->file_payment;
			$this->downloadFile($path);
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
		$message_title = "Faktur Pembayaran";
		$message_confirm = "<p>Silahkan klik tombol <b>Konfirmasi</b> apabila file ini sudah diterima. Apabila file tidak terlampir harap segera hubungi petugas kami.</p></br></br></br></br>";
		$message_content = 
		$greet."
		<p>Dear Bapak/ Ibu Perwakilan Perusahaan <b>".$request->Company->name."</b>, terlampir <i>softcopy</i> untuk Faktur Pembayaran No. (".$model->code.") tanggal ".Yii::app()->dateFormatter->format("dd MMM yyyy", $model->date).".</p></br></br></br></br> Terimakasih.
		";
		$message_link = Yii::app()->theme->baseUrl."/registration/activation/";
		$message_button = "Konfirmasi";

		//Send Email
		$email->subject = $request->Company->name." - Faktur Pembayaran (".$model->code.")";
		$email->addTo($request->Company->email);
        $email->setFrom(array('pnbp@pu.go.id' => 'PNBP - Kementerian PU'));

		// Email Attachment
		if($model->file!=""){	
			$message_link_payment = YiiBase::getPathOfAlias("webroot")."/image/files/payment/".$model->file;
			$swiftAttachment_payment = Swift_Attachment::fromPath($message_link_payment);              
			$email->attach($swiftAttachment_payment);
		}
		if($model->file_payment!=""){	
			$message_link_payment = YiiBase::getPathOfAlias("webroot")."/image/files/receipt/".$model->file_payment;
			$swiftAttachment_payment = Swift_Attachment::fromPath($message_link_payment);              
			$email->attach($swiftAttachment_payment);
		}

		// Email Template
		$message_template = $this->renderPartial('/email/notifikasi',
			array(
				'email'=>$request->Company->email,
				'title'=>$message_title,
				'message'=>$message_content,
				'link'=>$message_link,
				'button'=>$message_button
				),TRUE);

		$email->setBody($message_template, 'text/html');
		if(Yii::app()->mail->send($email)){
			Yii::app()->user->setFlash('Success', 'Faktur Pembayaran sudah Terkirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
		}

	}	


}
