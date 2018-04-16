<?php /* Smarty version 2.6.18, created on 2014-07-23 10:02:14
         compiled from 6/93eb60aa9774617/channel_picture.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <p class="bordertop"></p>    <div class="subcon">
		    	<div class="clickbtn" style="display:none">
            <div class="classbtn"><p>点击展示分类</p></div>
            <div class="classbtn2"><p>点击关闭分类</p></div>
        </div>
        <ul class="subnav2">
			            <li><p><a href="@" title=""></a></p></li>
                        <div class="clear"></div>
        </ul>
				        <ul class="product">
			            
                    <?php if ($this->_tpl_vars['contents']): ?>
			<?php $_from = $this->_tpl_vars['contents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
		        <li><div>
            <a href="<?php echo $this->_tpl_vars['c']['link']; ?>
" title="<?php echo $this->_tpl_vars['c']['title']; ?>
"><img src="<?php echo $this->_tpl_vars['c']['thumb']; ?>
" alt="<?php echo $this->_tpl_vars['c']['title']; ?>
"></a>
            <p><a href="<?php echo $this->_tpl_vars['c']['link']; ?>
" title="<?php echo $this->_tpl_vars['c']['title']; ?>
" class="prodtitle"><?php echo $this->_tpl_vars['c']['title']; ?>
</a></p></div>
        </li>
		     <?php endforeach; endif; unset($_from); ?>
			 <?php endif; ?>
                    </ul>
        <div class="clear"></div>
			 <?php if ($this->_tpl_vars['currentPage'] && $this->_tpl_vars['totalPage']): ?>
    <div class="pages">
			<a class="pre-left" href="<?php echo $this->_tpl_vars['previousPageLink']; ?>
">&lt;</a>
		<span><?php echo $this->_tpl_vars['currentPage']; ?>
/<?php echo $this->_tpl_vars['totalPage']; ?>
</span>
		<a class="next-left" href="<?php echo $this->_tpl_vars['nextPageLink']; ?>
">&gt;</a>
	        <div class="clear"></div>
    </div>
	<?php endif; ?> </div>
    <p class="borderbottom"></p>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
