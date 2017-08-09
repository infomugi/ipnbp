<?php

class SiteController extends Controller
{
	public $debugMode = true;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
			    // 'backColor'=>0xFFFFFF,
				'foreColor'=>0x000000,
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				),
			);
	}

	public function accessRules() {
		return array('allow', 'actions' => array('captcha'), 'users' => array('*'));
	}
	

	/**
	 * Displays the : Intro Site
	 */
	public function actionIndex()
	{
		$this->actionLogin();			
	}

	/**
	 * Displays the : Backend Site
	 */
	public function actionDashboard()
	{
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			
			$this->layout="main";

			$dataUnread=new CActiveDataProvider('Message',array(
				'criteria'=>array(
					'condition'=>'user_id = '.YII::app()->user->id.' AND status=0',
					'order'=>'created_date DESC'
					)
				));	

			$dataActivity=new CActiveDataProvider('Activities',array(
				'criteria'=>array(
					'condition'=>'user_id = '.YII::app()->user->id,
					'order'=>'id_activities DESC'
					),
				'pagination'=>array(
					'pageSize'=>'20',
					)));				

			$this->render('dashboard',array(
				'dataUnread'=>$dataUnread,
				'dataActivity'=>$dataActivity
				));

		}
	}

	/**
	 * Displays the : List Icon
	 */
	public function actionIcon()
	{
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		} else {
			if(Yii::app()->user->record->level==1){
				$this->render('icon');
			}else{
				throw new CHttpException(403,'You not authorized to this perfom.');
			}
		}
	}


	/**
	 * Displays the : Contact US
	 */
	public function actionContact()
	{
		$this->layout="frontend";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;
		$message=new Message;
		if(isset($_POST['Message']))
		{
			$message->attributes=$_POST['Message'];
			$message->created_date = date('Y-m-d H:i:s');
			$message->status = 0;
			$message->user_id = 1;

			//Send Email
			$email->subject = "Ada Pesan dari ".$message->name." : ".$message->email;
			$email->addTo('event@muslimahbaper.com');
			$email->setFrom(array('event@muslimahbaper.com' => 'EVENT - Muslimah Baper'));
			$message_template = $this->renderPartial('/email/notifikasi',
				array(
					'name'=>$message->name,
					'email'=>$message->email,
					'message'=>$message->message
					),TRUE);
			$email->setBody($message_template, 'text/html');	
			
			if($message->save() && Yii::app()->mail->send($email))
				$this->refresh();
			Yii::app()->user->setFlash('success', '<b>Sukses!</b> <i>Pesan Terkirim</i>');
		}	
		
		$this->render('contact',array(
			'message'=>$message
			));
	}	

	public function getToken($token)
	{
		$model=Users::model()->findByAttributes(array('token'=>$token));
		if($model===null)
			throw new CHttpException(404,'Token anda tidak valid atau telah kadaluarsa.');
		return $model;
	}			

	public function loadEmail($email)
	{
		$model=Users::model()->findByAttributes(array('email'=>$email));
		if($model===null)
			throw new CHttpException(404,'Email yang anda masukan tidak terdaftar dalam sistem kami.');
		return $model;
	}	

	public function loadRegistration($token)
	{
		$model=Registration::model()->findByAttributes(array('token'=>$token));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = "error";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(Yii::app()->user->isGuest) {
			$model=new LoginForm;

			$this->layout = "signin";

			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login()){
					$id = Yii::app()->user->id;
					$name = Yii::app()->user->name;
					$ip = Yii::app()->request->getUserHostAddress();

					//$userid,$description,$activityid,$type,$point,$status
					Activities::model()->my($id,"Login from IP : ".$ip,1,1,2,1);

					if(YII::app()->user->record->level==1){
					// $this->redirect(Yii::app()->user->returnUrl);
						$this->redirect(array('site/dashboard'));
					}else{
						$this->redirect(array('users/profile','view'=>$name));
					}
				}
			}
			// display the login form
			$this->render('login',array('model'=>$model));

		} else {
			$this->redirect(array('site/dashboard'));
		}
	}	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		$model=Users::model()->findByPk(YII::app()->user->id);
		$model->setScenario('log');
		$model->active = 0;
		$ip = Yii::app()->request->getUserHostAddress();

		//$userid,$description,$activityid,$type,$point,$status
		Activities::model()->my(YII::app()->user->id,"Logout from IP : ".$ip,0,0,0,0);

		if($model->save()){
			Yii::app()->user->logout();
			$this->redirect(array('site/login'));
		}
	}

	public function actionSuccess()
	{
		$message=new Message;
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;

		//FORM: CONTACT
		if(isset($_POST['Message']))
		{
			$message->attributes=$_POST['Message'];
			$message->created_date = date('Y-m-d H:i:s');
			$message->status = 0;
			$message->read = 0;

			//Send Email
			$email->subject = "Ada Pesan dari ".$message->name." : ".$message->email;
			$email->addTo('infomugi@gmail.com');
			$email->setFrom(array('event@muslimahbaper.com' => 'EVENT - Muslimah Baper'));
			$message_template = $this->renderPartial('/email/notifikasi',
				array(
					'name'=>$message->name,
					'email'=>$message->email,
					'message'=>$message->message
					),TRUE);
			$email->setBody($message_template, 'text/html');
			Yii::app()->mail->send($email);	
			
			if($message->save()){

				Yii::app()->user->setFlash('Success', 'Message has been sent.');
				$this->refresh();
			}
		}

		$this->layout="page";
		$this->render('page',array(
			'message'=>$message
			));
	}	

	public function actionActivation($token)
	{
		$this->layout = "signin";
		Yii::import('ext.yii-mail.YiiMailMessage');
		$email = new YiiMailMessage;			
		$model=$this->loadRegistration($token);
		$model->status = 1;

		//Message Content
		$message_title = "Informasi Akun Anda";
		$message_content = 
		"Hallo <b>".$model->name."</b>, </br></br>
		Terimakasih atas partisipasinya pada acara ini, berikut data registrasi anda yang telah masuk dalam sistem kami. </br></br>
		Kontak : <b>".$model->phone."</b> </br>
		Email  : <b>".$model->email."</b> </br>
		Alamat : <b>".$model->address."</b> </br>
		Apabila data anda telah valid, kami akan mengirimkan e-tiket, yang dapat digunakan untuk masuk ke event kami melalui email anda.
		";
		$message_link = Yii::app()->baseUrl;
		$message_button = "Visit MuslimahBaper.com"; 	

		//Send Email
		$email->subject = "Hi ".$model->name.", Selamat akun anda berhasil di Aktivasi";
		$email->addTo($model->email);
		$email->setFrom(array('event@muslimahbaper.com' => 'EVENT - Muslimah Baper'));

		$message_template = $this->renderPartial('/email/informasi',
			array(
				'email'=>$model->email,
				'title'=>$message_title,
				'message'=>$message_content,
				'link'=>$message_link,
				'button'=>$message_button
				),TRUE);		

		$email->setBody($message_template, 'text/html');
		$model->save();
		Yii::app()->mail->send($email);
		Yii::app()->user->setFlash('Success','Registrasi anda berhasil di Verifikasi.');
		$this->redirect(array('success'));
		

	}		



}