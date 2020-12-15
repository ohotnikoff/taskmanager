<?php

namespace controllers;


/**
 * SiteController.
 */
class SiteController extends \base\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
