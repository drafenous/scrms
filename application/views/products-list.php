<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Lista de Produtos</h3>
        </div>
    </div>

    <hr>

    <div class="col-md-12">
        <table id="dtProducts" class="table display table-hover table-striped" style="width: 100%">
            <thead>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>

<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Excluir Produto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>Você tem certeza?</h5>
				<p>O Produto será removido do banco de dados e a operação é <u>irreversível</u>.</p>
			</div>
			<div class="modal-footer">
				<button type="button" id="confirmationNo" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
				<button type="button" id="confirmationYes" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir Lead</button>
			</div>
		</div>
	</div>
</div>

<script>
    var pt = [];
    $(document).ready(function(){
        // load product types
        $.ajax({
            url: 'http://localhost:3000/productTypes',
            type: 'GET',
            dataType: 'json',
            cache: false,
            success: (response) => {
                return pt = response;
            },
            error: (response) => {
                console.error('[productTypes]:', response)
            }
        });

        // DataTables
        dtProducts = $('#dtProducts').dataTable({
            ajax: {
                url: 'http://localhost:3000/products',
                dataType: 'json',
                type: 'GET',
                dataSrc: '',
                error: function(response){
                    console.error('[dtProducts]:', response)
                }
            },
            columns: [
                {data: 'id', title: 'Código do Produto', className: 'text-center'},
                {data: 'name', title: 'Nome do Produto', className: 'text-left'},
                {data: 'productType', title: 'Tipo de Produto', className: 'text-left', render: function(data){return productTypes(data)}},
                {data: 'stock', title: 'Estoque', className: 'text-center', render: function(data){return data === 'infinity' ? '&infin;' : data.avaiable + '/' + data.total}},
                {data: null, title: 'Ações', className: 'text-center', render: function(data){
                    var html = `
                        <button type="button" class="btn btn-sm btn-primary viewMore" role="button" data-toggle="popover" data-trigger="hover" data-content="Ver mais"><i class="fas fa-search-plus"></i></button> 
                        <button type="button" class="btn btn-sm btn-danger deleteProduct" role="button" data-toggle="popover" data-trigger="hover" data-content="Excluir Produto" onclick="deleteProduct(${data.id})"><i class="fas fa-trash-alt"></i></button>`
                    return html;
                }}
            ],
            rowCallback: function(row, data, index){
                if(data.stock === 'infinity'){
                    return $(row).find('td:eq(3)').css({'background-color': '#44bd32', 'color': 'white'});
                }
                var avarage = data['stock'].total / 2;

                if(data['stock'].avaiable < avarage / 2){
                    return $(row).find('td:eq(3)').css({'background-color': '#c23616', 'color': 'white'});
                }

                if(data['stock'].avaiable <= avarage){
                    return $(row).find('td:eq(3)').css({'background-color': '#e1b12c', 'color': 'white'});
                }

                if(data['stock'].avaiable > avarage){
                    return $(row).find('td:eq(3)').css({'background-color': '#0097e6', 'color': 'white'});
                }
            }
        });
    })

    function productTypes(id){
        var res = pt.find(obj => obj.id === id);
        return res.string;
    }

    function deleteProduct(id){
        if(id == null){
            return console.error('[deleteProduct] invalid param:', id);
        }
		$('#confirmationModal').modal('show');

		$('#confirmationYes').on('click', function() {
			$.ajax({
				url: 'http://localhost:3000/products/' + id,
				type: 'DELETE',
				dataType: 'json',
				success: (response) => {
					dtProducts.ajax.reload();
					return $('#confirmationModal').modal('hide');
				},
				error: (response) => {
					return console.error('[deleteProduct]:', response);
				}
			})
		})
    }
</script>