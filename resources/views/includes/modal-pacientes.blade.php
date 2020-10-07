<div class="modal fade" id="modal-pacientes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-danger">Pacientes</span>
            </div>
            <div class="modal-body">
                <table id="pacientes-table" class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>Cod.</th>
                        <th>Nome</th>
                        <th>Data Nasc</th>
                        <th>CPF</th>
                        <th>Celular</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_pacientes as $paciente)
                        <tr class="row-paciente">
                            <td class="id-paciente">{{$paciente->id}}</td>
                            <td class="nome-paciente">{{$paciente->nome}}</td>
                            <td>{{$helper->formatDateToDisplay($paciente->data_nasc)}}</td>
                            <td class="nome-paciente">{{$paciente->cpf}}</td>
                            <td class="nome-paciente">{{$paciente->celular}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>