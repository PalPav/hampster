<?php

class MainController extends Controller
{
    public $defaultAction = 'News';

	public function actionNews()
	{
            $dataProvider=new CActiveDataProvider('News', array(
                'pagination'=>array(
                    'pageSize'=>10,
                    'pageVar'=>'page',
                ),
                'criteria'=>array(
                    'order'=>'created DESC',
                    'with'=>array('hampster'),
                ),


            ));
            $this->render('news',array(
                'dataProvider'=>$dataProvider,
            ));
	}

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}