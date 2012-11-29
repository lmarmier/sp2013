<?php

class ParticipantController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/vi/Volumes/Macintosh%20HD/Users/lionel/Sites/sp2013/protected/controllers/ParticipantController.phpews/layouts/column2.php'.
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
			array('deny',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','index'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete',),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
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
		$model = $this->loadModel($id);
		$model->check = "check";
		$model->save();
		
		//CVarDumper::dump($model, 10, true);
		
		echo $model->family->name;
		
		$view = $this->render('view',array(
			'model'=>$model,
		),'true');
		
		echo $view;
		
		//Envoi du mail au participant
		/*
		$headers="From: Fabricants de joie <{info@fabricantsdejoie.ch}>\r\n".
						"Reply-To: {info@fabricantsdejoie.ch}\r\n".
						"MIME-Version: 1.0\r\n".
						"Content-type: text/html; charset=UTF-8";
		
		mail($model->mail,'Confirmation de votre inscription au service pâques 2012',$view,$headers);
		//*/
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new Participant;
		$modelFamily=new Family;
		
		//CVarDumper::dump($_POST, 10, true);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Participant']))
		{			
			$model->attributes=$_POST['Participant'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'modelFamily'=>$modelFamily,
			'modelProject'=>Project::model()->findByPk($id),
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

		if(isset($_POST['Participant']))
		{
			$model->attributes=$_POST['Participant'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionIndex($id = null)
	{	
		$this->layout = "//layouts/column1";
	
		$model = new Participant('search');
		if($id==null){
					$project_id=(isset(User::model()->findByAttributes(array('user'=>Yii::app()->user->name))->project_id))?'='.User::model()->findByAttributes(array('user'=>Yii::app()->user->name))->project_id:'>=1';
		}
		else{
			if(User::model()->findByAttributes(array('user'=>Yii::app()->user->id))->project_id !== $id && Yii::app()->user->id != 'admin'){
				$this->redirect(array('site/error'), true, '403');
			}
			$project_id='='.$id;
		}
			$model = $model->with(array(
				'family'=>array('condition'=>'form_id'.$project_id),
			));
			$model->unsetAttributes();
			if(isset($_GET['Participant']))
				$model->attributes=$_GET['Participant'];	
		/*
		if($id == null){
			$dataProvider=new CActiveDataProvider('Participant');
		}
		else{
			$dataProvider=new CActiveDataProvider('Participant', array(
				'criteria'=>array(
					'condition'=>'family.form_id='.$id,
					'with'=>array('family'),
				),
			));
		}
		*/
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Participant('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Participant']))
			$model->attributes=$_GET['Participant'];

		//$model->setCriteria(array('order'=>'DESC'));
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Participant::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='participant-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
