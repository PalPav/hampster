<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 05.03.13
 * Time: 21:31
 * To change this template use File | Settings | File Templates.
 */

class HampsterController extends Controller

{
    public $defaultAction = 'Login';

    /**
     * Displays the hampster page
     */
    public function actionLogin()
    {
        if (!Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->user->returnUrl.'?r=main/index');
        }
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='hampster-form')
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
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl.'?r=hampster/login');
    }
}