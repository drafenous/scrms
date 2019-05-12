<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Cadastrar Lead</h3>
        </div>
    </div>
    <hr>
    <form id="submitLead">
        <div class="row">
            <div class="col-md-12">
                <h4>Dados básicos</h4>
            </div>
        </div>
        <div id="formBasicData" class="row">
            <div class="form-group col-md-4">
                <label for="nationalRegister">CPF/CNPJ</label>
                <input type="text" class="form-control nationalRegister" id="nationalRegister" name="nationalRegister" aria-describedby="nationalRegisterHelp" placeholder="Digite o CPF ou CNPJ" autocomplete="off" required>
                <small id="nationalRegisterHelp" class="form-text text-muted">Digite somente os números, os separadores são inseridos automaticamente.</small>
            </div>

            <div class="form-group col-md-4">
                <label>Nome Completo/Razão Social</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Digite o Nome Completo ou Razão Social" autocomplete="off" required>
                <small id="nameHelp" class="form-text text-muted">Preencha de acordo com o tipo de registro (Jurídico ou Físico).</small>
            </div>

            <div class="form-group col-md-4 d-none invisible">
                <label>Nome Fantasia (Opcional)</label>
                <input type="text" class="form-control" name="fantasyName" id="fantasyName" aria-describedby="fantasyNameHelp" placeholder="Nome Fantasia" autocomplete="off">
                <small id="fantasyNameHelp" class="form-text text-muted">É um nome representativo da Empresa.</small>
            </div>
        </div>

        <hr>

        <!-- contact -->
        <div class="row">
            <div class="col-md-12">
                <h4>Registro de Contatos</h4>
            </div>
        </div>

        <div id="responsibleGroup">
            <div class="row formResponsible" id="formResponsible">
                <div class="form-group col-md-4">
                    <label for="responsibleName">Responsável</label>
                    <input type="text" class="form-control" id="responsibleName" name="responsibles[][name]" placeholder="Digite o Nome do Responsável" autocomplete="off" required>
                </div>

                <div class="form-group col-md-4">
                    <label for="responsibleDivision">Divisão do Responsável</label>
                    <select class="form-control" id="responsibleDivision" name="responsibles[][division]" required>
                        <option value="" selected disabled>Selecione</option>
                        <option value="0">Compras</option>
                        <option value="1">Vendas</option>
                        <option value="2">Negociador/Procurador</option>
                        <option value="3">Outros</option>
                        <option value="4">Não informado</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="responsiblePhone1">Telefone Primário</label>
                    <input type="text" class="form-control phone" id="responsiblePhone1" name="responsibles[][phones]" aria-describedby="responsiblePhone1Help" placeholder="Telefone Fixo ou Celular" autocomplete="off" required>
                    <small id="responsiblePhone1Help" class="form-text text-muted">Necessário informar o DDD.</small>
                </div>

                <div class="form-group col-md-2">
                    <label for="responsiblePhone2">Telefone Secundário</label>
                    <input type="text" class="form-control phone" id="responsiblePhone2" name="responsibles[][phones]" aria-describedby="responsiblePhone2Help" placeholder="Telefone Fixo ou Celular" autocomplete="off" required>
                    <small id="responsiblePhone2Help" class="form-text text-muted">Necessário informar o DDD.</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="button" id="addContact" class="col-12 col-md-auto btn btn-primary"><i class="fas fa-plus-square"></i> Adicionar Contato</button>&nbsp;
                <button type="button" id="removeContact" class="col-12 col-md-auto btn btn-danger d-none invisible"><i class="fas fa-minus-square"></i> Remover Contato</button>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12 text-right">
                <button type="submit" id="submitNewLead" class="col-12 col-md-auto btn btn-success"><i class="fas fa-check-square"></i> Cadastrar Lead</button>&nbsp;
                <button type="button" id="resetFields" class="col-12 col-md-auto btn btn-danger"><i class="fas fa-recycle"></i> Limpar Campos</button>
            </div>
        </div>
    </form>
</div>

<div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Resetar Campos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Você tem certeza?</h5>
                <p>Todos os campos serão apagados e a operação <u>irreversível</u>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmationNo" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                <button type="button" id="confirmationYes" class="btn btn-primary"><i class="fas fa-recycle"></i> Limpar Campos</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // show/hide fantasy name
        $('#nationalRegister').on('keyup', function() {
            ($(this).val().length > 14) ? $('#fantasyName').closest('.form-group').removeClass('d-none invisible'): $('#fantasyName').closest('.form-group').addClass('d-none invisible');
        });

        // buttons actions
        $('#addContact').on('click', function() {
            addContact();
            $('.phone').mask(SPMaskBehavior, spOptions);
        });

        $('#removeContact').on('click', function() {
            removeContact();
        });

        $('#resetFields').on('click', function() {
            $('#confirmationModal').modal('show');

            $('#confirmationYes').on('click', function() {
                $('#submitLead')[0].reset();
                return $('#confirmationModal').modal('hide');
            })
        })

        // submit new lead
        $('#submitLead').submit(function(event){
            event.preventDefault();
            var data = $(this).serializeArray();

            data.push({name: 'createdDate', value: window['globals'].now})
            data.push({name: 'lastSchedule', value: null})
            data.push({name: 'lastBuy', value: null})

            console.log(data);
            
            $.ajax({
                url: 'http://localhost:3000/leadsList',
                type: 'post',
                dataType: 'json',
                data: data,
                success: (response) => {
                    console.log(response);
                },
                error: (response) => {
                    console.error(response);
                }
            })
        })
    })

    function addContact() {
        var html = $('#formResponsible').clone().find("input:text").val("").end();
        $('#responsibleGroup').append(html);
        return $('.formResponsible').length > 0 ? $('#removeContact').removeClass('d-none invisible') : $('#removeContact').addClass('d-none invisible');
    }

    function removeContact() {
        $('#responsibleGroup').find('.formResponsible:last').remove();
        return $('.formResponsible').length == 1 ? $('#removeContact').addClass('d-none invisible') : $('#removeContact').removeClass('d-none invisible');
    }
</script>