<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mrakobesov
 * Date: 4/22/11
 * Time: 7:01 PM
 * To change this template use File | Settings | File Templates.
 */
 
class AttributeOptionForm extends CForm {

  /**
   * @var boolean the key to fetch when the form is used for tabular input
   */
  private $_key;

    public static $keyIterator = 0;

  /**
   * Constructor.
   * $config, $model and $parent are as for CForm
   * @param mixed key to fetch for the model on form submission when using tabular input
   */
  public function __construct($config,$model,$parent=null,$key=null)
  {
    $this->_key=$key;
    parent::__construct($config,$model,$parent);
  }

  /**
   * The only difference here is to check if the form is used for tabular input.
   * If it is load attributes from the appropriate index from the submitted data
   */
  public function loadData()
  {
    if($this->getModel()!==null)
    {
      $class=get_class($this->getModel());
      if(strcasecmp($this->getRoot()->method,'get') && isset($_POST[$class]))
      {
        if($this->isTabular())
         $this->getModel()->setAttributes($_POST[$class][$this->_key]);
        else
          $this->getModel()->setAttributes($_POST[$class]);
      }
      elseif(isset($_GET[$class]))
      {
        if($this->isTabular())
         $this->getModel()->setAttributes($_GET[$class][$this->_key]);
        else
          $this->getModel()->setAttributes($_GET[$class]);
      }
    }
    foreach($this->getElements() as $element)
    {
      if($element instanceof self)
        $element->loadData();
     }
  }

  /**
   * Checks if the form is used for tabular input
   * @return true if this form is used for tabular input, false if not
   */
  public function isTabular()
  {
    return isset($this->_key);
  }

  /**
   * Only one line is changed from CForm to render a valid class when
   * using tabular inputs. The line is marked.
   */
  public function renderElement($element)
  {
    if(is_string($element))
    {
      if(($e=$this[$element])===null && ($e=$this->getButtons()->itemAt($element))===null)
        return $element;
      else
        $element=$e;
    }
    if($element->getVisible())
    {
      if($element instanceof CFormInputElement)
      {
        if($element->type==='hidden')
          return "<div style=\"visibility:hidden\">\n".$element->render()."</div>\n";
        else
        {
          $elementName = $element->name;
          return '<div class="row field_' . strtolower(preg_replace('/(\[\w*\])?\[(\w*)\]/', '_$2', CHtml::resolveName($element->getParent()->getModel(), $elementName))) . "\">\n".$element->render()."</div>\n"; // This line is the change
        }
      }
      elseif($element instanceof CFormButtonElement)
        return $element->render()."\n";
      else
        return $element->render();
    }
    return '';
  }


}
