document.addEventListener('DOMContentLoaded', () => {
    const showAlertCreate = document.body.dataset.alertCreate === 'true';
    const showAlertUpdate = document.body.dataset.alertUpdate === 'true';
    const showAlertDelete = document.body.dataset.alertDelete === 'true';

    if (showAlertCreate) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Contact created successfully!",
            showConfirmButton: false,
            timer: 1500
          });
    }

    if (showAlertUpdate) {
        
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Contact updated successfully!",
            showConfirmButton: false,
            timer: 1500
          });
    }

    if (showAlertDelete) {
       
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Contact deleted successfully!",
            showConfirmButton: false,
            timer: 1500
          });
    }
});