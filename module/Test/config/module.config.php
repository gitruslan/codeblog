<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Test\Controller\Article' => 'Test\Controller\ArticleController',
//             'Test\Controller\News'=>'Test\Controller\NewsController'
         ),
     ),

     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'test' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/test[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Test\Controller\Article',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'test' => __DIR__ . '/../view',
         ),
     ),
 );