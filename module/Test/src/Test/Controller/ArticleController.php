<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController{
    private $_param = array();
    private $_model;
    
    function __construct() {
        $this->_model = new \Test\Model\TestModel(); 
     }
    
    public function indexAction()
    {         
       return new ViewModel(array('articles'=>$this->_model->showArticles()));
    }
    
    public function editAction() {
        $this->_param = array("title"=>"Edit article");
        
        return new ViewModel($this->_param);
    }
}
