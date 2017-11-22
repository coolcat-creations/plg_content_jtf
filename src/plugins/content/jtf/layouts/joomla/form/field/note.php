<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2017 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

defined('JPATH_BASE') or die;

extract($displayData);

/**
 * Layout variables
 * -----------------
 * @var   string   $autocomplete  Autocomplete attribute for the field.
 * @var   boolean  $autofocus     Is autofocus enabled?
 * @var   string   $buttonclass   Classes special for the button.
 * @var   string   $buttonicon    Classes special for the button to set an icon.
 * @var   string   $class         Classes for the input.
 * @var   string   $description   Description of the field.
 * @var   boolean  $disabled      Is this field disabled?
 * @var   string   $group         Group the field belongs to. <fields> section in form XML.
 * @var   boolean  $hidden        Is this field hidden in the form?
 * @var   string   $hint          Placeholder for the field.
 * @var   string   $id            DOM id of the field.
 * @var   string   $label         Label of the field.
 * @var   string   $labelclass    Classes to apply to the label.
 * @var   boolean  $multiple      Does this field support multiple values?
 * @var   string   $name          Name of the input field.
 * @var   string   $onchange      Onchange attribute for the field.
 * @var   string   $onclick       Onclick attribute for the field.
 * @var   string   $pattern       Pattern (Reg Ex) of value of the form field.
 * @var   boolean  $readonly      Is this field read only?
 * @var   boolean  $repeat        Allows extensions to duplicate elements.
 * @var   boolean  $required      Is this field required?
 * @var   integer  $size          Size attribute of the input.
 * @var   boolean  $spellcheck    Spellcheck state for the form field.
 * @var   string   $validate      Validation rules to apply.
 * @var   string   $value         Value attribute of the field.
 * @var   string   $frwk          Framework.
 */

// Including fallback code for HTML5 non supported browsers.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true));

$class = !empty($class) ? ' class="' . $class . '"' : '';
$close = $close == 'true' ? 'alert' : $close;

if (!empty($close))
{
	$html[] = '<button type="button" class="' . $buttonclass . '" data-dismiss="' . $close . '">' . $buttonicon . '</button>';
}

$html[] = !empty($title) ? '<' . $heading . '>' . JText::_($title) . '</' . $heading . '>' : '';
$html[] = !empty($description) ? JText::_($description) : '';

switch ($frwk)
{
	case 'uikit':
	case 'uikit3':
		$containerAttribute = ' data-uk-alert';
		break;

	default:
		$containerAttribute = '';
}

?>
<div<?php echo $class . $containerAttribute; ?>>
	<?php echo implode('', $html); ?>
</div>
