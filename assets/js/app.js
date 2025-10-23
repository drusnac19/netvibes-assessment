function notify(message) {
    const toastEl = document.getElementById('liveToast');

    $(toastEl).find('.toast-body').text(message || 'This is a Bootstrap 5 notification')

    const toast = new bootstrap.Toast(toastEl, {
        autohide: true,
        delay: 1800
    });

    toast.show();
}

// Generate by CHATgpt
function renderSchedulerTable(scheduler) {
    // Define the order of days and nice labels
    const dayNames = {
        mo: 'Luni',
        tu: 'Marți',
        we: 'Miercuri',
        th: 'Joi',
        fr: 'Vineri',
        sa: 'Sâmbătă',
        su: 'Duminică',
    };

    let html = `
    <table border="1" cellspacing="0" cellpadding="6" style="border-collapse: collapse; width: 100%; ">
      <thead style="background: #f2f2f2;">
        <tr>
          <th>Tura</th>
          <th>Ziua</th>
          <th>Program inceput</th>
          <th>Program sfarsit</th>
          <th>Pauza start</th>
          <th>Pauza sfarsit</th>
        </tr>
      </thead>
      <tbody>
  `;

    // Loop through all shifts
    for (const [shiftId, days] of Object.entries(scheduler)) {
        let isFirstDay = true;
        const dayEntries = Object.entries(days);

        // Loop through all days in the shift
        for (const [dayKey, schedule] of dayEntries) {
            html += `
        <tr>
          ${isFirstDay ? `<td rowspan="${dayEntries.length}" style="font-weight: bold;">Tura ${shiftId}</td>` : ""}
          <td>${dayNames[dayKey] || dayKey}</td>
          <td>${schedule.work.start}</td>
          <td>${schedule.work.end}</td>
          <td>${schedule.break.start}</td>
          <td>${schedule.break.end}</td>
        </tr>
      `;
            isFirstDay = false;
        }
    }

    html += `
      </tbody>
    </table>
  `;

    return html;
}

// Generate by CHATgpt
function renderSchedulerTableNoShift(scheduleArray) {
    const dayNames = {
        mo: 'Luni',
        tu: 'Marți',
        we: 'Miercuri',
        th: 'Joi',
        fr: 'Vineri',
        sa: 'Sâmbătă',
        su: 'Duminică',
    };

    let html = `
    <table border="1" cellspacing="0" cellpadding="6" style="border-collapse: collapse; width: 100%; ">
      <thead style="background: #f2f2f2;">
        <tr>
          <th>Ziua</th>
          <th>Program inceput</th>
          <th>Program sfarsit</th>
          <th>Pauza start</th>
          <th>Pauza sfarsit</th>
        </tr>
      </thead>
      <tbody>
  `;

    scheduleArray.forEach(item => {
        html += `
      <tr>
        <td>${dayNames[item.day] || item.day}</td>
        <td>${item.work?.start || "-"}</td>
        <td>${item.work?.end || "-"}</td>
        <td>${item.break?.start || "-"}</td>
        <td>${item.break?.end || "-"}</td>
      </tr>
    `;
    });

    html += `
      </tbody>
    </table>
  `;

    return html;
}
