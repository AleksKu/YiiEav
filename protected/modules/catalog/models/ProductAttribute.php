<?php

/**
 * This is the model class for table "product_attribute".
 *
 * The followings are the available columns in table 'product_attribute':
 * @property string $code
 * @property string $entity_type
 * @property string $label
 * @property string $value_type
 * @property string $input_type
 * @property integer $is_required
 * @property integer $is_unique
 * @property string $default_value
 * @property integer $table
 */
class ProductAttribute extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductAttribute the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, label, value_type, input_type', 'required'),
			array('is_required, is_unique, table', 'numerical', 'integerOnly'=>true),
			array('code, entity_type, label, value_type, input_type', 'length', 'max'=>255),
			array('default_value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('code, entity_type, label, value_type, input_type, is_required, is_unique, default_value, table', 'safe', 'on'=>'search'),
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
			'code' => 'Code',
			'entity_type' => 'Entity Type',
			'label' => 'Label',
			'value_type' => 'Value Type',
			'input_type' => 'Input Type',
			'is_required' => 'Is Required',
			'is_unique' => 'Is Unique',
			'default_value' => 'Default Value',
			'table' => 'Table',
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

		$criteria=new CDbCriteria;

		$criteria->compare('code',$this->code,true);

		$criteria->compare('entity_type',$this->entity_type,true);

		$criteria->compare('label',$this->label,true);

		$criteria->compare('value_type',$this->value_type,true);

		$criteria->compare('input_type',$this->input_type,true);

		$criteria->compare('is_required',$this->is_required);

		$criteria->compare('is_unique',$this->is_unique);

		$criteria->compare('default_value',$this->default_value,true);

		$criteria->compare('table',$this->table);

		return new CActiveDataProvider('ProductAttribute', array(
			'criteria'=>$criteria,
		));
	}
}