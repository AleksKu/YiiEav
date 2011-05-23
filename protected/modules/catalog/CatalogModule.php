<?php

class CatalogModule extends CWebModule
{

     public $inputTypesMap = array(
        'price' => array(
            'value_type' => 'decimal',
            'form_type' => 'text',
            'label' => 'Price'
        ),

        'textfield' => array(
            'value_type' => 'varchar',
            'form_type' => 'text',
            'label' => 'Text Field'
        ),

        'textarea' => array(
            'value_type' => 'text',
            'form_type' => 'textarea',
            'label' => 'Text Area'
        ),
        'date' => array(
            'value_type' => 'datetime',
            'form_type' => 'zii.widgets.jui.CJuiDatePicker',
            'label' => 'Date'
        ),
        'dropdown' => array(
            'value_type' => 'varchar',
            'form_type' => 'dropdownlist',
            'label' => 'DropDown'
        ),

        'yesno' => array(
            'value_type' => 'varchar',
            'form_type' => 'EavYesNoWidget',
            'label' => 'Yes/No'
        ),


        'multiple' => array(
            'value_type' => 'varchar',
            'form_type' => 'listbox',
            'label' => 'Multiple Select'
        ),


        'file' => array(
            'value_type' => 'varchar',
            'form_type' => 'file',
            'label' => 'File'
        ),

        'image' => array(
            'value_type' => 'varchar',
            'form_type' => 'file',
            'label' => 'Image'
        ),


    );

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'catalog.models.*',
			'catalog.components.*',
            'catalog.forms.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
