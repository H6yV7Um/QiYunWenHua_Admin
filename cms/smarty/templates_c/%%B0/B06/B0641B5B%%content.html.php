<?php /* Smarty version 2.6.18, created on 2014-07-08 20:25:10
         compiled from 6/2c8d0bfbcc95f58/content.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
#content img{max-width:92%;}
</style>
'; ?>
<?php if ($this->_tpl_vars['ismap']): ?>
<?php echo $this->_tpl_vars['mapstr']; ?>

<?php else: ?>
<div class="subpages">
	<p><h3 style="text-align:center;font-size:16px;"><?php echo $this->_tpl_vars['content']['title']; ?>
</h3></p>
        <p id="content"><?php echo $this->_tpl_vars['content']['content']; ?>
</p>

</div>
<?php endif; ?>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>