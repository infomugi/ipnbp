<?php

class TestingController extends Controller
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
				'actions'=>array('load'),
				'users'=>array('@'),
				),			
			array('allow',
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable'),
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
		$model=new Testing;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Testing']))
		{
			$model->attributes=$_POST['Testing'];
			$model->status = 1;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_testing));
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

		if(isset($_POST['Testing']))
		{
			$model->attributes=$_POST['Testing'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_testing));
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
		$dataProvider=new CActiveDataProvider('Testing',array( 'pagination' => array(
			'pageSize' => 100,
			)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Testing('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Testing']))
			$model->attributes=$_GET['Testing'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Testing the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Testing::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Testing $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='testing-form')
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

	public function actionLoad()
	{
		$data=Testing::model()->findAll('category_id=:category_id AND part_id='.YII::app()->user->record->division, 
			array(':category_id'=>(int) $_POST['category_id']));

		$data=CHtml::listData($data,'id_testing','name');
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true,array(
					"empty"=>"- Pilih Jenis Pengujian -", 
					'class'=>'form-control select2',
					'ajax' => array(
						'type'=>'POST',
						'dataType'=>'json',
						'url'=>CController::createUrl('main/requesttesting/search'),
						'data' => "js:{data:$(this).val()}",
						'success'=>'function(data){
							$("#name").val(data.name);
							$("#part").val(data.part);
							$("#category").val(data.category);
							$("#time").val(data.time);
							$("#price").val(data.price);
							$("#RequestTesting_testing_type").val(data.id_testing);
							$("#RequestTesting_testing_part").val(data.part_id);
							$("#RequestTesting_testing_lab").val(data.category_id);
							$("#RequestTesting_testing_total").focus();
						}',),							
					));
		}
	}	
}
