document.addEventListener("DOMContentLoaded", function() {
    const serviceContainers = document.querySelectorAll(".service-container");

    serviceContainers.forEach(serviceContainer => {
        const editButton = serviceContainer.querySelector(".edit-button");
        const saveButton = serviceContainer.querySelector(".save-button");
        const deleteButton = serviceContainer.querySelector(".delete-button");
        const titleElement = serviceContainer.querySelector(".service-title");
        const descriptionElement = serviceContainer.querySelector(".service-text");
        const titleInput = serviceContainer.querySelector(".editInput#editTitle");
        const descriptionInput = serviceContainer.querySelector(".editInput#editDescription");
        const repairId = serviceContainer.dataset.repairId;

        editButton.addEventListener("click", function() {
            serviceContainer.classList.add("editing");
            titleInput.value = titleElement.textContent;

            const descriptionText = descriptionElement.innerHTML.replace(/<br\s*\/?>/g, '\n');
            descriptionInput.value = descriptionText;

            titleElement.style.display = "none";
            descriptionElement.style.display = "none";
            titleInput.style.display = "inline-block";
            descriptionInput.style.display = "inline-block";
            editButton.style.display = "none";
            saveButton.style.display = "inline-block";
        });

        saveButton.addEventListener("click", function() {
            const newTitle = titleInput.value;
            const newDescription = descriptionInput.value;

            const formattedDescription = newDescription.replace(/\r\n/g, '\n').replace(/\r/g, '\n');
            const formattedTitle = newTitle.replace(/\r\n/g, '\n').replace(/\r/g, '\n');

            fetch(`/update-repair/${repairId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ title: formattedTitle, description: formattedDescription })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    titleElement.innerHTML = newTitle;
                    descriptionElement.innerHTML = newDescription.replace(/\n/g, '<br>');
                    titleElement.style.display = "block";
                    descriptionElement.style.display = "block";
                    titleInput.style.display = "none";
                    descriptionInput.style.display = "none";
                    editButton.style.display = "inline-block";
                    saveButton.style.display = "none";
                    serviceContainer.classList.remove("editing");
                } else {
                    console.error("Erreur de mise à jour du service dans la base de données");
                }
            });
        });

        deleteButton.addEventListener("click", function() {
            fetch(`/delete-repair/${repairId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const containerToDelete = deleteButton.closest(".service-container");
                    if (containerToDelete) {
                        containerToDelete.remove();
                    }
                } else {
                    console.error("Erreur de suppression du service en base de données");
                }
            });
        });        
    });
});
