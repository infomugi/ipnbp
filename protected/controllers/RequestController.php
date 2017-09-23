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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','calendarcompany','calendarrequest','detail','disposition','calendarrequestdivision','downloadrequest','downloaddisposition'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','admin','calendarrequest','calendarcompany','detail','calendarrequestdivision','downloadrequest','downloaddisposition'),
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
		// $this->layout="page";
		//Form Permohonan
		$model=$this->loadModel($id);
		$disposition=$this->loadModel($id);

		if(YII::app()->user->record->level==2):

			// if($model->status==1){
			$disposition=$this->loadDisposition($id);
		if($disposition->status=1){
		}else{
			$disposition->last_view = date('Y-m-d h:i:s');
			$disposition->status = 1;
			$disposition->save();
		}


		//Type = 1 (Response = Disposisi)
		if($model->status==1):
			$this->setActivity($id,1);
		// Kode 2 = Disposisi
		$model->status = 2;
		$model->save();
		endif;
		// }

		endif;

		$model->setScenario('update');
		$model->setScenario('disposition');
		if(isset($_POST['Request']))
		{
			$model->attributes=$_POST['Request'];
			$model->update_id = YII::app()->user->id;
			$model->update_date = date('Y-m-d h:i:s');	

			$disposition_letter=CUploadedFile::getInstance($model,'disposition_letter');
			$tmp2;
			if (!empty($disposition_letter)) {
				if(strlen(trim(CUploadedFile::getInstance($model,'disposition_letter'))) > 0) 
				{ 
					$tmp2=CUploadedFile::getInstance($model,'disposition_letter'); 
					$model->disposition_letter="surat-disposisi-".$model->code.'.'.$tmp2->extensionName; 
				}

			}

			if($model->save()){

				if (!empty($disposition_letter)) {

					if(strlen(trim($model->disposition_letter)) > 0){
						$tmp2->saveAs(Yii::getPathOfAlias('webroot').'/image/files/disposition/'.$model->disposition_letter);	

					} 
				} 

				Yii::app()->user->setFlash('Success', 'Permohonan Pengujian '.$model->Company->name.' telah Diperbaharui.');
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

			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($response,'letter_attachment'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($response,'letter_attachment'); 
				$response->letter_attachment="surat-tanggapan-".$model->code.'-'.mktime().'.'.$tmp->extensionName; 
			}

			if($response->save()){

				if(strlen(trim($response->letter_attachment)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/response/'.$response->letter_attachment);	
				} 				

				Yii::app()->user->setFlash('Success', 'Surat Tanggapan Permohonan Pengujian No. '.$response->letter_code.' Disimpan.');

				// if($model->status==2):
					// Kode 3 = Surat Tanggapan
				$model->status = 3;
				$model->save();
					//Type 2 = Tanggapan 
				$this->setActivity($id,2);
				// endif;				

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

			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($schedule,'file'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($schedule,'file'); 
				$schedule->file="file-rab-".$model->code.'-'.mktime().'.'.$tmp->extensionName; 
			}


			if($schedule->save()){

				if(strlen(trim($schedule->file)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/schedule/'.$schedule->file);	
				} 	

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
			$invoice->balance = $invoice->total;

			$tmp1;
			if(strlen(trim(CUploadedFile::getInstance($invoice,'file_invoice'))) > 0) 
			{ 
				$tmp1=CUploadedFile::getInstance($invoice,'file_invoice'); 
				$invoice->file_invoice="invoice-".$model->code.'-'.mktime().'.'.$tmp1->extensionName; 
			}

			$tmp2;
			if(strlen(trim(CUploadedFile::getInstance($invoice,'file_spk'))) > 0) 
			{ 
				$tmp2=CUploadedFile::getInstance($invoice,'file_spk'); 
				$invoice->file_spk="spk-".$model->code.'-'.mktime().'.'.$tmp2->extensionName; 
			}			


			if($invoice->save()){

				if(strlen(trim($invoice->file_invoice)) > 0){
					$tmp1->saveAs(Yii::getPathOfAlias('webroot').'/image/files/invoice/'.$invoice->file_invoice);	
				} 

				if(strlen(trim($invoice->file_spk)) > 0){
					$tmp2->saveAs(Yii::getPathOfAlias('webroot').'/image/files/spk/'.$invoice->file_spk);	
				} 					

				//Type = 3 (Payment = Invoice)
				Yii::app()->user->setFlash('Success', 'Invoice No. '.$invoice->code.' Disimpan.');
				// if($model->status==3):
				// Kode 4 = Invoice
				$model->status = 4;
				$model->save();
				//Type 6 = Invoice 
				$this->setActivity($id,6);
				// endif;

				$this->redirect(array('view','id'=>$id));
			}
		}


		//Data Pembayaran
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
			$balance = RequestPayment::model()->findGrandTotalInvoice($payment->invoice_id,$payment->total);
			$payment->balance = $balance;

			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($payment,'file'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($payment,'file'); 
				$payment->file="bukti-pembayaran-".$model->code.'-'.mktime().'.'.$tmp->extensionName; 
			}

			if($payment->save()){

				$invoice=$this->loadInvoice($payment->invoice_id);
				$invoice->balance = $payment->balance;
				$invoice->save();

				if(strlen(trim($payment->file)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/payment/'.$payment->file);	
				} 		

				Yii::app()->user->setFlash('Success', 'Pembayaran atas Invoice No. '.$payment->Invoice->code.' Disimpan.');

				// if($model->status==4):
				// Kode 6 = Laporan Dikirim
				$model->status = 5;
				$model->save();
				//Type 5 = Report 
				$this->setActivity($id,3);	
				// endif;					


				$this->redirect(array('view','id'=>$id));
			}
		}

		//Data Invoice
		$dataPayment=new CActiveDataProvider('RequestPayment',array('criteria'=>array('condition'=>'request_id='.$id)));

		// Form Report
		$report=new RequestReport;
		$this->performAjaxValidation($report);
		if(isset($_POST['RequestReport']))
		{
			$report->attributes=$_POST['RequestReport'];
			$report->created_id = YII::app()->user->id;
			$report->created_date = date('Y-m-d h:i:s');
			$report->status = 1;		
			$report->request_id = $id;	

			$report->file=CUploadedFile::getInstance($report,'file');
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($report,'file'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($report,'file'); 
				$report->file="laporan-".$model->code.'.'.$tmp->extensionName; 
			}

			if($report->save()){

				if(strlen(trim($report->file)) > 0){
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/files/report/'.$report->file);	
				} 
				// if($model->status==5):
				// Kode 6 = Laporan Dikirim
				$model->status = 6;
				$model->save();
				//Type 5 = Report 
				$this->setActivity($id,5);	
				// endif;			

				$this->redirect(array('view','id'=>$id));
			}
		}
		$dataReport=new CActiveDataProvider('RequestReport',array('criteria'=>array('condition'=>'request_id='.$id)));

		//Data Activity
		$activity=$this->loadActivity($id);


		$disposition=new RequestDisposition;
		$disposition->setScenario('create');
		if(isset($_POST['RequestDisposition']))
		{
			$disposition->attributes=$_POST['RequestDisposition'];
			$disposition->created_date = date('Y-m-d h:i:s');
			$disposition->created_by = YII::app()->user->id;
			$disposition->request_id = $id;
			$disposition->status = 0;
			if($disposition->save()){
				Yii::app()->user->setFlash('Success', 'Berhasil di Disposisi ke '.$disposition->Balai->name.'.');
				$this->redirect(array('request/view','id'=>$disposition->request_id));
			}
		}		

		//Data Disposisi
		$dataDisposition=new CActiveDataProvider('RequestDisposition',array('criteria'=>array('condition'=>'request_id='.$id)));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'disposition'=>$disposition,
			'dataDisposition'=>$dataDisposition,
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
			'report'=>$report,
			'dataReport'=>$dataReport,
			'activity'=>$activity,
			));

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

			$model->disposition_letter=CUploadedFile::getInstance($model,'disposition_letter');
			$tmp2;
			if(strlen(trim(CUploadedFile::getInstance($model,'disposition_letter'))) > 0) 
			{ 
				$tmp2=CUploadedFile::getInstance($model,'disposition_letter'); 
				$model->disposition_letter="surat-disposisi-".Request::model()->generateRandomString().'.'.$tmp2->extensionName; 
			}
			
			$model->letter_attachment=CUploadedFile::getInstance($model,'letter_attachment');
			$tmp1;
			if(strlen(trim(CUploadedFile::getInstance($model,'letter_attachment'))) > 0) 
			{ 
				$tmp1=CUploadedFile::getInstance($model,'letter_attachment'); 
				$model->letter_attachment="surat-permohonan-".Request::model()->generateRandomString().'.'.$tmp1->extensionName; 
			}




			if($model->save()){

				if(strlen(trim($model->letter_attachment)) > 0){
					$tmp1->saveAs(Yii::getPathOfAlias('webroot').'/image/files/request/'.$model->letter_attachment);	
				} 

				if(strlen(trim($model->disposition_letter)) > 0){
					$tmp2->saveAs(Yii::getPathOfAlias('webroot').'/image/files/disposition/'.$model->disposition_letter);	
				} 

				$update=$this->loadModel($model->id_request);
				if($model->disposition_letter==""){
					$update->status = 1;
					$activity->activity_date = date('Y-m-d h:i:s');
					$activity->request_id = $model->id_request;
					$activity->request_date = date('Y-m-d h:i:s');
				}else{
					$update->status = 2;
					$activity->activity_date = date('Y-m-d h:i:s');
					$activity->request_id = $model->id_request;
					$activity->request_date = date('Y-m-d h:i:s');
					$activity->approve_id = YII::app()->user->id;
					$activity->approve_date = date('Y-m-d h:i:s');
				}

				if($activity->save() && $update->save());{
					Yii::app()->user->setFlash('Info', 'Permohonan Pengujian telah Disimpan.');
					$this->redirect(array('view','id'=>$model->id_request));
				}

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

	public function loadCompany($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->name;
	}	

	public function loadActivity($id)
	{
		$model=RequestActivity::model()->findByAttributes(array('request_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	public function loadInvoice($id)
	{
		$model=RequestInvoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadDisposition($id)
	{
		$model=RequestDisposition::model()->findByAttributes(
			array('request_id'=>$id,'disposition_to'=>YII::app()->user->record->division)
			);
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

		// $this->redirect(array('request/view','id'=>$id));
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

	public function actionCalendarCompany()
	{       
		$items = array();
		$id = YII::app()->user->id;
		$criteria = new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		$model = Request::model()->findAll($criteria);

		foreach ($model as $value) {
			$items[]=array(
				'id'=>$value->id_request,
				'title'=>$value->Company->name,
				'start'=>$value->date,
				'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->date))),
				'color'=>$value->color,
				);
		}

		echo CJSON::encode($items);
		Yii::app()->end();
	}	

	public function actionCalendarRequest()
	{       
		$items = array();
		$id = YII::app()->user->id;
		$criteria = new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		$model = RequestSchedule::model()->findAll($criteria);

		foreach ($model as $value) {
			$items[]=array(
				'id'=>$value->request_id,
				'title'=>$this->loadCompany($value->Request->company_id) . " - " . $value->Request->letter_subject. " - ". $value->task . " Sample Ke-".$value->testing_number,
				'start'=>$value->start_date,
				'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->end_date))),
				'color'=>$value->Request->color,
				// 'allDay'=>true,
				);
		}

		echo CJSON::encode($items);
		Yii::app()->end();		
	}	


	public function actionCalendarRequestDivision($status,$balai)
	{       
		$items = array();
		$id = YII::app()->user->id;
		$criteria = new CDbCriteria();

		$criteria->join='LEFT JOIN request_testing AS a ON a.id_testing=t.testing_id LEFT JOIN ref_unit AS u ON u.id_unit=a.testing_part';
		$criteria->condition = 't.status=:status AND u.id_unit=:unit';
		$criteria->params = array(':status'=>$status,':unit'=>$balai);
		$model = RequestSchedule::model()->findAll($criteria);

		foreach ($model as $value) {
			$items[]=array(
				'id'=>$value->request_id,
				'title'=>$this->loadCompany($value->Request->company_id) . " - " . $value->Request->letter_subject. " - ". $value->task . " Sample Ke-".$value->testing_number,
				'start'=>$value->start_date,
				'end'=>date('Y-m-d', strtotime('+1 day', strtotime($value->end_date))),
				'color'=>$value->Request->color,
				// 'allDay'=>true,
				);
		}

		echo CJSON::encode($items);
		Yii::app()->end();		
	}				

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDetail($id)
	{
		$this->layout="page";

		//Data Pengujian
		$dataTesting=new CActiveDataProvider('RequestTesting',array('criteria'=>array('condition'=>'request_id='.$id)));

		//Data Penjadwalan
		$dataSchedule=new CActiveDataProvider('RequestSchedule',array('criteria'=>array('condition'=>'request_id='.$id)));

		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('detail',array(
				'model'=>$this->loadModel($id),
				'dataTesting'=>$dataTesting,
				'dataSchedule'=>$dataSchedule,				
				), false, true);
		}else{
			$this->render('detail',array(
				'model'=>$this->loadModel($id),
				'dataTesting'=>$dataTesting,
				'dataSchedule'=>$dataSchedule,	
				));
		}
	}	

	public function actionDisposition($id)
	{
		$model=$this->loadModel($id);
		$model->setScenario('disposition');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Request']))
		{
			$model->attributes=$_POST['Request'];
			$model->update_id = YII::app()->user->id;
			$model->update_date = date('Y-m-d h:i:s');	
			$model->status = 2;
			$model->disposition_letter=CUploadedFile::getInstance($model,'disposition_letter');
			$tmp2;
			if(strlen(trim(CUploadedFile::getInstance($model,'disposition_letter'))) > 0) 
			{ 
				$tmp2=CUploadedFile::getInstance($model,'disposition_letter'); 
				$model->disposition_letter="surat-disposisi-".$model->code.'.'.$tmp2->extensionName; 
			}

			if($model->save()){

				//Type = 1 (Response = Disposisi)
				$this->setActivity($id,1);

				if(strlen(trim($model->disposition_letter)) > 0){
					$tmp2->saveAs(Yii::getPathOfAlias('webroot').'/image/files/disposition/'.$model->disposition_letter);	
				} 

				$this->redirect(array('view','id'=>$model->id_request));
			}
		}

		$this->render('disposition',array(
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

	public function actionDownloadRequest($id){
		$model=$this->loadModel($id);
		if($model->letter_attachment==""){
			throw new CHttpException(404,'File Download Surat Permohonan tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/request/".$model->letter_attachment;
			$this->downloadFile($path);
		}

	}

	public function actionDownloadDisposition($id){
		$model=$this->loadModel($id);

		if($model->disposition_letter==""){
			throw new CHttpException(404,'File Download Surat Disposisi tidak Tersedia.');
		}else{
			$path = Yii::getPathOfAlias('webroot')."/image/files/disposition/".$model->disposition_letter;
			$this->downloadFile($path);
		}
	}		

}
