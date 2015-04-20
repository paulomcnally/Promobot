<?php echo $this->Html->script(array('jquery','jquery.dataTables.min','movies.index'));?>
<?php echo $this->Html->css('jquery.dataTables.css');?>
<div class="movies index">
	<h2><?php echo __('Peliculas'); ?></h2>
	<table cellpadding="0" cellspacing="0" id="movies_datatable">
	<thead>
	<tr>
			<th>id</th>
			<th>nombre</th>
			<th>creado</th>
			<th>modificado</th>
			<th>rating</th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<?php foreach ($movies as $movie): ?>
	<tr>
		<td><?php echo h($movie['Movie']['id']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['name']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['created']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['modified']); ?>&nbsp;</td>
		<td><?php echo h($movie['Movie']['rating']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $movie['Movie']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $movie['Movie']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $movie['Movie']['id']), null, __('Seguro que desea borrar # %s?', $movie['Movie']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Pelicula'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Cartelera'), array('controller' => 'movieShowtimes', 'action' => 'index')); ?> </li>
	</ul>
</div>
