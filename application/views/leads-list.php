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

<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Excluir Lead</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>Você tem certeza?</h5>
				<p>O Lead será removido do banco de dados e a operação é <u>irreversível</u>.</p>
			</div>
			<div class="modal-footer">
				<button type="button" id="confirmationNo" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
				<button type="button" id="confirmationYes" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir Lead</button>
			</div>
		</div>
	</div>
</div>


<div id="showMoreModal" class="modal modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Ver dados</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		dtLeads = $('#dtLeads').DataTable({
			ajax: {
				url: 'http://localhost:3000/leadsList',
				dataSrc: ''
			},
			columns: [{
					data: 'id',
					title: 'Código'
				},
				{
					data: 'name',
					title: 'Nome/Razão Social'
				},
				{
					data: 'nationalRegister',
					title: 'Registro Nacional',
					className: 'nationalRegister'
				},
				{
					data: 'createdDate',
					title: 'Data de Registro',
					render: function(data){
						if(!data){
							return 'Não Informado';
						}else{
							return $.fn.dataTable.render.moment('YYYY-MM-DD HH:mm:ss', 'DD/MM/YYYY - HH:mm:ss');
						}
					}
				},
				{
					data: 'lastSchedule',
					title: 'Último Agendamento',
					render: function(data){
						if(!data){
							return 'Não Informado';
						}else{
							return $.fn.dataTable.render.moment('YYYY-MM-DD HH:mm:ss', 'DD/MM/YYYY - HH:mm:ss');
						}
					}
				},
				{
					data: null,
					render: function(data) {
						var html = `<button type="button" class="btn btn-sm btn-primary viewMore" role="button" data-toggle="popover" data-trigger="hover" data-content="Ver mais"><i class="fas fa-search-plus"></i></button> 
							<button type="button" class="btn btn-sm btn-danger deleteLead" role="button" data-toggle="popover" data-trigger="hover" data-content="Excluir Lead" onclick="deleteLead(${data.id})"><i class="fas fa-trash-alt"></i></button>`
						return html;
					},
					title: 'Opções'
				}
			],
		});

		$('#dtLeads').on('click', '.viewMore', function(event) {
			var tr = $(this).closest('tr');
			var row = dtLeads.row(tr);

			var html = viewMoreHTML(row.data());
			$('#showMoreModal').find('.modal-body').html(html);
			$('.nationalRegister').mask(nationalRegisterMaskBehavior, nationalRegisterOptions);
			$('#showMoreModal').modal('show');
		})
	})

	function viewMoreHTML(data) {
		if (data == null) return false;
		console.log(data);
		var table = $(`
		<table id="viewMoreTable" class="table display table-hover table-stiped">
			<thead>
				<tr>
					<th>Informação</th>
					<th>Valor</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CPF/CNPJ</td>
					<td class="nationalRegister">${data.nationalRegister}</td>
				</tr>
				<tr>
					<td>Nome/Razão Social</td>
					<td>${data.name}</td>
				</tr>
				<tr>
					<td>Nome Fantasia</td>
					<td>${(typeof data.fantasyName !== 'undefined') ? data.fantasyName : (data.fantasyName == "" || data.fantasyName == null) ? 'Não informado' : 'Erro de cadastro'}</td>
				</tr>
				<tr>
					<td>Data de Registro</td>
					<td>${data.createdDate}</td>
				</tr>
				<tr>
					<td>Último agendamento</td>
					<td>${data.lastSchedule}</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>Informação</th>
					<th>Valor</th>
				</tr>
			</tfoot>
		</table>
		`);

		return table;
	}

	function deleteLead(id = null) {
		if (id == null) {
			console.error('[deleteLead]: invalid ID');
			return false;
		}

		$('#confirmationModal').modal('show');

		$('#confirmationYes').on('click', function() {
			$.ajax({
				url: 'http://localhost:3000/leadsList/' + id,
				type: 'DELETE',
				dataType: 'json',
				data: {
					id: id
				},
				success: (response) => {
					dtLeads.ajax.reload();
					$('#confirmationModal').modal('hide');
				},
				error: (response) => {
					console.error(response);
				}
			})
		})
	}
</script>