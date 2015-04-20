<div class="movieTheaterBrands view">
<h2><?php  echo __('Movie Theater Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movieTheaterBrand['MovieTheaterBrand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($movieTheaterBrand['MovieTheaterBrand']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($movieTheaterBrand['MovieTheaterBrand']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($movieTheaterBrand['MovieTheaterBrand']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($movieTheaterBrand['MovieTheaterBrand']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($movieTheaterBrand['MovieTheaterBrand']['phone']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Movie Theater Brand'), array('action' => 'edit', $movieTheaterBrand['MovieTheaterBrand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Movie Theater Brand'), array('action' => 'delete', $movieTheaterBrand['MovieTheaterBrand']['id']), null, __('Are you sure you want to delete # %s?', $movieTheaterBrand['MovieTheaterBrand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Movie Theater Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie Theater Brand'), array('action' => 'add')); ?> </li>
	</ul>
</div>
