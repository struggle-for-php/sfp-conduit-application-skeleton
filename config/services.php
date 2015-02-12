<?php
return (new Zend\ServiceManager\ServiceManager)
->setService('Config', include 'parameters.php')
->setFactory('Sample\Module', function($sm){
    return new Sample\Module($sm);
})
->setFactory('ErrorHandler', function($sm){
    $displayErrors = ($sm->get('Config')['env'] !== 'production');
    return new Application\ErrorHandler('views', $displayErrors);
})
/** ->setFactory('view', function($sm) {
    $view = new Phly\Mustache\Mustache;
    $view->setTemplatePath($sm->get('Config')['view']['template_path']);
    return $view;
}*/
;
