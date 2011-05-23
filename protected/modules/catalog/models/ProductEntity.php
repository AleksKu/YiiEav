<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mrakobesov
 * Date: 23.05.11
 * Time: 22:18
 * To change this template use File | Settings | File Templates.
 */

class ProductEntity extends CActiveRecord
{

    protected $flatAttrsMetaData;
    protected $flatAttrs;
    protected $defaultFlatAtrrScope = array();
    protected $flatAttributesRules = array();

    public function defaultScope()
    {
        return $this->defaultFlatAtrrScope;
    }

    /**
     *
     * @return void
     */
    public function init()
    {

        $this->initDefaultScope();

        /*@TODO добавить правила валидации*/

        $connection = Yii::app()->db;
        $sql = "SELECT code,label,value_type,is_required,is_unique FROM product_attribute";
        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();


        foreach ($rows as $row)
        {
            $this->flatAttrsMetaData[$row['code']] = $row;
        }

        $this->initFlatAttrsRules();
    }

    public function afterFind()
    {


        $connection = Yii::app()->db;
        $sql = "SELECT * FROM product_entity_attribute_1 WHERE product_id=:product_id LIMIT 1";
        $command = $connection->createCommand($sql);
        $command->bindValue(':product_id', $this->id);
        $rows = $command->queryRow();

        foreach ($rows as $name => $value)
        {
            $this->flatAttrs[$name] = $value;

        }


        parent::afterFind();

    }

    public function afterSave()
    {

        $changedAttributes = array_filter($this->flatAttrsMetaData, function ($attr)
        {
            return (isset($attr['changed']) && $attr['changed'] === true);
        });


        $countChangedAttrs = count($changedAttributes);
        if ($countChangedAttrs > 0) {

            $changedAttributesValues = array_intersect_key($this->flatAttrs, $changedAttributes);

            $command = Yii::app()->db->createCommand();
            $command
                    ->update('product_entity_attribute_1', $changedAttributesValues, 'product_id=:id', array(':id' => $this->id));
            $command->execute();


        }


        parent::afterSave();
    }

    protected function initDefaultScope()
    {
        /*       $this->defaultFlatAtrrScope = array(
            'join'
        );*/
    }


    protected function initFlatAttrsRules()
    {
        // $this->flatAttributesRules[];
    }


    /**
     * PHP getter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @return mixed property value
     * @see getAttribute
     */
    public function __get($name)
    {

        if (isset($this->flatAttrs[$name]))
            return $this->flatAttrs[$name];
        else
            return parent::__get($name);
    }


    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking
     * if the named attribute is null or not.
     * @param string $name the property name or the event name
     * @return boolean whether the property value is null
     * @since 1.0.1
     */
    public function __isset($name)
    {
        if (isset($this->flatAttrs[$name]))
            return true;
        else
            return parent::__isset($name);
    }

    /**
     * Sets a component property to be null.
     * This method overrides the parent implementation by clearing
     * the specified attribute value.
     * @param string $name the property name or the event name
     * @since 1.0.1
     */
    public function __unset($name)
    {
        if (isset($this->flatAttrs[$name]))
            unset($this->flatAttrs[$name]);
        else
            parent::__unset($name);
    }


    /**
     * Checks whether this AR has the named attribute
     * @param string $name attribute name
     * @return boolean whether this AR has the named attribute (table column).
     */
    public function hasAttribute($name)
    {
        if (isset($this->flatAttrs[$name]))
            return true;
        else {
            return parent::hasAttribute($name);
        }


    }

    /**
     * Returns the named attribute value.
     * If this is a new record and the attribute is not set before,
     * the default column value will be returned.
     * If this record is the result of a query and the attribute is not loaded,
     * null will be returned.
     * You may also use $this->AttributeName to obtain the attribute value.
     * @param string $name the attribute name
     * @return mixed the attribute value. Null if the attribute is not set or does not exist.
     * @see hasAttribute
     */
    public function getAttribute($name)
    {
        if (isset($this->flatAttrs[$name]))
            return $this->flatAttrs[$name];
        else
            return parent::getAttribute($name);
    }

    /**
     * Sets the named attribute value.
     * You may also use $this->AttributeName to set the attribute value.
     * @param string $name the attribute name
     * @param mixed $value the attribute value.
     * @return boolean whether the attribute exists and the assignment is conducted successfully
     * @see hasAttribute
     */
    public function setAttribute($name, $value)
    {

        if (isset($this->flatAttrsMetaData[$name])) {
            $this->flatAttrs[$name] = $value;
            $this->flatAttrsMetaData[$name]['changed'] = true;
            return true;
        } else {
            return parent::setAttribute($name, $value);
        }
    }


    /**
     * Returns all column attribute values.
     * Note, related objects are not returned.
     * @param mixed $names names of attributes whose value needs to be returned.
     * If this is true (default), then all attribute values will be returned, including
     * those that are not loaded from DB (null will be returned for those attributes).
     * If this is null, all attributes except those that are not loaded from DB will be returned.
     * @return array attribute values indexed by attribute names.
     */
    public function getAttributes($names = true)
    {
        $attrs = parent::getAttributes($names);
        foreach ($this->flatAttrs as $name => $value)
        {
            if ($names === true) {
                if (in_array($name, $names) && $value !== null)
                    $attrs[$name] = $value;
            } else {
                if ($value !== null)
                    $attrs[$name] = $value;
            }
        }

        return $attrs;

    }

    /**
     * Returns the list of all attribute names of the model.
     * This would return all column names of the table associated with this AR class.
     * @return array list of attribute names.
     * @since 1.0.1
     */
    public function attributeNames()
    {
        return array_merge(array_keys($this->flatAttrsMetaData), array_keys($this->getMetaData()->columns));
    }

    /**
     * Returns the text label for the specified attribute.
     * This method overrides the parent implementation by supporting
     * returning the label defined in relational object.
     * In particular, if the attribute name is in the form of "post.author.name",
     * then this method will derive the label from the "author" relation's "name" attribute.
     * @param string $attribute the attribute name
     * @return string the attribute label
     * @see generateAttributeLabel
     * @since 1.1.4
     */
    public function getAttributeLabel($attribute)
    {
        if (isset($this->flatAttrsMetaData[$attribute]))
            return $this->flatAttrsMetaData[$attribute]['label'];
        else
            return parent::getAttributeLabel($attribute);
    }


}
