$(document).ready(function(){
    // default document load

    // nav
    $('.hasChild').on('click', function(){
        $(this).toggleClass('open');
        $(this).find('ul.navChild').toggleClass('d-none');
    });
})

// FORMATERS
// PHONE
PhonesMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    phonesOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(PhonesMaskBehavior.apply({}, arguments), options);
        }
    };
    
    $('.phone').mask(PhonesMaskBehavior, phonesOptions);

// NATIONAL REGISTER
nationalRegisterMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 14 ? '00.000.000/0000-00' : '000.000.000-009999';
    },
    nationalRegisterOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(nationalRegisterMaskBehavior.apply({}, arguments), options);
        }
    };
    
    $('.nationalRegister').mask(nationalRegisterMaskBehavior, nationalRegisterOptions);

// ZIPCODE
    $('.zipcode').mask('00000-000');

// DataTables
$.extend( $.fn.dataTable.defaults, {
    deferRender: true,
    scroller: true,
    scrollX: '100%',
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i> PDF'
        },
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Excel'
        },
        'pageLength',
        {
        text: '<i class="fas fa-sync-alt"></i> Recarregar',
        action: function ( e, dt, node, config ) {
            dt.ajax.reload(null, false);
            }
        }
    ],
    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 resultados', '25 resultados', '50 resultados', 'Todos os resultados' ]
    ],
    language: {
        sEmptyTable: "Nenhum registro encontrado",
        sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
        sInfoFiltered: "(Filtrados de _MAX_ registros)",
        sInfoPostFix: "",
        sInfoThousands: ".",
        sLengthMenu: "_MENU_ resultados por página",
        sLoadingRecords: "Carregando...",
        sProcessing: "Processando...",
        sZeroRecords: "Nenhum registro encontrado",
        sSearch: "Pesquisar",
        oPaginate: {
            sNext: "Próximo",
            sPrevious: "Anterior",
            sFirst: "Primeiro",
            sLast: "Último"
        },
        oAria: {
            sSortAscending: ": Ordenar colunas de forma ascendente",
            sSortDescending: ": Ordenar colunas de forma descendente"
        },
        buttons: {
            pageLength: {
                _: "<i class='fas fa-table'></i> Exibindo %d resultados",
                '-1': "<i class='fas fa-table'></i> Exibindo todos os resultados"
            }
        }
    },
    preDrawCallback: function(settings){
        var api = this.api();
        tableId = api.table().node().id

        $('.table').closest('.dataTable_element').find('.alert').removeClass('d-none').addClass('alert-info').html('<i class="fas fa-spinner fa-spin"></i> <strong>Aguarde!</strong> Carregando dados.');
    },
    drawCallback: function(settings){
        var api = this.api();
        tableId = api.table().node().id
        
        $('.table').closest('.dataTable_element').find('.alert').addClass('d-none').removeClass('alert-info').html('');
        $('thead th').removeClass('phone nationalRegister');
        $('.nationalRegister').mask(nationalRegisterMaskBehavior, nationalRegisterOptions);
        $('.phone').mask(nationalRegisterMaskBehavior, nationalRegisterOptions);

        // popover
        $('[data-toggle="popover"]').popover()
    }
})