document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.getElementById('table-body');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const pageButtons = document.querySelectorAll('.page-btn');

    let currentPage = 1;
    const usersPerPage = 4;
    let usersData = [];

    function fetchData(page) {
        fetch(`https://gorest.co.in/public/v2/users?page=${page}&limit=${usersPerPage}`)
            .then(response => response.json())
            .then(data => {
                usersData = data;
                populateTable();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function populateTable() {
        tableBody.innerHTML = ''; // Clear previous data
        const startIndex = (currentPage - 1) * usersPerPage;
        const endIndex = startIndex + usersPerPage;
        const usersToDisplay = usersData.slice(startIndex, endIndex);

        usersToDisplay.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>
                <button class="more-btn btn btn-primary" data-index="${startIndex + index}">Details</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    }

    function showDetails(index) {
        const user = usersData[index];
        const modalBody = document.getElementById('modal-body');
        modalBody.innerHTML = `
            <p><strong>ID:</strong> ${user.id}</p>
            <p><strong>Name:</strong> ${user.name}</p>
            <p><strong>Email:</strong> ${user.email}</p>
            <p><strong>Gender:</strong> ${user.gender}</p>
            <p><strong>Status:</strong> ${user.status}</p>
        `;
        $('#exampleModal').modal('show');
    }

    function updatePaginationButtons() {
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === 3; // Assuming we have only 3 pages

        pageButtons.forEach(button => {
            const pageNumber = parseInt(button.textContent);
            button.disabled = pageNumber === currentPage;
        });
    }

    prevButton.addEventListener('click', () => {
        currentPage--;
        fetchData(currentPage);
        updatePaginationButtons();
    });

    nextButton.addEventListener('click', () => {
        currentPage++;
        fetchData(currentPage);
        updatePaginationButtons();
    });

    pageButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentPage = parseInt(button.textContent);
            fetchData(currentPage);
            updatePaginationButtons();
        });
    });

    tableBody.addEventListener('click', (event) => {
        if (event.target.classList.contains('more-btn')) {
            const index = parseInt(event.target.getAttribute('data-index'));
            showDetails(index);
        }
    });

    // Initial fetch for the first page
    fetchData(currentPage);
    updatePaginationButtons();
});