(function() {
    var main;
    main = {
        initialize: function () {
            main.initializeDataTable();
            main.deleteModalConfirmation();
            main.listenClickModalMedicos();
            main.listenClickModalPaciente();
        },

        initializeDataTable: function () {
            $('.datatable').DataTable();
        },

        deleteModalConfirmation: function () {
            var delete_link,
                delete_button;

            delete_button = $('#confirm-delete .btn-delete');

            $('.delete-link').bind('click', function () {
                delete_link = $(this).attr('data-href');
                delete_button.attr('href', delete_link);
            });
        },

        listenClickModalMedicos: function()
        {
            var rowMedico,
                id_medico,
                nome_medico,
                inputNomeMedico,
                inputIdMedico;

            rowMedico = $('.row-medico');
            inputNomeMedico = $('#medico');
            inputIdMedico = $('#id_medico');

            rowMedico.bind('click', function () {
                id_medico = $(this).children('.id-medico').html();
                nome_medico = $(this).children('.nome-medico').html();
                inputNomeMedico.val(nome_medico);
                inputIdMedico.val(id_medico);
            });
        },

        listenClickModalPaciente: function()
        {
            var rowPaciente,
                id_paciente,
                nome_paciente,
                inputNomePaciente,
                inputIdPaciente;

            rowPaciente = $('.row-paciente');
            inputNomePaciente = $('#paciente');
            inputIdPaciente = $('#id_paciente');

            rowPaciente.bind('click', function () {
                id_paciente = $(this).children('.id-paciente').html();
                nome_paciente = $(this).children('.nome-paciente').html();
                inputNomePaciente.val(nome_paciente);
                inputIdPaciente.val(id_paciente);
            });
        },

        autoFillEndereco: function() {


        }
    }
    main.initialize();
    return main;
})();