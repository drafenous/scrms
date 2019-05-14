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
                <label>Nome Fantasia</label>
                <input type="text" class="form-control" name="fantasyName" id="fantasyName" aria-describedby="fantasyNameHelp" placeholder="Nome Fantasia" autocomplete="off">
                <small id="fantasyNameHelp" class="form-text text-muted">É um nome representativo da Empresa, Campo opcional.</small>
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
                    </select>
                </div>

                <div class="form-group col-6 col-md-2">
                    <label for="responsiblePhone1">Telefone Primário</label>
                    <input type="text" class="form-control phone" id="responsiblePhone1" name="responsibles[][phones]" aria-describedby="responsiblePhone1Help" placeholder="Telefone Fixo ou Celular" autocomplete="off" required>
                    <small id="responsiblePhone1Help" class="form-text text-muted">Necessário informar o DDD.</small>
                </div>

                <div class="form-group col-6 col-md-2">
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
            <div class="col-md-12">
                <h4>Endereço</h4>
            </div>
        </div>

        <div class="row" id="address">
            <div class="col-md-12">
                <div id="zipAlert" class="alert d-none" role="alert">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="addressZipCode">CEP</label>
                <input type="text" class="form-control zipcode" id="addressZipCode" name="address[ZipCode]" aria-describedby="zipCodeHelp" placeholder="Digite o CEP" autocomplete="off" required>
                <small id="zipCodeHelp" class="form-text text-muted">Ao digitar o CEP os demais campos serão preenchindos automaticamente.</small>
            </div>

            <div class="form-group col-md-4">
                <label for="addressStreet">Logradouro</label>
                <input type="text" class="form-control" id="addressStreet" name="address[Street]" aria-describedby="streetHelp" placeholder="Digite o Logradouro" autocomplete="off" required disabled>
                <small id="streetHelp" class="form-text text-muted">Logradouro pode ser a Rua, Estrada, Avenida e etc.</small>
            </div>

            <div class="form-group col-6 col-md-4">
                <label for="addressNeighborhood">Bairro</label>
                <input type="text" class="form-control" id="addressNeighborhood" name="address[Neighborhood]" placeholder="Digite o Bairro" autocomplete="off" required disabled>
            </div>

            <div class="form-group col-6 col-md-4">
                <label for="addressExtra">Complemento</label>
                <input type="text" class="form-control" id="addressExtra" name="address[Extra]" aria-describedby="extraHelp" placeholder="Digite o Complemento" autocomplete="off" disabled>
                <small id="extraHelp" class="form-text text-muted">Campo opcional</small>

            </div>


            <div class="form-group col-6 col-md-2">
                <label for="addressUF">UF</label>
                <select class="form-control" id="addressUF" name="address[UF]" autocomplete="off" required disabled>
                    <option value="" selected disabled>Selecione o UF</option>
                </select>
            </div>

            <div class="form-group col-6 col-md-2">
                <label for="addressLocation">Localidade</label>
                <select class="form-control" id="addressLocation" name="address[Location]" aria-describedby="locationHelp" autocomplete="off" required disabled>
                    <option value="" selected disabled>Selecione o municiopio</option>
                </select>
                <small id="locationHelp" class="form-text text-muted">Localidade pode ser a Cidade, Capital, Região e etc.</small>
            </div>



            <div class="form-group col-md-4">
                <label for="addressNumber">Número</label>
                <input type="text" class="form-control" id="addressNumber" name="address[Number]" placeholder="Digite o Número" autocomplete="off" disabled>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <div id="alertSubmit" class="d-none alert" role="alert">
                </div>
            </div>

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
        // leads responsibles list
        $.ajax({
            url: "http://localhost:3000/responsiblesTypes",
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                $.each(response, function(index, item){
                    var option = $(`<option value="${item.id}">${item.string}</option>`);
                    $('#responsibleDivision').append(option);
                })
            },
            error: (response) => {
                console.error('[leadsResponsiblesList]:', response)
            }
        });

        // UF List
        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            dataType: 'json',
            type: 'GET',
            success: (response) => {
                // order UF.
                response.sort(function(a, b){
                    if ( a.sigla < b.sigla ){
                        return -1;
                    }
                    if ( a.sigla > b.sigla ){
                        return 1;
                    }
                    return 0;
                })

                // Save to localStorage
                localStorage.setItem('listaUF', JSON.stringify(response));

                // build options list
                $(response).each(function(index, item){
                    var option = $(`<option value="${item.sigla}">${item.sigla}</option>`);
                    $('#addressUF').append(option);
                })
            },
            error: (response) => {
                console.error('[UFList]:', response)
            }
        });

        $('#addressUF').on('change', function(event, string){
            // set disabled to load.
            $('#addressLocation').attr('disabled', true);

            var uf = $(this).val();
            var locationList = localStorage.getItem('listaUF');
            locationList = JSON.parse(locationList);

            $.each(locationList, function(index, item){
                if(item.sigla == uf){
                    $.ajax({
                        url: `http://servicodados.ibge.gov.br/api/v1/localidades/estados/${item.id}/municipios`,
                        type: 'GET',
                        dataType: 'json',
                        success: (response) => {
                            $('#addressLocation').find('option').not(':first').remove();
                            $.each(response, function(index, item){
                                var option = $(`<option value="${item.nome}">${item.nome}</option>`)
                                $('#addressLocation').append(option);
                            })
                            $('#addressLocation').val(string);
                            $('#addressLocation').attr('disabled', false);
                        },
                        error: (response) => {
                            console.error('[addressUF]:', response);
                        }
                    })
                }
            })
        });

        // show/hide fantasy name
        $('#nationalRegister').on('keyup', function() {
            ($(this).val().length > 14) ? $('#fantasyName').closest('.form-group').removeClass('d-none invisible'): $('#fantasyName').closest('.form-group').addClass('d-none invisible');
        });

        // buttons actions
        $('#addContact').on('click', function() {
            addContact();
            $('.phone').mask(PhonesMaskBehavior, phonesOptions);
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
            data.push({name: 'lastSchedule', value: window['globals'].now})

            console.log(data);
            
            $.ajax({
                url: 'http://localhost:3000/leadsList',
                type: 'post',
                dataType: 'json',
                data: data,
                success: (response) => {
                    if(!response){
                        var html = '<i class="fa fa-exclamation-triangle"></i> <strong>Erro!</strong> - Verifique os dados de inseridos.';
                        return $('#alertSubmit').removeClass('d-none alert-success alert-danger alert-warning').addClass('alert-danger').html(html);
                    }
                    var html = '<i class="fa fa-check"></i> <strong>Feito!</strong> - Lead cadastrado com sucesso.';
                    return $('#alertSubmit').removeClass('d-none alert-success alert-danger alert-warning').addClass('alert-success').html(html);
                },
                error: (response) => {
                    var html = '<i class="fa fa-exclamation-triangle"></i> <strong>Erro!</strong> - Houve uma falha na comunicação com o servidor, tente novamente.';
                    $('#alertSubmit').removeClass('d-none alert-success alert-danger alert-warning').addClass('alert-danger').html(html);
                    return console.error('[submitLead]:', response);
                }
            })
        })

        //search zipcode
        $('.zipcode').on('input', function(){
            if($(this).val().length == 9){
                var zipcode = $(this).val()
                $.ajax({
                    url: `https://viacep.com.br/ws/${zipcode}/json/`,
                    dataType: 'json',
                    success: (response) => {
                        if(response.erro == true){
                            console.warn('[zipCode]: Cep inválido ou não localizado. Você pode inserir os dados manualmente');
                            $('#address').find(':input').attr('disabled', false);
                            return $('#zipAlert').html(`<i class="fa fa-exclamation-triangle"></i> <strong>Erro!</strong> - CEP não localizado ou inválido. Você pode inserir os dados manualmente.`).removeClass('d-none alert-success alert-danger alert-warning').addClass('alert-warning');
                        }

                        $('#addressStreet').val(response.logradouro).attr('disabled', false);
                        $('#addressNeighborhood').val(response.bairro).attr('disabled', false);
                        $('#addressExtra').val(response.complemento).attr('disabled', false);
                        $('#addressUF').val(response.uf).attr('disabled', false).trigger('change', response.localidade);
                        $('#addressNumber').val("").attr('disabled', false);

                        return $('#zipAlert').html(`<i class="fa fa-check"></i> <strong>Feito!</strong> - CEP localizado com sucesso.`).removeClass('d-none alert-success alert-danger alert-warning').addClass('alert-success');
                    },
                    error: (response) => {
                        $('#zipAlert').html(`<i class="fa fa-exclamation-triangle"></i> <strong>Erro!</strong> - Falha ao contatar o site do ViaCEP.`).removeClass('d-none alert-success alert-danger alert-warning').addClass('alert-danger');
                        return console.error('[zipCode]:', response);
                    }
                })
            }
            if($(this).val().length < 9){
                $('#zipAlert').html('').removeClass('alert-*').addClass('d-none');
            }
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