<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mrakobesov
 * Date: 25.05.11
 * Time: 10:27
 * To change this template use File | Settings | File Templates.
 */

class RequestHandler
{

    function initCoreSettings($event)
    {
        $app = $event->sender;

        $params = $app->getParams();

        $models = CoreSetting::model()->findAll();

        $settings = array();
        foreach ($models as $model)
        {

            $settings[$model->group][$model->key] = $model->value;
        }

        $params->copyFrom($settings);
        self::initStoreSettings($app);
    }


    /**
     * @param CApplication  $app
     * @return void
     */
    protected static function initStoreSettings($app)
    {
        if (isset($app->params['core']['language']))
            $app->setLanguage($app->params['core']['language']);

        if (isset($app->params['core']['name']))
            $app->name = $app->params['core']['name'];

        


    }
}
