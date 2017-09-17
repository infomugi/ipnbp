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

		}else{
			

			$dataTesting=new CActiveDataProvider('RequestTesting',array('criteria'=>array('condition'=>'testing_part='.YII::app()->user->record->division)));

			$dataDisposition=new CActiveDataProvider('RequestDisposition',array('criteria'=>array('condition'=>'disposition_to='.YII::app()->user->record->division)));

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
				'dataActivity'=>$dataActivity,
				'dataTesting'=>$dataTesting,
				'dataDisposition'=>$dataDisposition,
				));

		}
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
						$this->redirect(array('site/dashboard'));
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

	public function actionCalendar($filter)
	{
		if(Yii::app()->user->isGuest) {

			$this->redirect(array('site/login'));

		}else{

			$this->layout="page";			
			$balai = "";
			$status = 1;

			$this->render('calendar',array(
				'filter'=>$filter,
				'status'=>$status,
				'balai'=>$balai,
				));

		}
	}

	public function actionCalendarBalai()
	{
		if(Yii::app()->user->isGuest) {

			$this->redirect(array('site/login'));

		}else{
			$this->layout="page";			

			$balai = $_POST["balai"];
			$status = $_POST["status"];
			$filter = $_POST["filter"];

			$this->render('calendar',array(
				'filter'=>$filter,
				'status'=>$status,
				'balai'=>$balai,
				));

		}
	}			


}