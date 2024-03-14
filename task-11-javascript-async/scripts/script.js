let currentPage = 1; // Initial page
const usersPerPage = 4; // Number of users per page

async function getUsers(page) {
    const response = await fetch(`https://gorest.co.in/public/v2/users?page=${page}`);
    const data = await response.json();
    console.log("Response from API:", data);
    return data;
}

function displayUsers(users) {
    const userListContainer = document.getElementById('userList');
    userListContainer.innerHTML = '';

    // Check if users array is not empty and not undefined
    if (users && users.length > 0) {
        // Calculate the starting index and ending index for the current page
        const startIndex = (currentPage - 1) * usersPerPage;
        const endIndex = startIndex + usersPerPage;

        // Extract users for the current page
        const usersForCurrentPage = users.slice(startIndex, endIndex);

        // Loop through and display the users for the current page
        usersForCurrentPage.forEach(user => {
            const userDiv = document.createElement('div');
            userDiv.classList.add('displayuser');

            const nameParagraph = document.createElement('p');
            nameParagraph.textContent = user.name;
            userDiv.appendChild(nameParagraph);

            // Create an SVG eye icon element
            // Create an SVG eye icon element
            const eyeIcon = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            eyeIcon.setAttribute("class", "eye-icon");
            eyeIcon.setAttribute("xmlns", "http://www.w3.org/2000/svg");
            eyeIcon.setAttribute("width", "20");
            eyeIcon.setAttribute("height", "20");
            eyeIcon.setAttribute("viewBox", "0 0 16 16");


            // Create the first path element for the eye icon
            const path1 = document.createElementNS("http://www.w3.org/2000/svg", "path");
            path1.setAttribute("d", "M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0");
            path1.setAttribute("fill", "blue"); // Set fill color to blue

            // Create the second path element for the eye icon
            const path2 = document.createElementNS("http://www.w3.org/2000/svg", "path");
            path2.setAttribute("d", "M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7");
            path2.setAttribute("fill", "blue"); // Set fill color to blue

            // Append the path elements to the eye icon
            eyeIcon.appendChild(path1);
            eyeIcon.appendChild(path2);

            // Attach a click event to the eye icon to show user details
            eyeIcon.addEventListener("click", function () {
                showDetails(user.id);
            });

            // Append the eye icon to the userDiv
            userDiv.appendChild(eyeIcon);


            userListContainer.appendChild(userDiv);
        });
    } else {
        userListContainer.innerHTML = '<p>No users found.</p>';
    }
}



async function showDetails(userId) {
    const response = await fetch(`https://gorest.co.in/public/v2/users/${userId}`);
    const user = await response.json();
    const userDetailsModalLabel = document.getElementById('userDetailsModalLabel');
    const userDetailsBody = document.getElementById('userDetailsBody');
    userDetailsModalLabel.textContent = 'User Details: ' + user.name;
    userDetailsBody.innerHTML = `
        <p><strong>ID:</strong> ${user.id}</p>
        <p><strong>Name:</strong> ${user.name}</p>
        <p><strong>Email:</strong> ${user.email}</p>
        <p><strong>Gender:</strong> ${user.gender}</p>
        <p><strong>Status:</strong> ${user.status}</p>
    `;
    const userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
    userDetailsModal.show();
}

window.onload = async function () {
    const usersData = await getUsers(currentPage);
    console.log("Users data:", usersData);
    displayUsers(usersData); // Pass usersData.data instead of usersData
};


async function goToPage(page) {
    currentPage = page;
    const usersData = await getUsers(currentPage);
    displayUsers(usersData.data);
}

document.getElementById('prevPage').addEventListener('click', async function () {
    if (currentPage > 1) {
        const prevPage = currentPage - 1;
        const usersData = await getUsers(prevPage);
        if (usersData && usersData.length > 0) {
            currentPage = prevPage;
            displayUsers(usersData);
        } else {
            console.log("No users found for the previous page.");
            // Optionally, you can display a message or take other actions here.
        }
    } else {
        console.log("Already on the first page.");
        // Optionally, you can display a message or take other actions here.
    }
});
document.getElementById('nextPage').addEventListener('click', async function () {
    const nextPage = currentPage + 1;
    const usersData = await getUsers(nextPage);
    if (usersData && usersData.length > 0) {
        currentPage = nextPage;
        displayUsers(usersData);
    } else {
        console.log("No users found for the next page.");
        // Optionally, you can display a message or take other actions here.
    }
});

