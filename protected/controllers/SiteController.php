<?php

class SiteController extends Controller
{
    public $cs;
    public $fb_link;
    public $vk_link;
    public $tw_link;
    public $main;
    public $description = '';
    public $keywords = '';
    public $contacts = array();
    public $active_contact_id = array();

    public function init()
    {
        $this->cs = Yii::app()->clientScript;

        $this->cs->registerCoreScript('jquery');
        $this->cs->registerCssFile($this->createUrl('/css/style.css'));
        $this->cs->registerScriptFile($this->createUrl('/js/app.js'));
        $this->cs->registerScriptFile($this->createUrl('/js/action.js'));


        $this->main = Maine::model()->findByPk(1);

        $this->contacts = Contact::model()->findAllByAttributes(array('visible' => Contact::VISIBLE));

        Helper::selectCity($this->contacts);


        $this->active_contact_id = Yii::app()->session['contact_id'];


    }

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actionAbout()
    {
        $this->render('about');
    }


    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionContact()
    {
        $this->render('contact');
    }

    public function actionCatalog()
    {
        $this->render('catalog');
    }

    public function actionBrand()
    {
        $this->cs->registerScriptFile($this->createUrl('/dist/mobilyslider.js'));

        $this->render('brand');
    }


    public function actionCollection()
    {
        $this->cs->registerScriptFile($this->createUrl('/dist/mobilyslider.js'));

        $this->render('collection');
    }

    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->username = $_POST['LoginForm']['username'];
            $model->password = md5($_POST['LoginForm']['password']);
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect('/admin/');
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionCallback()
    {
        if (!isset($_POST['Callback'])) {
            echo CJSON::encode(array(
                'status' => 'error',
                'message' => 'Не корректный запрос',
            ));
            Yii::app()->end();
        }

        $callback = new Callback();
        $callback->attributes = $_POST['Callback'];

        if (!$callback->save()) {
            echo CJSON::encode(array(
                'status' => 'error',
                'model' => array("Callback" => $callback->getErrors())
            ));
            Yii::app()->end();
        }

        echo CJSON::encode(array(
            'status' => 'success',
        ));
    }

    public function actionDealership()
    {
        $this->render('dealership');
    }

    public function actionProjects()
    {

        $this->render('projects');
    }


    public function actionSelectCity($contact_id)
    {
        $contact = Contact::model()->findByPk($contact_id);

        Yii::app()->session['city'] = $contact->city;
        Yii::app()->session['contact_id'] = $contact->id;

        echo CJSON::encode(array(
            'status' => 'success',
        ));
    }

}