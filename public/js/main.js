document.addEventListener('DOMContentLoaded', function () {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });

    const deleteForms = document.querySelectorAll('form[method="POST"] button.btn-delete');
    deleteForms.forEach(button => {
        button.style.background = 'none';
        button.style.border = 'none';
        button.style.cursor = 'pointer';
    });
});
