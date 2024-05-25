<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\images\RecordsProcessor;

class ImagesController extends Controller
{
    public function actionIndex()
    {
        $result = new RecordsProcessor();
        $amount = $result->process();

        return $this->render('images', [
            'amount' => $amount,
        ]);
    }
}
