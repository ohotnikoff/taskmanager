<?php

namespace controllers;


use models\Staff;

/**
 * StaffController.
 */
class StaffController extends \base\Controller
{
    public function actionIndex()
    {
        $title = 'Сотрудники';
        $model_staff = (new Staff)->getAll();

        return $this->render('index', [
            'title' => $title,
            'staff' => $model_staff,
        ]);
    }
}
