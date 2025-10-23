<!-- Modal - Add template -->
<div class="modal fade" id="modal-assign-with" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-assign-with-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-assign-with-label">Asociaza</h1>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="template_id">
                    <div class="mb-3">
                        <label class="form-label">Marca / contract</label>
                        <select name="contract" class="form-control form-control-select2" multiple="multiple"></select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Loc de munca (sectie)</label>
                        <select name="section" class="form-control form-control-select2" multiple="multiple"></select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Functie</label>
                        <select name="role" class="form-control form-control-select2" multiple="multiple"></select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Echipa</label>
                        <select name="team" class="form-control form-control-select2" multiple="multiple"></select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Renunta</button>
                    <button type="submit" class="btn btn-primary">Salveaza</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        const $modal = $('#modal-assign-with');
        const $form = $modal.find('form');

        const $select = {
            contract: $('select[name="contract"]'),
            section: $('select[name="section"]'),
            role: $('select[name="role"]'),
            team: $('select[name="team"]'),
        };


        db.contract.forEach(({id, name}) => $select.contract.append($('<option>', {value: id, text: name})));
        db.section.forEach(({id, name}) => $select.section.append($('<option>', {value: id, text: name})));
        db.role.forEach(({id, name}) => $select.role.append($('<option>', {value: id, text: name})));
        db.team.forEach(({id, name}) => $select.team.append($('<option>', {value: id, text: name})));


        $form.on('submit', function (ev) {
            ev.preventDefault();

            $.ajax({
                url: 'api/update-template-relation.php',
                method: 'POST',
                data: {
                    template_id: $form.find('input[name="template_id"]').val(),
                    contract: $select.contract.val(),
                    section: $select.section.val(),
                    role: $select.role.val(),
                    team: $select.team.val(),
                },
                success: function (response) {
                    $modal.modal('hide');

                    notify('Relatia actualizata!');

                    renderTemplates();
                }
            })
        })
    });
</script>
