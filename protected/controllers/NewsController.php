<?php

class NewsController extends Controller
{

    public function actionIndex()
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
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    public function actionCommentAdd()
    {
        $request = Yii::app()->request;
        $body = $request->getPost('text',false);
        $news_id = (int)$request->getPost('news_id',false);
        $level = (int)$request->getPost('level',1);
        $resp= array();
        $resp['success']=false;
        $body = htmlspecialchars($body);
        If ($body AND $news_id){

            $comment=new NewsComments;
            $comment->body=$body;
            $comment->hampster_id=Yii::app()->user->id;
            $comment->news_id=$news_id;
            $comment->level=$level;
            $resp['success']=$comment->save();
            if(!$resp['success']){
                $resp['errors']=$comment->getErrors();
            }
            else {
                $resp['htmldata']=$this->actionGetCommentBranch($news_id);
            }

        }

        echo json_encode($resp);

    }


    public function actionGetCommentBranch($news_id)
    {
            $code='';
            $commentsProvider=new CActiveDataProvider('NewsComments', array(
            'pagination'=>false,
            'criteria'=>array(
            'condition'=>'news_id='.$news_id,
            'order'=>'created asc',
            'with'=>array('hampster'),
            )
            ));
            $comment = $commentsProvider->getData();
            foreach($comment as $i => $item) {
            $code.=$this->renderPartial('news/comment',array('index' => $i, 'data' => $item, 'widget' => $this), true);
            }

            return $code;


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