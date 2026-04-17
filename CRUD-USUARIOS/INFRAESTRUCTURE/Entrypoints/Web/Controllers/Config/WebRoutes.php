<?php


declare(strict_types=1);


final class WebRoutes
{
  public static function routes(): array
  {
    return array(
        'home'=>array('method' => 'GET','action'=>'home'),
        'users.index'=>array('method'=>'GET','action'=>'index'),
        'users.store'=> array('method'=>'POST','action'=>'store'),
        'auth.login' => array('method'=>'GET','action'=>'login'),



    );
  }

}