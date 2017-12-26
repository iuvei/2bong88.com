<?php

class AdminController extends CController {

    public $layout = 'column1';
    public $menu = array();
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }
	public function init()
	{
	
		if(!Yii::app()->user->isGuest)
		{
		
			if(Yii::app()->user->getState('typeUser')=="userNormal")
			{
			
				error_log("userNormal");
				Yii::app()->user->logout();
				echo "<script>alert('Please login again');</script>";
				return;
			
			}
		
		}
	
	}

    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xF7F7F7
            ),
            'page' => array(
                'class' => 'CViewAction'
            )
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }


}