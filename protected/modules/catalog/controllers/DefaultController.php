<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$model = Product::model()->findByPk(1);

      $model->price = 2000.23;
        $model->save();
	}
}