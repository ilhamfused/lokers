document.getElementById("deleteJobsButton").addEventListener("click", (e) => {
    const form = e.target.form;
    e.preventDefault();
    Swal.fire({
        title: "Delete this Job?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete Job!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Deleted!", "Job Post has been deleted.", "success");
            form.submit();
        }
    });
});
