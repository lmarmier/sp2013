<?php

class ProjectController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				  'actions'=>array('admin','delete','create','index','view','update','success'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * Generate a random passowrd
	 */
	public function pwgen($nb_car = 7, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
	{
	    $nb_lettres = strlen($chaine) - 1;
	    $generation = '';
	    for($i=0; $i < $nb_car; $i++)
	    {
	        $pos = mt_rand(0, $nb_lettres);
	        $car = $chaine[$pos];
	        $generation .= $car;
	    }
	    return $generation;
	}
	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new Project;
		$user=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']) && isset($_POST['User']))
		{
			$model->attributes=$_POST['Project'];
			$user->attributes=$_POST['User'];
			$pwd=$this->pwgen();
			$user->password=md5($pwd);
			if($model->save()){
				$user->project_id=$model->id;
				if($user->save()){
					$name='=?UTF-8?B?'.base64_encode($model->title).'?=';
					$subject='=?UTF-8?B?'.base64_encode($model->title).' - Service Pâques 2013?=';
					$headers="From: Fabricants de joie <{info@fabricantsdejoie.ch}>\r\n".
						"Reply-To: {info@fabricantsdejoie.ch}\r\n".
						"MIME-Version: 1.0\r\n".
						"Content-type: text/plain; charset=UTF-8";
						
					$message="Bonjour,\r\n\r\nVotre projet à été ajouté sur le site des fabricants de joie. Afin de vous connecter, nous vous transmettons vos identifiants :\r\n\r\n Login : $user->user \r\n Password : $pwd \r\n\r\n Vous pouvez vous connecter en vous rendant à l'adresse suivante : sp2013.lmarmier.ch";

					mail($user->user,$subject,$message);
					//$this->redirect(array('view','id'=>$model->id));
					$this->redirect(array('success','id'=>$model->id));
				}
			}
				
		}
		
		//Chargement des information du camp
		$campModel = Camp::model()->findByPk($id);
		$model->attributes = $campModel->attributes;

		$this->render('create',array(
			'model'=>$model,
			'user'=>$user,
			'campModel'=>$campModel,
		));
	}

	public function actionSuccess($id){
		$this->render('success',array('model'=>$this->loadModel($id)));
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

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$campModel = Camp::model()->findByPk($model->camp_id);
		$this->render('update',array(
			'model'=>$model,
			'campModel'=>$campModel,
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
	public function actionIndex($id = 0)
	{
		$dataProvider=new CActiveDataProvider('Project', array(
			'criteria'=>array(
				'condition'=>($id != 0)?'camp_id='.$id:'',
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
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

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
		$model=Project::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
