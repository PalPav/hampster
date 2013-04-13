<?php

class LinkController extends Controller
{
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Link', array(
            'criteria'=>array(
                'condition'=>'(hampster_id='.Yii::app()->user->id.' AND is_private=true) OR is_private=false',
                'order'=>'added desc',
                'with'=>array(
                    'hampster',
                    'tags'
                ),
            ),
            'pagination'=>array(
                'pageSize'=>40,
            ),
        ));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}

    public function actionAddLink()
    {



        $link = new Link;
        $tags = new TagGrinder;

        if(isset($_POST['Link']) AND isset($_POST['TagGrinder']))
        {
            $tags->tags=$_POST['TagGrinder']['tags'];
            if ($tags->validate()){

                $_POST['Link']['hampster_id']=Yii::app()->user->id;
                $_POST['Link']['subject']=htmlspecialchars($_POST['Link']['subject']);
                $link->attributes=$_POST['Link'];

                if($link->save()) {
                    $tags->grind($link->id);
                    $this->redirect(array('index'));
                }

            }
        }

        $this->render('add',array(
            'link'=>$link,
            'tags'=>$tags

        ));
    }

    public function actionLinkChecked()
    {

    }

    public function actionLinkEdit()
    {

    }

    public function actionLinkDrop()
    {

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