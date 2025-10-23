function notify(message) {
    const toastEl = document.getElementById('liveToast');

    $(toastEl).find('.toast-body').text(message || 'This is a Bootstrap 5 notification')

    const toast = new bootstrap.Toast(toastEl, {
        autohide: true,
        delay: 1800
    });

    toast.show();
}
