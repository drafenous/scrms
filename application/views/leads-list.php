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
				<button type="button" id="closeLead" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Fechar</button>
				<button type="button" id="editLead" class="btn btn-primary"><i class="fas fa-pen-square"></i> Editar</button>
				<button type="button" id="cancelSaveLead" class="btn btn-danger d-none"><i class="fas fa-window-close"></i> Cancelar</button>
				<button type="submit" id="saveLead" class="btn btn-success d-none"><i class="fas fa-pen-square"></i> Salvar</button>
			</div>
		</div>
	</div>
</div>

<div id="confirmationCancelModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar Edição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Você tem certeza?</h5>
                <p>Todos os campos serão resetados e a operação é <u>irreversível</u>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmationCancelNo" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                <button type="button" id="confirmationCancelYes" class="btn btn-primary"><i class="fas fa-recycle"></i> Resetar Campos</button>
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
					render: $.fn.dataTable.render.moment('DD/MM/YYYY - HH:mm:ss')
				},
				{
					data: 'lastSchedule',
					title: 'Última Interação',
					render: $.fn.dataTable.render.moment('DD/MM/YYYY - HH:mm:ss')
				},
				{
					data: null,
					render: function(data) {
						var html = `
							<button type="button" class="btn btn-sm btn-primary viewMore" role="button" data-toggle="popover" data-trigger="hover" data-content="Ver mais"><i class="fas fa-search-plus"></i></button> 
							<button type="button" class="btn btn-sm btn-danger deleteLead" role="button" data-toggle="popover" data-trigger="hover" data-content="Excluir Lead" onclick="deleteLead(${data.id})"><i class="fas fa-trash-alt"></i></button>`
						return html;
					},
					title: 'Opções'
				}
			]
		});

		$('#dtLeads').on('click', '.viewMore', function(event) {
			var tr = $(this).closest('tr');
			var row = dtLeads.row(tr);

			var html = viewMoreHTML(row.data());
			$('#showMoreModal').find('.modal-body').html(html);
			$('.nationalRegister').mask(nationalRegisterMaskBehavior, nationalRegisterOptions);
			$('#showMoreModal').modal('show');
		})

		$('#editLead').on('click', function(){
			// enable edit
			$('#editLeadForm').find(':input').attr('disabled', false);

			// switch buttons
			$('#closeLead, #editLead, #cancelSaveLead, #saveLead').toggleClass('d-none');

			// cancel button event
			$('#cancelSaveLead').on('click', function(){
				// show confirmation modal
				$('#confirmationCancelModal').modal('show');

				// confirmation button events
				$('#confirmationCancelYes').on('click', function(){
					$('#editLeadForm')[0].reset();
					$('#editLeadForm').find(':input').attr('disabled', true);
					$('#cancelSaveLead, #saveLead').addClass('d-none')
					$('#closeLead, #editLead').removeClass('d-none')
					$('#confirmationCancelModal').modal('hide');
				})
			});

			// save lead event
			$('#saveLead').on('click', function(){
				$('#cancelSaveLead, #saveLead').addClass('d-none')
				$('#closeLead, #editLead').removeClass('d-none')
			})
		});

		// reset modal if closed
		$('#showMoreModal').on('hide.bs.modal', function(){
			$('#editLeadForm')[0].reset();
			$('#editLeadForm').find(':input').attr('disabled', true);
			$('#cancelSaveLead, #saveLead').addClass('d-none')
			$('#closeLead, #editLead').removeClass('d-none')
		})
	})

	function viewMoreHTML(data) {
		if (data == null) return false;
		console.log(data);
		var table = $(`
		<h3>Dados da empresa</h3>
		<form id="editLeadForm">
			<table id="viewMoreTable" class="table display table-hover table-striped">
				<thead>
					<tr>
						<th scope="col">Informação</th>
						<th scope="col">Valor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="row">CPF/CNPJ</td>
						<td class="nationalRegister"><input class="form-control" name="nationalRegister" placeholder="Digite o CPF ou CNPJ" type="text" value="${data.nationalRegister}" disabled></input></td>
					</tr>
					<tr>
						<td scope="row">Nome/Razão Social</td>
						<td><input class="form-control" name="name" placeholder="Digite o nome completo" type="text" value="${data.name}" disabled></input></td>
					</tr>
					<tr>
						<td scope="row">Nome Fantasia</td>
						<td>${data.fantasyName == "" ? (data.nationalRegister.length <= 14 ? 'Cadastro de Pessoa Física' : '<input class="form-control" name="name" placeholder="Digite o nome completo" type="text" value="Não Informado" disabled></input>') : `<input class="form-control" name="name" placeholder="Digite o nome completo" type="text" value="${data.fantasyName}" disabled></input>`}</td>
					</tr>
					<tr>
						<td scope="row">Data de Registro</td>
						<td>${data.createdDate = moment().format('DD/MM/YYYY - HH:mm:ss')}</td>
					</tr>
					<tr>
						<td scope="row">Última Tarefa Realizada</td>
						<td>${data.lastSchedule = moment().format('DD/MM/YYYY - HH:mm:ss')}</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th>Informação</th>
						<th>Valor</th>
					</tr>
				</tfoot>
			</table>
		</form>
		`);

		return table;
	}

	function deleteLead(id = null) {
		if (id == null) {
			console.error('[deleteLead]: invalid ID', id);
			return false;
		}

		$('#confirmationModal').modal('show');

		$('#confirmationYes').on('click', function() {
			$.ajax({
				url: 'http://localhost:3000/leadsList/' + id,
				type: 'DELETE',
				dataType: 'json',
				success: (response) => {
					dtLeads.ajax.reload();
					$('#confirmationModal').modal('hide');
				},
				error: (response) => {
					console.error('[deleteLead]:', response);
				}
			})
		})
	}
</script>