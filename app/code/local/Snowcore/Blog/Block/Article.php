<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 16.11.2016
 * Time: 11:32
 */
class Snowcore_Blog_Block_Article extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('blog/article')->getCollection();
        $collection->setOrder('created_date', 'DESC');
        $this->setCollection($collection);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(5=>5,10=>10,'all'=>'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function showTopPage()
    {
        echo '<div class="top-page-container">';
        echo "<h1>Testimonials</h1> 
                </div>";
        if (Mage::getSingleton('customer/session')->isLoggedIn())
        {
            echo '<button class="submit-button">SUBMIT YOUR TESTIMONIAL</button>';
            echo '<textarea id="text-enter" rows="5" cols="100%"></textarea>';
        }
        else{
            echo '<div id="login-text">';
            echo 'To leave a feedback you need to log in ';
            echo '</div>';
        }
    }


}