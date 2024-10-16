


// delete sweetalert
function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Data Yang Dihapus Tidak Dapat Dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Find the form with the corresponding ID and submit it
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }


