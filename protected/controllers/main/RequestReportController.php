<?php

class RequestreportController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','download','send','sendQuesioner'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','delete','update'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
				),
			array('allow',
				'actions'=>array('quesioner'),
				'users'=>array('*'),
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
		$model=new RequestReport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestReport']))
		{
			$model->attributes=$_POST['RequestReport'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_report));
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

		if(isset($_POST['RequestReport']))
		{
			$model->attributes=$_POST['RequestReport'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_report));
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
		$dataProvider=new CActiveDataProvider('RequestReport');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RequestReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RequestReport']))
			$model->attributes=$_GET['RequestReport'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestReport the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestReport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadToken($token)
	{
		$model=RequestReport::model()->findByAttributes(array('token'=>$token));
		if($model===null)
			throw new CHttpException(404,'Link Kuesioner atau Token anda sudah tidak valid.');
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
	 * @param RequestReport $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
			throw new CHttpException(404,'File Download Report tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/report/".$model->file;
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
		$model->send_id = YII::app()->user->id;
		$model->send_date = date('Y-m-d h:i:s');
		$model->save();

		$greet = $this->loadGreeting();

		//Data Request
		$request=$this->loadRequest($model->request_id);

		//Send Mail
		$message_title = "Laporan Pengujian";
		$message_content = 
		$greet."
		<p>Dear Bapak/ Ibu Perwakilan Perusahaan <b>".$request->Company->name."</b>, terlampir <i>softcopy</i> untuk Laporan Pengujian No. (".$request->code.") tanggal ".Yii::app()->dateFormatter->format("dd MMM yyyy", $request->date).".</p></br></br></br></br> Terimakasih.
		";
		$message_link = Yii::app()->theme->baseUrl."/registration/activation/";
		$message_button = "Konfirmasi";

		//Send Email
		$email->subject = $request->Company->name." - Laporan Pengujian No. (".$request->code.")";
		$email->addTo($request->Company->email);
		$email->setFrom(array('pnbp@pu.go.id' => 'PNBP - Kementerian PU'));

		// Email Attachment
		if($model->file!=""){	
			$message_link_payment = YiiBase::getPathOfAlias("webroot")."/image/files/report/".$model->file;
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
			Yii::app()->user->setFlash('Success', 'Laporan sudah Terkirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
		}else{
			Yii::app()->user->setFlash('Warning', 'Gagal Kirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
		}

	}	


	public function actionSendQuesioner($id)
	{
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;	

		//Data Report & Generate Token
		$model=$this->loadModel($id);
		$model->status = 1;
		$model->token = md5(date('Y-m-d h:i:s'));
		$model->quesioner_id = YII::app()->user->id;
		$model->quesioner_date = date('Y-m-d h:i:s');
		$model->quesioner_status = 1;
		$model->save();

		$greet = $this->loadGreeting();

		//Data Request
		$request=$this->loadRequest($model->request_id);

		//Send Mail
		$message_title = "Survei Kepuasan Pelanggan";
		$message_content = 
		$greet."
		<p>Dear Bapak/ Ibu Perwakilan Perusahaan <b>".$request->Company->name."</b>, terlampir <i>link</i> untuk mengisi Kuesioner Survei Kepuasan Pelanggan Puslitbang Perumahan & Pemukiman atas Pengujian No. (".$request->code.") tanggal ".Yii::app()->dateFormatter->format("dd MMM yyyy", $request->date).".</p>
		<p>Silahkan klik tombol <b>Isi Kuesioner</b> untuk mengisi Survei kepusan pelanggan PUSPERKIM tahun ".date('Y').". Survei ini bertujuan menggali masukan, persepsi dan saran dari pelanggan dalam rangka peningkatan kinerja PUSPERKIM.</p>
		<p>Data Nama / Perusahaan yang masuk akan dirahasiakan. Diharapkan dengan adanya survei ini, PUSPERKIM dapat meningkatkan pelayanan dan dapat memenuhi segala harapan pelanggan.</p>
		Terimakasih.
		";
		$message_link = Yii::app()->request->hostInfo."/pnbp/kuesioner/".$model->token;
		$message_button = "Isi Kuesioner";

		//Send Email
		$email->subject = "Survei Kepuasan ".$request->Company->name." atas Pengujian No. (".$request->code.")";
		$email->addTo($request->Company->email);
		$email->setFrom(array('pnbp@pu.go.id' => 'PNBP - Kementerian PU'));

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
			Yii::app()->user->setFlash('Success', 'Link Kuesioner sudah Terkirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
		}

	}	


	public function actionQuesioner($token)
	{
		$this->layout = "intro";
		$model=$this->loadToken($token);
		$request=$this->loadRequest($model->request_id);
		$quesioner=new RequestQuesioner;
		$quesioner->setScenario('create');

		if($model->quesioner_status==1){

			$this->performAjaxValidation($quesioner);
			if(isset($_POST['RequestQuesioner']))
			{
				$quesioner->attributes=$_POST['RequestQuesioner'];
				$quesioner->created_id = $request->company_id;
				$quesioner->created_date = date('Y-m-d h:i:s');
				$quesioner->company_id = $request->company_id;
				$quesioner->request_id = $model->request_id;
				$quesioner->report_id = $model->id_report;

				if(!is_array($quesioner->unit)) $quesioner->unit = array();
				$quesioner->unit = implode(',', $quesioner->unit);

				if($quesioner->save()){

					$model->status = 1;
					$model->quesioner_status = 2;
					$model->save();
					$this->refresh();
				}
			}

			$this->render('quesioner',array(
				'model'=>$model,
				'quesioner'=>$quesioner,
				'request'=>$request,
				));

		}else{

			$this->render('quesioner_finish',array(
				'model'=>$model,
				'quesioner'=>$quesioner,
				'request'=>$request,
				));
		}

	}	


}
