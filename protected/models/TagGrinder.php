<?php
/**
 * Created by JetBrains PhpStorm.
 * User: palpav
 * Date: 13.04.13
 * Time: 17:18
 * To change this template use File | Settings | File Templates.
 */

class TagGrinder extends CFormModel
{
    public $tags;
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('password', 'check'),
        );
    }


    public function check()
    {
        $tagsd=$this->tags;
        $tagsd=explode(",",$tagsd);
        if ($tagsd){
            if (count($tagsd)>5){
                $this->addError('tags','Тегов должно быть не больше 5 штук');
                return false;
            }
            else {
                foreach ($tagsd as $tag){
                    $tag=(string)$tag;
                    $tag=mb_strlen(trim($tag),"UTF-8");
                    if ($tag>10 OR $tag <1){
                        $this->addError('tags','Размер отдельного тега должен быть от 1 до 10 символов');
                        return false;
                    }
                }
            }
        }
        return true;

    }

    public function getRow($link_id)
    {
        $link_id = (int)$link_id;
        $row="";
        if ($link_id){
            $tags= LinkTag::model()->with('tag')->findAll(array('condition'=>'link_id='.$link_id));
            foreach ($tags as $tag) {
                if ($row!=""){$row.=",";}
                $row.=$tag->tag->tag;
            }
        }
        return $row;
    }

    public function grind($link_id)
    {
        $link_id=(int)$link_id;
        if ($link_id) {
            $tagsd=$this->tags;
            $tagsd=explode(",",$tagsd);

            LinkTag::model()->deleteAll(array('condition'=>'link_id='.$link_id));

            foreach ($tagsd as $i => $tag){
                $tag=trim($tag);
                $id=Tag::checkTag($tag);

                If (!$id) {
                    $ntag = new Tag;
                    var_dump($tag);
                    $ntag ->tag =$tag;
                    if ($ntag->save()){
                        $id=$ntag->id;
                    }
                }
                $lt = new LinkTag;

                $lt->link_id=$link_id;
                $lt->tag_id=$id;
                $lt->save();
            }
        }
    }
    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'tags'=>'Тэги',
        );
    }
}