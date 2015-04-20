<?php echo $this->Html->script(array('jquery','jquery.dataTables.min','category'));?>
<?php echo $this->Html->css('jquery.dataTables.css');?>
<div class="categories index">
	<h2><?php echo __('Categorias'); ?></h2>
	<table cellpadding="0" cellspacing="0" id="categories_table">
		<thead>
		<tr>
			<th>Nombre</th>
			<th>Creada</th>
			<th>Modificada</th>
			<th>Categoria</th>
			<th class="actions">Acciones</th>
		</tr>
		</thead>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($category['Category']['name'], array('controller' => 'categories', 'action' => 'subcategories', $category['Category']['id'])); ?>
		</td>
		<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($category['Parent']['name'], array('controller' => 'categories', 'action' => 'view', $category['Parent']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
