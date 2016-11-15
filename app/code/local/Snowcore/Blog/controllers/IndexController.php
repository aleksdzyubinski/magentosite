<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 14.11.2016
 * Time: 11:06
 */

class Snowcore_Blog_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $resource = Mage::getSingleton('core/resource');
        $read = $resource->getConnection('core_read');
        $table = $resource->getTableName('blog/article');

        $select = $read->select()
            ->from($table, array('article_id', 'content', 'created_date'))
            ->order('created_date DESC');

        $article = $read->fetchAll($select);
        Mage::register('article', $article);

        $this->loadLayout();
        $this->renderLayout();
    }

}