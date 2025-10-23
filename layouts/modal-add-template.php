<?php
$week = [
    'mo' => 'Luni',
    'tu' => 'Marți',
    'we' => 'Miercuri',
    'th' => 'Joi',
    'fr' => 'Vineri',
    'sa' => 'Sâmbătă',
    'su' => 'Duminică',
];
?>

<!-- Modal - Add template -->
<div class="modal fade" id="modal-add-template" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-add-template-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-add-template-label">Adaugă program de lucru</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Denumire</label>
                        <input name="name" type="text" class="form-control"  required>
                    </div>

                    <div class="mb-3">

                        <span>Număr ture</span>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="1" id="type-id-1" required>
                            <label class="form-check-label" for="type-id-1">
                                1 tura
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="2" id="type-id-2" required>
                            <label class="form-check-label" for="type-id-2">
                                2 ture
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="3" id="type-id-3" required>
                            <label class="form-check-label" for="type-id-3">
                                3 ture
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="4" id="type-id-4" required>
                            <label class="form-check-label" for="type-id-4">
                                Program flexibil
                            </label>
                        </div>
                    </div>

                    <div data-section-type-container>
                        <div class="d-none" data-section-type="1">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Ziua</th>
                                    <th>Program (oră început - oră sfârșit)</th>
                                    <th>Pauza (oră început - oră sfârșit)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($week as $id => $name): ?>
                                    <tr>
                                        <td><?= $name ?></td>
                                        <td><input type="time" step="600"  name="interval[1][1][<?= $id ?>][work][start]" data-work-start> - <input type="time" step="600"  name="interval[1][1][<?= $id ?>][work][end]" data-work-end></td>
                                        <td><input type="time" step="600"  name="interval[1][1][<?= $id ?>][break][start]" data-break-start> - <input type="time" step="600"  name="interval[1][1][<?= $id ?>][break][end]" data-break-end></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none" data-section-type="2">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Ziua</th>
                                    <th>Tura</th>
                                    <th>Program (oră început - oră sfârșit)</th>
                                    <th>Pauza (oră început - oră sfârșit)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($week as $id => $name): ?>
                                    <tr>
                                        <td><?= $name ?></td>
                                        <td>Tura 1</td>
                                        <td><input type="time" step="600"  name="interval[2][1][<?= $id ?>][work][start]" data-work-start> - <input type="time" step="600"  name="interval[2][1][<?= $id ?>][work][end]" data-work-end></td>
                                        <td><input type="time" step="600"  name="interval[2][1][<?= $id ?>][break][start]" data-break-start> - <input type="time" step="600"  name="interval[2][1][<?= $id ?>][break][end]" data-break-end></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tura 2</td>
                                        <td><input type="time" step="600"  name="interval[2][2][<?= $id ?>][work][start]" data-work-start> - <input type="time" step="600"  name="interval[2][2][<?= $id ?>][work][end]" data-work-end></td>
                                        <td><input type="time" step="600"  name="interval[2][2][<?= $id ?>][break][start]" data-break-start> - <input type="time" step="600"  name="interval[2][2][<?= $id ?>][break][end]" data-break-end></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none" data-section-type="3">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Ziua</th>
                                    <th>Tura</th>
                                    <th>Program (oră început - oră sfârșit)</th>
                                    <th>Pauza (oră început - oră sfârșit)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($week as $id => $name): ?>
                                    <tr>
                                        <td><?= $name ?></td>
                                        <td>Tura 1</td>
                                        <td><input type="time" step="600"  name="interval[3][1][<?= $id ?>][work][start]" data-work-start> - <input type="time" step="600"  name="interval[3][1][<?= $id ?>][work][end]" data-work-end></td>
                                        <td><input type="time" step="600"  name="interval[3][1][<?= $id ?>][break][start]" data-break-start> - <input type="time" step="600"  name="interval[3][1][<?= $id ?>][break][end]" data-break-end></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tura 2</td>
                                        <td><input type="time" step="600"  name="interval[3][2][<?= $id ?>][work][start]" data-work-start> - <input type="time" step="600"  name="interval[3][2][<?= $id ?>][work][end]" data-work-end></td>
                                        <td><input type="time" step="600"  name="interval[3][2][<?= $id ?>][break][start]" data-break-start> - <input type="time" step="600"  name="interval[3][2][<?= $id ?>][break][end]" data-break-end></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tura 3</td>
                                        <td><input type="time" step="600"  name="interval[3][3][<?= $id ?>][work][start]" data-work-start> - <input type="time" step="600"  name="interval[3][3][<?= $id ?>][work][end]" data-work-end></td>
                                        <td><input type="time" step="600"  name="interval[3][3][<?= $id ?>][break][start]" data-break-start> - <input type="time" step="600"  name="interval[3][3][<?= $id ?>][break][end]" data-break-end></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-none" data-section-type="4">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Ziua</th>
                                    <th>Program (oră început - oră sfârșit)</th>
                                    <th>Pauza (oră început - oră sfârșit)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <button type="button" class="btn btn-sm btn-outline-success" id="add-template-interval">✚ Adaugă interval</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
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

