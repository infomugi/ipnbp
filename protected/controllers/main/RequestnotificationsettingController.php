<?php

class RequestnotificationsettingController extends Controller
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
				'actions'=>array('update'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),		
			array('deny',
				'users'=>array('*'),
				),
			);
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel(1);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['RequestNotificationSetting']))
		{
			$model->attributes=$_POST['RequestNotificationSetting'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_notification_setting));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestNotificationSetting the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestNotificationSetting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RequestNotificationSetting $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-notification-setting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}		
}
