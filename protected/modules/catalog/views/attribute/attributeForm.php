<?php
return array(


    'elements' => array(


        'eavAttribute' => array(
            'type' => 'form',
            'title' => 'Атрибут',
            'elements' => array(
                'code' => array(
                    'type' => 'text',
                    'maxlength' => 255,
                ),

                'label' => array(
                    'type' => 'text',
                    'maxlength' => 255,
                ),


            
                'input_type' => array(
                    'type' => 'dropdownlist',
                    'items' => ProductAttribute::model()->getInputTypeOptions(),
                    'prompt' => 'Input Type:',

                ),

                'is_required' => array(
                    'type' => 'EavYesNoWidget',

                ),
                'is_unique' => array(
                    'type' => 'EavYesNoWidget',

                ),
                'default_value' => array(
                    'type' => 'text',

                ),
            ),
        ),


/*        'eavOption' => array(
            'type' => 'AttributeOptionForm',
            'title' => 'Опции Атрибута',

            'elements' => array(
                'value'=>array(
                    'type'=>'text',
                    'maxlength' => 255,
                ),
                'is_default' => array(
                    'type' => 'radio',
                    'name' => 'Is Default',

                ),

            )
        ),*/


    ),

    'buttons' => array(
        'save' => array(
            'type' => 'submit',
            'label' => 'Сохранить Атрибут',
        ),
    ),
);