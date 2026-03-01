document.addEventListener("DOMContentLoaded", function () {

    // Confirm delete
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            if (!confirm("Da li ste sigurni da želite obrisati korisnika?")) {
                e.preventDefault();
            }
        });
    });

    // Live search
    const searchInput = document.getElementById("searchInput");

    if (searchInput) {
        searchInput.addEventListener("keyup", function () {

            const filter = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll("#userTable tbody tr");

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });

        });
    }

});