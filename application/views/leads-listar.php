<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>Lista de Leads</h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 dataTable_element">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-spinner fa-spin"></i> <strong>Aguarde!</strong> Carregando dados.
			</div>
			<table id="dtLeads" class="table display table-hover table-striped" style="width: 100%">
				<thead>
				</thead>
				<tbody>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
	</div>
	</div>
</div>

<script>
$(document).ready(function(){
	dtLeads = $('#dtLeads').DataTable({
		ajax: {
			url: '<?= base_url("assets/src/json/leads-list.json"); ?>',
			dataSrc: 'leadsList'
		},
		columns: [
			{data: 'id', title: 'Código'},
			{data: 'name', title: 'Nome/Razão Social'},
			{data: 'national_register', title: 'Registro Nacional'},
			{data: 'created_date', title: 'Data de Registro'},
			{data: 'last_schedule', title: 'Último Agendamento'},
			{data: 'last_buy', title: 'Última Compra'},
			{data: null, defaultContent: "", title: 'Opções'}
		]
	});
})
</script>