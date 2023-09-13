document.addEventListener("DOMContentLoaded", function() {
    const employeeContainers = document.querySelectorAll(".employee-container");

    employeeContainers.forEach(employeeContainer => {
        const editButton = employeeContainer.querySelector(".edit-button");
        const saveButton = employeeContainer.querySelector(".save-button");
        const deleteButton = employeeContainer.querySelector(".delete-button");
        const firstNameElement = employeeContainer.querySelector(".employee-firstName .edit-mode");
        const lastNameElement = employeeContainer.querySelector(".employee-lastName .edit-mode");
        const emailElement = employeeContainer.querySelector(".employee-email .edit-mode");
        const firstNameInput = employeeContainer.querySelector(".editInput#editFirstName");
        const lastNameInput = employeeContainer.querySelector(".editInput#editLastName");
        const emailInput = employeeContainer.querySelector(".editInput#editEmail");
        const userId = employeeContainer.dataset.userId;
        
        editButton.addEventListener("click", function() {
            // Activer le mode d'édition
            firstNameInput.value = firstNameElement.textContent;
            lastNameInput.value = lastNameElement.textContent;
            emailInput.value = emailElement.textContent;

            firstNameElement.style.display = "none";
            lastNameElement.style.display = "none";
            emailElement.style.display = "none";

            firstNameInput.style.display = "inline-block";
            lastNameInput.style.display = "inline-block";
            emailInput.style.display = "inline-block";

            editButton.style.display = "none";
            saveButton.style.display = "inline-block";
        });

        saveButton.addEventListener("click", function() {
            fetch(`/update-user/${userId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    firstName: newFirstName,
                    lastName: newLastName,
                    email: newEmail,
                })
            })
            .then(function (response) {
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    firstNameElement.textContent = newFirstName;
                    lastNameElement.textContent = newLastName;
                    emailElement.textContent = newEmail;

                    firstNameElement.style.display = "inline-block";
                    lastNameElement.style.display = "inline-block";
                    emailElement.style.display = "inline-block";

                    firstNameInput.style.display = "none";
                    lastNameInput.style.display = "none";
                    emailInput.style.display = "none";

                    // Afficher le bouton "Modifier" à nouveau
                    editButton.style.display = "inline-block";
                    // Cacher le bouton "Valider"
                    saveButton.style.display = "none";
                    employeeContainer.classList.remove("editing");
                } else {
                    console.error("Erreur lors de la mise à jour de l'employé dans la base de données");
                }
            });
        });

        deleteButton.addEventListener("click", function() {
            fetch(`/delete-user/${userId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const containerToDelete = deleteButton.closest(".employee-container");
                    if (containerToDelete) {
                        containerToDelete.remove();
                    }
                } else {
                    console.error("Erreur lors de la suppression de l'employé de la base de données");
                }
            });
        });
    });password
});
