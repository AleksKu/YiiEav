<?php

/**
 * This is the model class for table "eav_attribute_option".
 *
 * The followings are the available columns in table 'eav_attribute_option':
 * @property integer $id
 * @property integer $attribute_id
 * @property string $value
 * @property integer is_default
 */
class EavOption extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return EavOption the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'product_attribute_option';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //	array('attribute_id', 'required'),
            array('is_default', 'numerical', 'integerOnly' => true),
            array('value', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, attribute_id, value', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'attribute_id' => 'Attribute',
            'value' => 'Value',
            'is_default' => 'Is Default'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);

        $criteria->compare('attribute_id', $this->attribute_id);

        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider('EavOption', array(
                                                         'criteria' => $criteria,
                                                    ));
    }


    public function getForm($parent)
    {


        $id = $this->id;
        if ($this->getIsNewRecord()) {
            $id = AttributeOptionForm::$keyIterator;
            AttributeOptionForm::$keyIterator++;

        }
        return new AttributeOptionForm(array(
                                            'elements' => array(
                                                "[{$id}]value" => array(
                                                    'type' => 'text',
                                                    'label' => 'Value',
                                                    //'after' => $this->parameterUnits
                                                ),

                                                "[{$id}]is_default" => array(
                                                    'type' => 'radio',
                                                    'label' => 'is_default',
                                                    //'after' => $this->parameterUnits
                                                )
                                            )
                                       ), $this, $parent, $id);
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isAttributeRequired($attribute)
    {
        return parent::isAttributeRequired(preg_replace('/(\[\w+\])?(\w+)/', '$2', $attribute));
    }

    public function isAttributeSafe($attribute)
    {
        return parent::isAttributeSafe(preg_replace('/(\[\w+\])?(\w+)/', '$2', $attribute));
    }
}