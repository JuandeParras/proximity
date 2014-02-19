<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Trastienda\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Trastienda\Entity\Producto;

class IndexController extends AbstractActionController {
	protected $_objectManager;
	
    public function indexAction() {
    	
  		return new ViewModel();
    }
    
    public function pruebaAction() {
    	$productos = $this->getObjectManager()->getRepository('\Trastienda\Entity\Producto')->findAll();
    	var_dump($productos);
    	return new ViewModel(array('productos' => $productos));
    }
    
    protected function getObjectManager()
    {
    	if (!$this->_objectManager) {
    		$this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	}
    
    	return $this->_objectManager;
    }
}
