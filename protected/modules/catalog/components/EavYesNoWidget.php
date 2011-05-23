<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mrakobesov
 * Date: 4/22/11
 * Time: 11:46 AM
 * To change this template use File | Settings | File Templates.
 */
 
class EavYesNoWidget extends CInputWidget {



    public $options = array(0=>'No',1=>'Yes');

    public function init()
	{
        echo CHtml::activedropDownList($this->model,$this->attribute,$this->options);
	}



}
