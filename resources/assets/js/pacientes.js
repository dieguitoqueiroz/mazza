(function() {
    var pacientes;
    pacientes = {
        initialize: function () {
            pacientes.getPaciente();
        },

        getPaciente: function () {

            var btn_det_paciente,
                id_paciente;

            $('.btn-det-paciente').bind('click', function () {
                id_paciente = $(this).attr('data-idpaciente');
                $('#det-pacientes').modal('show');
            })

            $(document).on('shown.bs.modal','#det-pacientes', function (e) {
                $.ajax({
                    url: '/pacientes/listar/' + id_paciente
                }).done(function(data) {
                    pacientes.showDadosPaciente(data)
                }).fail(function() {
                        console.log("error");
                    });
            })
        },

        showDadosPaciente: function (data) {
            var column;

            $(".dinamic-data").each(function(index) {
                column = $(this).attr('data-column');
                $(this).text(data[column]);
            });
        }

    }
    pacientes.initialize();
    return pacientes;
})();