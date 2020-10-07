<div class="modal fade" id="modal-medicos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-danger">Médicos</span>
            </div>
            <div class="modal-body">
                <table id="medico-table" class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>Cod.</th>
                        <th>Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_medicos as $medico)
                        <tr class="row-medico">
                            <td class="id-medico">{{$medico->id}}</td>
                            <td class="nome-medico">{{$medico->nome}}</td>
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