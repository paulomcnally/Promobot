<?php echo $this->Html->script(array('jquery','jquery.dataTables.min','business'));?>
<?php echo $this->Html->css('jquery.dataTables.css');?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#business_table').dataTable({
        	"bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/businesses/index.json",                        
            "aoColumns": [
                {mData:"Business.name"},
                {mData:"User.username"},
                {mData:"Business.created", bSortable: false, bSearchable: false},
                {mData:"Business.modified", bSortable: false, bSearchable: false},
                {mData:"Business.id", bSortable: false, bSearchable: false, "sClass": "actions"}
            ],
            "fnCreatedRow": function(nRow, aData, iDataIndex){
            	$('td:eq(1)', nRow).html('<a href="/users/edit/'+aData.User.id+'">'+aData.User.full_name+'</a>');
            	$('td:eq(4)', nRow).html('<a href="/businesses/view/'+aData.Business.id+'">Ver</a><a href="/businesses/edit/'+aData.Business.id+'">Editar</a><a href="/promotions/index/'+aData.Business.id+'">Promociones</a><form method="post" style="display:none;" id="post_543b18961ae08" name="post_'+aData.Business.id+'" action="/businesses/delete/'+aData.Business.id+'"><input type="hidden" value="POST" name="_method"></form><a onclick="javascript:if(confirm(\'Seguro que deseas borar?\')) { document.post_'+aData.Business.id+'.submit(); } event.returnValue = false; return false;" href="#">Borrar</a>');
            }
        });
    });
</script>
<div class="businesses index">
	<h2><?php echo __('Negocios'); ?></h2>
	<table id="business_table">
    <thead>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Creado</th>
        <th>Editado</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categoria'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Detalles'), array('controller' => 'businessDetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Estructura'), array('action' => 'tree')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
