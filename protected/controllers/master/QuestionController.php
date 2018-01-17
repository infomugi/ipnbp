<?php

class QuestionController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','edit','add','answer','new','upload','cetak'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','index','answer','upload','cetak'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),		
			));

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Question;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			$model->status = 1;
			$model->type = 1;

			if($model->save())
			{
				$this->redirect(array('master/question/update','id'=>$model->id_question));
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

		$this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];

			$masterValues = array ('question_id'=>$model->id_question);
			if($model->save()){
				$this->redirect(array('master/question/view','id'=>$model->id_question));
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
	public function actionIndex($type)
	{
		$dataProvider=new CActiveDataProvider('Question',array('criteria'=>array('condition'=>'type='.$type)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'type'=>$type,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Question('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Question the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Question::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadAnswer($id)
	{
		$model=Answer::model()->findByPk($id);
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

	/**
	 * Performs the AJAX validation.
	 * @param Question $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
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

	public function actionCetak($token){
		$model=$this->loadToken($token);
		$request=$this->loadRequest($model->request_id);
		$quesioner=new RequestQuesioner;

		$result = "";
		if(isset($_POST['answers'])){
			$answers = $_POST['answers'];
			$jumlah_dipilih = count($answers);
			for($i=1;$i<=$jumlah_dipilih;$i++){
				$result .= $answers[$i].",";
				// $ini = "$"."quesioner"."-".">"."question_".$i;
				// $ini = $answers[$i];
			}

			$quesioner->created_date = date('Y-m-d h:i:s');
			$quesioner->created_id = $request->company_id;
			$quesioner->company_id = $request->company_id;
			$quesioner->request_id = $model->request_id;
			$quesioner->report_id = $model->id_report;
			$quesioner->answers = $result;

			if($quesioner->save()){
				echo $result;
				echo "Berhasil Disimpan";
			}else{
				echo "Gagal Simpan";
			}

		}	

	}
}
