<?php
return (new Zend\ServiceManager\ServiceManager)
->setService('Config', include 'parameters.php')
->setFactory('Application\Module', function($sm){
    return new Application\Module($sm);
})
->setFactory('ErrorHandler', function($sm){
    $displayErrors = ($sm->get('Config')['env'] !== 'production');
    return new SfpConduitMiddleware\ErrorHandler('views', $displayErrors);
})
/** ->setFactory('view', function($sm) {
    $view = new Phly\Mustache\Mustache;
    $view->setTemplatePath($sm->get('Config')['view']['template_path']);
    return $view;
}*/
;
