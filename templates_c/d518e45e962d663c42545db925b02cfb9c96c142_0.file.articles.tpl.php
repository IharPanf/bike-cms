<?php /* Smarty version 3.1.28-dev/66, created on 2015-11-11 15:42:06
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\articles.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5643379eb8d3b8_49142713',
  'file_dependency' => 
  array (
    'd518e45e962d663c42545db925b02cfb9c96c142' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\articles.tpl',
      1 => 1447236155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5643379eb8d3b8_49142713')) {
function content_5643379eb8d3b8_49142713 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'D:/Yandex.Disk/Projects/bikecms/smarty/libs/plugins\\function.html_options.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form method="get" action="/Article/Index">
			<?php echo smarty_function_html_options(array('name'=>"catId",'options'=>$_smarty_tpl->tpl_vars['cats']->value,'selected'=>$_smarty_tpl->tpl_vars['catId']->value),$_smarty_tpl);?>

			<?php echo smarty_function_html_options(array('name'=>"authId",'options'=>$_smarty_tpl->tpl_vars['authors']->value,'selected'=>$_smarty_tpl->tpl_vars['authId']->value),$_smarty_tpl);?>

			<input type="submit" value="Refresh">
		</form>

		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Date</th>
					<th>Category</th>
					<th>Author</th>
				</tr>
			</thead>
			<?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_a_0_saved_item = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable();
$__foreach_a_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_a_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$__foreach_a_0_saved_local_item = $_smarty_tpl->tpl_vars['a'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['a']->value->id;?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['a']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['a']->value->pubdate->format('d.m.Y');?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['a']->value->category;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['a']->value->author;?>
</td>
					<td><?php
$_from = $_smarty_tpl->tpl_vars['a']->value->authors;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_a_1_saved_item = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable();
$__foreach_a_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_a_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$__foreach_a_1_saved_local_item = $_smarty_tpl->tpl_vars['a'];
echo $_smarty_tpl->tpl_vars['a']->value;?>
<br /><?php
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_1_saved_local_item;
}
}
if ($__foreach_a_1_saved_item) {
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_1_saved_item;
}
?></td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_0_saved_local_item;
}
}
if ($__foreach_a_0_saved_item) {
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_0_saved_item;
}
?>
		</table>
	</body>
</html>
<?php }
}
