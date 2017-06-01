<?php
function ckeditor($name, $content, $toolbar = 'standard', $language = 'vi', $width = 'auto', $height = 500)
{
	global $ckeditor_loaded;
 
	$code = '';
	if(!$ckeditor_loaded)
	{
		$code.= '<script type="text/javascript" src="/admin/plugins/ckeditor/ckeditor.js"></script>';
		$ckeditor_loaded = true;
	}
 
 
	$code.= '<textarea name="'.$name.'" id="'.$name.'">'.htmlentities($content).'</textarea>';
	$code.= "<script type=\"text/javascript\">
config  = {};
config.entities_latin = false;
config.language = '".$language."';
config.width = '".$width."';
config.height = '".$height."';
config.filebrowserBrowseUrl 		= '/admin/plugins/ckfinder/ckfinder.html';
config.filebrowserImageBrowseUrl 	= '/admin/plugins/ckfinder/ckfinder.html';
";
 
	
	if($toolbar == 'basic')
	{
		$code.= "config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'others', groups: [ 'others' ] }
	];
	config.removeButtons = 'Checkbox,Radio,TextField,Form,Textarea,Select,Button,ImageButton,HiddenField,SelectAll,Replace,Find,Smiley,Iframe,PageBreak,Flash,ShowBlocks,Save,NewPage,Preview,Print,Templates,Underline,Subscript,Superscript,Language,BidiRtl,BidiLtr,CreateDiv,JustifyCenter,JustifyRight,FontSize,Font,TextColor,BGColor,Cut,Undo,Redo,Copy,Paste,PasteText,PasteFromWord,Scayt,Strike,RemoveFormat,Outdent,Indent,Blockquote,JustifyLeft,JustifyBlock,Image,Table,SpecialChar,HorizontalRule,Styles,Format,About';
	";
 
	}
	elseif ($toolbar == 'standard')
	{
		$code.= "config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'others', groups: [ 'others' ] }
	];
	config.removeButtons = 'Checkbox,Radio,TextField,Form,Textarea,Select,Button,ImageButton,HiddenField,SelectAll,Replace,Find,Smiley,Iframe,PageBreak,Flash,ShowBlocks,Save,NewPage,Preview,Print,Templates,Underline,Subscript,Superscript,Language,BidiRtl,BidiLtr,CreateDiv,JustifyCenter,JustifyRight,FontSize,Font,TextColor,BGColor';
	";
	}
 
	$code.= 'CKEDITOR.replace(\''.$name.'\', config);';
	$code.= '</script>';
 
	return $code;
}

?>