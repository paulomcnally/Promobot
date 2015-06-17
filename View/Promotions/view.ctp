<div class="promotions view">
<h2><?php echo __('Promotion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Businesses'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promotion['Businesses']['name'], array('controller' => 'businesses', 'action' => 'view', $promotion['Businesses']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
                        <?php echo $this->Html->image($promotion['Promotion']['image'], array('alt' => $promotion['Promotion']['image'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Display Number'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['display_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['modified']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('codigo QR'); ?></dt>
                <dd>
                    <?php echo $this->QR->crearQRfile('codigo QR') ?>
                </dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promotion'), array('action' => 'edit', $promotion['Promotion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promotion'), array('action' => 'delete', $promotion['Promotion']['id']), array(), __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businesses'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Details'), array('controller' => 'business_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion Detail'), array('controller' => 'business_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Business Details'); ?></h3>
	<?php if (!empty($promotion['PromotionDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Long'); ?></th>
		<th><?php echo __('Businesses Id'); ?></th>
		<th><?php echo __('Cities Id'); ?></th>
		<th><?php echo __('Version'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($promotion['PromotionDetail'] as $promotionDetail): ?>
		<tr>
			<td><?php echo $promotionDetail['id']; ?></td>
			<td><?php echo $promotionDetail['direccion']; ?></td>
			<td><?php echo $promotionDetail['lat']; ?></td>
			<td><?php echo $promotionDetail['long']; ?></td>
			<td><?php echo $promotionDetail['businesses_id']; ?></td>
			<td><?php echo $promotionDetail['cities_id']; ?></td>
			<td><?php echo $promotionDetail['version']; ?></td>
			<td><?php echo $promotionDetail['created']; ?></td>
			<td><?php echo $promotionDetail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'business_details', 'action' => 'view', $promotionDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'business_details', 'action' => 'edit', $promotionDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'business_details', 'action' => 'delete', $promotionDetail['id']), array(), __('Are you sure you want to delete # %s?', $promotionDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Promotion Detail'), array('controller' => 'business_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
