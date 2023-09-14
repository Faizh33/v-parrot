document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".button-container #delete-button");

    deleteButtons.forEach(function (deleteButton) {
        deleteButton.addEventListener("click", function () {
            const carContainer = deleteButton.closest(".used-car-container");
            const carId = carContainer.dataset.carId;

            fetch(`/delete-car/${carId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    carContainer.remove();
                }
            });
        });
    });
});