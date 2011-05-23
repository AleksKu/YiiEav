<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
     echo   $model = Product::model()->getAttributeLabel('price');


    }
}