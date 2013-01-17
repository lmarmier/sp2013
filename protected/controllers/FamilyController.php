<?php

class FamilyController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('ajax','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','ajax'),
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
		if(User::model()->findByAttributes(array('user'=>Yii::app()->user->id))->project_id !== $this->loadModel($id)->form_id && Yii::app()->user->id != 'admin'){
			$this->redirect(array('site/error'), true, '403');
		}
		$this->layout = "//layouts/column1";
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id=0)
	{
		$this->layout = "//layouts/inscrip";
		$model=new Family;
		$modelParticipant = new Participant;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$this->performAjaxValidation($modelParticipant);

		if(isset($_POST['Family']))
		{
			//CVarDumper::dump($_POST, 10, true);
			//*
			$model->attributes=$_POST['Family'];
			//$p = new array();
			if($model->save()){
				foreach($_POST['Participant'] as $participant){
					$modelParticipant = new Participant;
					$modelParticipant->attributes=$participant;
					$modelParticipant->family_id=$model->id;
					$modelParticipant->save();
					//Ajout du tableau des id des participant
					$part[] = $modelParticipant;
				}
				foreach($_POST['Participation'] as $d => $p){
					$modelParticipation = new Participation;
					$modelParticipation->attributes = $p;
					$modelParticipation->date = $d;
					$modelParticipation->family_id = $model->id;
					//CVarDumper::dump($modelParticipation,10,true);
					$modelParticipation->save();
				}
				
				//CVarDumper::dump($part,10,true);
				//*
				//foreach($part as $pa){
					//echo $pa->id;
					//$model = new Participant;
					//$model = $model->findByPk($pa->id);
					//CVarDumper::dump($model,10,true);
					$this->layout = "//layouts/mail";
					//Envoi du mail au participant
					$message = $this->render('view', array(
						'model'=>$model,
					), true);
					
					//CVarDumper::dump($model,10,true);
					
					$headers="From: Fabricants de joie <info@fabricantsdejoie.ch>\r\n".
							"Reply-To: info@fabricantsdejoie.ch\r\n".
							"MIME-Version: 1.0\r\n".
							"Content-type: text/html; charset=UTF-8";
		
					mail($model->mail.',lionel.marmier@fabricantsdejoie.ch, info@fabricantsdejoie.ch','[SP2013 '. $model->form->camp->city. '] - Confirmation de votre inscription au Service Pâques 2012',$message,$headers);
				//}
				//*/
				
				//$this->redirect(array('view','id'=>$model->id));
				$this->render('success');
				
				
				exit;	
			}
			//*
		}
		
		$model->form_id = $id;
		$modelProject = Project::model()->findByPk($id);
		$modelParticipant = new Participant;

		$this->render('create',array(
			'model'=>$model,
			'modelParticipant'=>$modelParticipant,
			'modelProject'=>$modelProject,
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

		if(isset($_POST['Family']))
		{
			$model->attributes=$_POST['Family'];
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Family', array(
			'criteria'=>array(
				'condition'=>'form_id='.User::model()->findByAttributes(array('user'=>Yii::app()->user->id))->project_id,
			),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Family('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Family']))
			$model->attributes=$_GET['Family'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionAjax($id)
	{
		$this->layout = false;
		$this->render('ajax', array(
			'id'=>$id,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Family::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='family-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
