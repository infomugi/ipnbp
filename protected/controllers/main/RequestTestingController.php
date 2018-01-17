<?php

class RequesttestingController extends Controller
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
				'actions'=>array('create','update','view','delete','admin','index','changeimage','enable','disable','search','remove'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('allow',
				'actions'=>array('view','search','update','delete','remove'),
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
		$model=new RequestTesting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RequestTesting']))
		{
			$model->attributes=$_POST['RequestTesting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_testing));
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
		Yii::import('ext.multimodelform.MultiModelForm');
		$model=$this->loadModel($id);
		$model->setScenario('update');

		$member = new RequestTestingPrice;
        $validatedMembers = array(); //ensure an empty array

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if(isset($_POST['RequestTesting']))
        {
        	$model->attributes=$_POST['RequestTesting'];
        	$model->update_id = YII::app()->user->id;
        	$model->update_date = date('Y-m-d h:i:s');	
        	$masterValues = array ('request_testing_id'=>$model->id_testing);
        	if(MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues) && $model->save()){
        		Yii::app()->user->setFlash('Success', 'Tahap Pengujian berhasil di perbaharui.');
        		$this->redirect(array('request/view','id'=>$model->request_id));
        	}
        }

        $this->render('update',array(
        	'model'=>$model,
        	'member'=>$member,
        	'validatedMembers' => $validatedMembers,
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
		$detail=RequestSchedule::model()->deleteAll('testing_id=:testing_id',array(':testing_id'=>$model->id_testing)); 
		$detail=RequestTestingPrice::model()->deleteAll('request_testing_id=:request_testing_id',array(':request_testing_id'=>$model->id_testing)); 
		$activity=$this->loadActivity($id);
		$activity->delete();		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionRemove($id,$requestid)
	{
		$model=$this->loadModel($id);
		$detail=RequestSchedule::model()->deleteAll('testing_id=:testing_id',array(':testing_id'=>$model->id_testing)); 
		$detail=RequestTestingPrice::model()->deleteAll('request_testing_id=:request_testing_id',array(':request_testing_id'=>$model->id_testing)); 
		$activity=$this->loadActivity($id);
		$activity->delete();
		$model->delete();

		Yii::app()->user->setFlash('Warning', 'Tahap Pengujian berhasil di hapus.');
		$this->redirect(array('request/view','id'=>$requestid));
	}	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RequestTesting');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RequestTesting('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RequestTesting']))
			$model->attributes=$_GET['RequestTesting'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RequestTesting the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RequestTesting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadUnit($id)
	{
		$model=Unit::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->name;
	}
	
	public function loadCategory($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->name;
	}	

	public function loadActivity($id)
	{
		$model=Activities::model()->findByAttributes(array('subject_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		

	/**
	 * Performs the AJAX validation.
	 * @param RequestTesting $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='request-testing-form')
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

	public function actionSearch()
	{
		$name='';
		$part='';
		$category='';
		$part_id='';
		$category_id='';
		$id_testing='';
		$time='';
		$price='';

		$criteria = new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		$itu = Testing::model()->findAll($criteria);		

		foreach($itu as $i=>$ii)
		{
			if($_POST['data']==$ii->id_testing)
			{
				$id_testing=$ii->id_testing;
				$part_id=$ii->part_id;
				$category_id=$ii->category_id;
				$name=$ii->name;
				$part=$this->loadUnit($ii->part_id);
				$category=$this->loadCategory($ii->category_id);
				$time=$ii->time;
				$price=$ii->price;
			}		      
		}        

		echo CJSON::encode(array(
			'id_testing'=>$id_testing,
			'category_id'=>$category_id,
			'part_id'=>$part_id,
			'name'=>$name,
			'part'=>$part,
			'category'=>$category,
			'time'=>$time,
			'price'=>$price,
			));
		Yii::app()->end();
	}				
}
