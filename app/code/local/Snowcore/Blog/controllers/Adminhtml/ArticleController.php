<?php
class Snowcore_Blog_Adminhtml_ArticleController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('blog/article')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Articles Manager'), Mage::helper('adminhtml')->__('Articles Manager'));
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_articles'));
        $this->renderLayout();
    }
   /* public function indexAction()
    {
        $this->_initAction()
            ->renderLayout();
    }*/
    public function newAction()
    {
        $this->_forward('edit');
    }

}
