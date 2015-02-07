<?php
return (new Zend\ServiceManager\ServiceManager)
->setService('Config', include 'parameters.php')
->setFactory('Site', function($sm){
    return new SfpConduitMiddleware\Site($sm);
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
