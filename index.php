<!doctype html>
<html lang="en">
<?php include_once './layouts/head.php' ?>
<body>

<div id="app">
    <?php include_once './layouts/nav.php' ?>

    <div class="container text-end mb-3">
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal-add-template">✚ Adaugă program de lucru</button>
    </div>

    <div class="container">

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tip</th>
                <th>Denumire</th>
                <th>Actiunii</th>
            </tr>
            </thead>
            <tbody id="template-body">
            </tbody>
        </table>
    </div>
</div>


<script>
    function renderTemplates() {
        const $body = $('#template-body');

        $body.empty();

        fetch('api/get-template.php')
            .then(response => response.json())
            .then(data => {
                data.forEach((value) => {
                    const {id, name, type} = value || {};

                    const $tr = $('<tr>');

                    $tr.append($('<td>', {text: id}));
                    $tr.append($('<td>', {text: db.scheduleType[type].name}));
                    $tr.append($('<td>', {text: name}));

                    // Add some actions
                    const $tdActions = $('<td>');

                    $tdActions.append($('<button>', {
                        type: 'button',
                        class: 'btn btn-sm btn-dark mx-1',
                        text: 'detalii', 'data-action-view': '',
                        'data-id': id,
                    }));

                    $tdActions.append($('<button>', {
                        type: 'button',
                        class: 'btn btn-sm btn-warning mx-1',
                        text: 'modifica', 'data-action-edit': '',
                        'data-id': id,
                    }));

                    $tdActions.append($('<button>', {
                        type: 'button',
                        class: 'btn btn-sm btn-success mx-1',
                        text: 'asociaza cu', 'data-action-assign': '',
                        'data-id': id,
                    }));

                    $tr.append($tdActions);

                    $body.append($tr);
                });
            });
    }

    renderTemplates();

    $(document).on('click', 'button[data-action-view]', () => notify('In progress `view` ԅ(¯﹃¯ԅ)'));

    $(document).on('click', 'button[data-action-edit]', () => notify('In progress `edit` ԅ(¯﹃¯ԅ)'));

    $(document).on('click', 'button[data-action-assign]', function () {
        const $this = $(this);
        const $modal = $('#modal-assign-with');
        const templateId = $this.data('id');

        $modal.find('.form-control-select2').select2({
            theme: 'bootstrap-5'
        });

        fetch('api/get-template-relation.php?template_id=' + templateId)
            .then(response => response.json())
            .then(data => {
                const {contract, section, role, team} = data;

                const $select = {
                    contract: $modal.find('select[name="contract"]'),
                    section: $modal.find('select[name="section"]'),
                    role: $modal.find('select[name="role"]'),
                    team: $modal.find('select[name="team"]'),
                };

                $modal.find('input[name="template_id"]').val(templateId);

                $select.contract.val(contract).trigger('change');
                $select.section.val(section).trigger('change');
                $select.role.val(role).trigger('change');
                $select.team.val(team).trigger('change');

                $modal.modal('show');
            });
    });
</script>


<?php include_once 'layouts/modal-add-template.php' ?>
<?php include_once 'layouts/modal-assign-with.php' ?>
<?php include_once 'layouts/toast-notification.php' ?>

</body>
</html>