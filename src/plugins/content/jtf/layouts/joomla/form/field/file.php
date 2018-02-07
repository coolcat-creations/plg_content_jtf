<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Content.Jtf
 *
 * @author       Guido De Gobbis <support@joomtools.de>
 * @copyright    (c) 2017 JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

extract($displayData);


/**
 * Layout variables
 * -----------------
 * @var   string   $autocomplete    Autocomplete attribute for the field.
 * @var   boolean  $autofocus       Is autofocus enabled?
 * @var   string   $class           Classes for the input.
 * @var   string   $description     Description of the field.
 * @var   boolean  $disabled        Is this field disabled?
 * @var   string   $group           Group the field belongs to. <fields> section in form XML.
 * @var   boolean  $hidden          Is this field hidden in the form?
 * @var   string   $hint            Placeholder for the field.
 * @var   string   $id              DOM id of the field.
 * @var   string   $label           Label of the field.
 * @var   string   $labelclass      Classes to apply to the label.
 * @var   boolean  $multiple        Does this field support multiple values?
 * @var   string   $name            Name of the input field.
 * @var   string   $onchange        Onchange attribute for the field.
 * @var   string   $onclick         Onclick attribute for the field.
 * @var   string   $pattern         Pattern (Reg Ex) of value of the form field.
 * @var   boolean  $readonly        Is this field read only?
 * @var   boolean  $repeat          Allows extensions to duplicate elements.
 * @var   boolean  $required        Is this field required?
 * @var   integer  $size            Size attribute of the input.
 * @var   boolean  $spellcheck      Spellcheck state for the form field.
 * @var   string   $validate        Validation rules to apply.
 * @var   string   $value           Value attribute of the field.
 * @var   array    $checkedOptions  Options that will be set as checked.
 * @var   boolean  $hasValue        Has this field a value assigned?
 * @var   array    $options         Options available for this field.
 * @var   array    $inputType       Options available for this field.
 * @var   string   $accept          File types that are accepted.
 * @var   integer  $maxLength       The maximum length that the field shall accept.
 * @var   integer  $uploadmaxsize   Limitation for Upload.
 */

// Including fallback code for HTML5 non supported browsers.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'plugins/content/jtf/assets/js/file.js', array('version' => 'auto'));
JHtml::_('stylesheet', 'plugins/content/jtf/assets/css/file.css', array('version' => 'auto'));

$maxSize = JHtml::_('number.bytes', $uploadmaxsize);
$errorMessage = JText::sprintf('JTF_UPLOAD_ERROR_MESSAGE', $maxSize);

// Drag-drop installation
JFactory::getDocument()->addScriptDeclaration("
	jQuery(document).ready(function($) {
		$('uploader-wrapper-$id').jtfUploadFile({
			id            : '$id',
			uploadMaxSize : '$uploadmaxsize', 
			errorMessage  : '$errorMessage'
		});
	});
");

JFactory::getDocument()->addStyleDeclaration("

");

?>
<div id="uploader-wrapper-<?php echo $id; ?>">
	<div class="dragarea">
		<div class="dragarea-content">
			<p>
				<span class="upload-icon <?php echo $uploadicon;?>" aria-hidden="true"></span>
			</p>
			<p class="lead">
				<?php echo JText::_('JTF_DRAG_FILE_HERE'); ?>
				<noscript class="invalid"><br /><?php echo JText::_('JTF_DRAG_FILE_HERE_NOSCRIPT'); ?></noscript>
			</p>
			<p>
				<button type="button" class="<?php echo $buttonclass; ?> select-file-button">
					<span class="<?php echo $buttonicon; ?>" aria-hidden="true"></span>
					<?php echo JText::_('JTF_SELECT_FILE'); ?>
				</button>
			</p>
			<p>
				<?php echo JText::sprintf('JGLOBAL_MAXIMUM_UPLOAD_SIZE_LIMIT', $maxSize); ?>
			</p>
		</div>
		<div class="legacy-uploader">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $uploadmaxsize; ?>">
			<input type="file"
				   name="<?php echo $name; ?>"
				   id="<?php echo $id; ?>"
				   class="validate-file<?php echo !empty($class) ? ' ' . $class : ''; ?>"
				<?php echo !empty($size) ? ' size="' . $size . '"' : ''; ?>
				<?php echo !empty($accept) ? ' accept="' . $accept . '"' : ''; ?>
				<?php echo !empty($multiple) ? ' multiple' : ''; ?>
				<?php echo $disabled ? ' disabled' : ''; ?>
				<?php echo $autofocus ? ' autofocus' : ''; ?>
				<?php echo !empty($onchange) ? ' onchange="' . $onchange . '"' : ''; ?>
				<?php echo $required ? ' required aria-required="true"' : ''; ?> />
		</div>
		<div class="upload-list"></div>
	</div>
</div>

