(function() {
    var main,
        initialized;

    main = {
        initialize: function () {
            initialized = false;
            main.initDataTable();
            main.deleteModalConfirmation();
            main.listenClickModalMedicos();
            main.listenClickModalPaciente();
            main.initHamburgerMenu();
            main.initTooltip();
            main.initCalendar();
            main.loadCalendarByIdMedico();
            main.initDropDown();
        },

        initTooltip: function() {
            $('[data-toggle="tooltip"]').tooltip();
        },

        initDropDown: function() {
            $('.dropdown-toggle').dropdown();
        },

        initDataTable: function () {
            $('.datatable').DataTable({
                language: {
                    processing:     "Carregando...",
                    search:         "Buscar:",
                    lengthMenu:    "Exibindo _MENU_ linhas",
                    info:           "Exibindo _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Carregando...",
                    zeroRecords:    "Sem registros",
                    emptyTable:     "Sem registros",
                    paginate: {
                        first:      "Primeiro",
                        previous:   "Anterior",
                        next:       "Próximo",
                        last:       "Último"
                    }
                }
            });
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

        initHamburgerMenu: function () {
            $('.hamburger').bind('click', function () {
                $(this).toggleClass('is-active');

                if ($(this).hasClass('is-active'))
                    $('.nav-holder').addClass('show')
                else
                    $('.nav-holder').removeClass('show')
            })
        },

        initCalendar: function (id_medico) {
            var calendar_wrapper,
                url;

            calendar_wrapper = $('#calendar-wrapper');
            console.log(id_medico);
            if (id_medico == null)
                url = '/agenda/consultas';
            else
                url = '/agenda/consultas?id_medico=' + id_medico;

            if(initialized)
                calendar_wrapper.fullCalendar( 'destroy' );

            calendar_wrapper.fullCalendar({
                locale: 'pt-BR',
                header: { center: 'month,agendaWeek,agendaDay' },
                events: url,
                weekends: true,
                eventLimit: 4,
                timeFormat: 'H:mm'
            })

            initialized = true;
        },

        reloadCalendar: function() {
            $('#calendar-wrapper').fullCalendar('refetchEvents');
        },

        loadCalendarByIdMedico: function () {
            var id_medico,
                nome_medico,
                el_nome_medico;

            el_nome_medico = $('#nome-medico');

            $('.drop-med-age').bind('click', function () {
                id_medico = $(this).attr('data-idmedico');
                nome_medico = $(this).text();
                el_nome_medico.text('Mostrando eventos para: ' + nome_medico);
                main.initCalendar(id_medico);
            })
        }
    }
    main.initialize();
    return main;
})();