<!-- This template is used for `Program flexibil` rows -->
<template id="add-interval-template">
    <tr>
        <td>
            <select data-day>
                <?php foreach ($week as $id => $name): ?>
                    <option value="<?= $id ?>"><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td><input type="time" step="600"  data-work-start> - <input type="time" step="600"  data-work-end></td>
        <td><input type="time" step="600"  data-break-start> - <input type="time" step="600"  data-break-end></td>
        <td>
            <button type="button" class="btn btn-outline-light btn-sm" data-btn-remove-template-row>❌</button>
        </td>
    </tr>
</template>

<script>
    function initValidationIntervals() {

        // Currently disabled since validation is a complex job
        // and is out of scope. ༼ つ ◕_◕ ༽つ
        return;

        // Data validation
        $('input[data-work-start]').on('change', function (ev) {
            const $this = $(this);
            const value = ev.target.value;

            $this.parent().find('input[data-work-end]').attr('min', value);
            $this.parent().find('input[data-break-end]').attr('min', value);
        });

        $('input[data-work-end]').on('change', function (ev) {
            const $this = $(this);
            const value = ev.target.value;

            $this.parent().find('input[data-work-start]').attr('max', value);
            $this.parent().find('input[data-break-start]').attr('max', value);
        });

        $('input[data-break-start]').on('change', function (ev) {
            const $this = $(this);
            const value = ev.target.value;

            $this.parent().find('input[data-break-end]').attr('min', value)
        });

        $('input[data-break-end]').on('change', function (ev) {
            const $this = $(this);
            const value = ev.target.value;

            $this.parent().find('input[data-break-start]').attr('max', value)
        });
    }

    function setupAddTemplateModal() {
        const $modal = $('#modal-add-template');
        const $form = $modal.find('form');
        const $sectionTypeContainer = $form.find('div[data-section-type-container]');

        const $input = {
            name: $form.find('input[name="name"]'),
            type: $form.find('input[name="type"]'),
        }

        // Toggle sections based on `Număr ture`
        $input.type.on('change', function (ev) {
            const value = ev.target.value;

            $sectionTypeContainer.children().addClass('d-none')
                .filter(`[data-section-type="${value}"]`)
                .removeClass('d-none')
        });

        // Flexible Schedule
        $('#add-template-interval').on('click', function () {
            const template = document.getElementById('add-interval-template');
            const $root = $(template.content).clone();

            const $tbody = $sectionTypeContainer.find('div[data-section-type="4"]').find('tbody');


            const $day = $root.find('select[data-day]');
            const $workStart = $root.find('input[data-work-start]');
            const $workEnd = $root.find('input[data-work-end]');
            const $breakStart = $root.find('input[data-break-start]');
            const $breakEnd = $root.find('input[data-break-end]');

            const dayName = $day.val();
            const totalRows = $tbody.children().length;


            $day.attr('name', `interval[4][${totalRows}][day]`);
            $workStart.attr('name', `interval[4][${totalRows}][work][start]`);
            $workEnd.attr('name', `interval[4][${totalRows}][work][end]`);
            $breakStart.attr('name', `interval[4][${totalRows}][break][start]`);
            $breakEnd.attr('name', `interval[4][${totalRows}][break][end]`);

            $tbody.append($root);

            initValidationIntervals();
        });

        // Add delete action on `Program flexibil` row
        $modal.on('click', 'button[data-btn-remove-template-row]', function () {
            const $this = $(this).closest('tr');

            $this.fadeOut(() => $this.remove());
        });

        // Reset the form before the modal shown
        $modal.on('show.bs.modal', function () {
            $form[0].reset();

            $sectionTypeContainer.children().addClass('d-none');
        })

        // Submit data
        $form.on('submit', function (ev) {
            ev.preventDefault();

            $.ajax({
                url: 'api/update-template.php',
                method: 'POST',
                data: $form.serialize(),
                success: function (response) {
                    $modal.modal('hide');

                    notify('Sablon creat cu succes!');

                    renderTemplates();
                }
            })
        });
    }

    $(document).ready(setupAddTemplateModal);
</script>