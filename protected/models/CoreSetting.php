<?php

/**
 * This is the model class for table "{{setting}}".
 *
 * The followings are the available columns in table '{{setting}}':
 * @property integer $setting_id
 * @property string $group
 * @property string $key
 * @property string $value
 */
class CoreSetting extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Setting the static model class
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
        return 'core_config';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('group, value', 'required'),
            array('group', 'length', 'max' => 32),
            array('key', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('setting_id, group, key, value', 'safe', 'on' => 'search'),
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
            'setting_id' => 'Setting',
            'group' => 'Group',
            'key' => 'Key',
            'value' => 'Value',
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

        $criteria->compare('setting_id', $this->setting_id);

        $criteria->compare('group', $this->group, true);

        $criteria->compare('key', $this->key, true);

        $criteria->compare('value', $this->value, true);

        return new CActiveDataProvider('Setting', array(
                                                       'criteria' => $criteria,
                                                  ));
    }
}