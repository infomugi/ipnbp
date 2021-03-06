<?php

class ResponseController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','send','download','sendreject','downloadconfirmation','upload','uploadconfirmation'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index','download','sendreject','downloadconfirmation','upload','uploadconfirmation'),
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
		$model=new Response;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Response']))
		{
			$model->attributes=$_POST['Response'];
			$model->created_id = YII::app()->user->id;
			$model->created_date = date('Y-m-d h:i:s');
			$model->status = 1;			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_response));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Response']))
		{
			$model->attributes=$_POST['Response'];
			$model->update_id = YII::app()->user->id;
			$model->update_date = date('Y-m-d h:i:s');				
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_response));
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
		ResponseDetail::model()->deleteAll('response_id',$id);
		$this->loadModel($id)->delete();
		Yii::app()->user->setFlash('Warning', 'Lampiran Surat Tanggapan Dihapus.');
		$this->redirect(array('request/view','id'=>$requestid));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Response');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Response('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Response']))
			$model->attributes=$_GET['Response'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Response the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Response::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelResponseDetail($id)
	{
		$model = ResponseDetail::model()->deleteAll(array('response_id' => $id));
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
	 * @param Response $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='response-form')
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
		// $model->status = 1;
		// $model->save();

		$greet = $this->loadGreeting();

		//Data Request
		$request=$this->loadRequest($model->request_id);

		//Send Mail
		$message_title = "Surat Tanggapan";
		$message_confirm = "<p>Silahkan klik tombol <b>Konfirmasi</b> apabila file ini sudah diterima. Apabila file tidak terlampir harap segera hubungi petugas kami.</p></br></br></br></br>";
		$message_content = 
		$greet."
		<p>Dear Bapak/ Ibu Perwakilan Perusahaan <b>".$request->Company->name."</b>, terlampir <i>softcopy</i> Surat Tanggapan No. (".$model->letter_code.") tanggal ".Yii::app()->dateFormatter->format("dd MMM yyyy", $model->letter_date).".</p></br></br></br></br> Terimakasih.
		";
		$message_link = Yii::app()->request->hostInfo."/registration/activation/";
		$message_button = "Konfirmasi";

		//Send Email
		$email->subject = $request->Company->name." - Surat Tanggapan No.".$model->letter_code." (".$request->letter_subject.")";
		$email->addTo($request->Company->email);
		// $email->setFrom(array('pnbp@pu.go.id' => 'PNBP - Kementerian PU'));
		$email->setFrom(array('infomugi.com@gmail.com' => 'PNBP - Kementerian PU'));

		// Email Attachment
		if($model->letter_attachment!=""){	
			$message_link_response = YiiBase::getPathOfAlias("webroot")."/image/files/response/".$model->letter_attachment;
			$swiftAttachment = Swift_Attachment::fromPath($message_link_response);              
			$email->attach($swiftAttachment);
		}


		foreach (ResponseDetail::findDetailAttachment($model->id_response) as $data) {
			$link = YiiBase::getPathOfAlias("webroot")."/image/files/response/".$data['letter_attachment'];
			$email->attach(Swift_Attachment::fromPath($link));
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
			Yii::app()->user->setFlash('Success', 'Surat Tanggapan sudah Terkirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
		}

	}		

	public function actionSendReject($id)
	{
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;	
		$model=$this->loadModel($id);

		//Data Request
		$request=$this->loadRequest($model->request_id);

		//Send Mail
		$message_title = "Surat Tanggapan";
		$message_content = "<p>".$model->description_email."</p>";
		$message_link = Yii::app()->request->hostInfo."/registration/activation/";
		$message_button = "Konfirmasi";

		//Send Email
		$email->subject = $request->Company->name." - Surat Tanggapan No.".$model->letter_code." (".$request->letter_subject.")";
		$email->addTo($request->Company->email);
		$email->setFrom(array('pnbp@pu.go.id' => 'PNBP - Kementerian PU'));
		// $email->setFrom(array('infomugi.com@gmail.com' => 'PNBP - Kementerian PU'));

		// Email Attachment
		if($model->letter_attachment!=""){	
			$message_link_response = YiiBase::getPathOfAlias("webroot")."/image/files/response/".$model->letter_attachment;
			$swiftAttachment = Swift_Attachment::fromPath($message_link_response);              
			$email->attach($swiftAttachment);
		}

		foreach (ResponseDetail::findDetailAttachment($model->id_response) as $data) {
			$link = YiiBase::getPathOfAlias("webroot")."/image/files/response/".$data['letter_attachment'];
			$email->attach(Swift_Attachment::fromPath($link));
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
			Yii::app()->user->setFlash('Success', 'Surat Tanggapan sudah Terkirim ke Alamat Email '.$request->Company->email.'.');
			$this->redirect(array('request/view','id'=>$model->request_id));
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
		if($model->letter_attachment==""){
			throw new CHttpException(404,'File Download Surat Tanggapan tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/response/".$model->letter_attachment;
			$this->downloadFile($path);
		}

	}	

	public function actionDownloadConfirmation($id){
		$model=$this->loadModel($id);
		if($model->letter_attachment==""){
			throw new CHttpException(404,'File Download Lembar Konfirmasi tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/response/".$model->confirmation_attachment;
			$this->downloadFile($path);
		}
	}	

	public function actionUpload($id){
		$model=$this->loadModel($id);
		if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
				$sourcePath = $_FILES['userImage']['tmp_name'];
				$temp = explode(".", $_FILES['userImage']['name']);
				$newfilename = "surat-tanggapan-".$model->id_response . '.' . end($temp);
				$targetPath = "image/files/response/".$newfilename;
				if(move_uploaded_file($sourcePath,$targetPath)) {
					$model->letter_attachment = $newfilename;
					$model->save();
				}
			}
		}
	}

	public function actionUploadConfirmation($id){
		$model=$this->loadModel($id);
		if(is_array($_FILES)) {
			if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
				$sourcePath = $_FILES['userImage']['tmp_name'];
				$temp = explode(".", $_FILES['userImage']['name']);
				$newfilename = "surat-konfirmasi-".$model->id_response . '.' . end($temp);
				$targetPath = "image/files/response/".$newfilename;
				if(move_uploaded_file($sourcePath,$targetPath)) {
					$model->letter_attachment = $newfilename;
					$model->save();
				}
			}
		}
	}	


}
