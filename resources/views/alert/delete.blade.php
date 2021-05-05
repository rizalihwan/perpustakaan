<script>
    // delete based id
    function deleteAlert(id, title) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: title,
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`Delete${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
            })
        }

        //delete all class confirmation
        function deleteAllClass(title) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Apa anda yakin ingin menghapus semua kelas?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete All!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: title,
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`Delete`).submit();
                            Swal.showLoading();
                        }
                    });
                }
            })
        }
</script>