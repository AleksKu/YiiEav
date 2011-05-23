<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mrakobesov
 * Date: 24.04.11
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

class EntityForm extends CForm
{


    protected function init()
    {
        $model = $this->getModel();
        
        $attrs = $model->getEData();
        $collection = $this->getElements();


        $map = EavAttribute::model()->getInputTypeMap();
        foreach ($attrs as $k => $attr)
        {

            $eavAttr = $attr->getEavAttribute();

            $config = array();
            $config['type'] = $map[$eavAttr->getInputType()]['form_type'];

            if ($eavAttr->isMultiAttribute()) {
                $config['items'] = $eavAttr->getOptions();
                $config['prompt'] = $eavAttr->getLabel().':';
            }



            $collection->add($k, $config);
            $collection->itemAt($k)->setVisible(true);
        }

        $els = $this->getElements();
     //   var_dump($els['price']);
       // z();
    }

}
