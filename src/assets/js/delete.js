document.addEventListener('DOMContentLoaded', () => {
    const deleteLinks = document.querySelectorAll('a[data-action="delete"]');

    deleteLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();

            const deleteUrl = link.getAttribute('href');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    });
});