<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\ImagesProcessor;

class ImagesController extends Controller
{
    public function actionIndex()
    {
        $result = new ImagesProcessor();
        $amount = $result->process();

        return $this->render('images', [
            'amount' => $amount,
        ]);
    }
}
