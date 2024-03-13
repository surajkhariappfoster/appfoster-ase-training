
async function getUsers() {
    try {
        const response = await fetch('https://gorest.co.in/public/v2/users');
        console.log('Response status:', response.status);
        if (!response.ok) {
            throw new Error('Failed to fetch users: ' + response.status);
        }
        const data = await response.json();
        console.log('Response data:', data);
        return data || [];
    } catch (error) {
        console.error('Error fetching users:', error);
        return [];
    }
}

function displayUser(user) {
    const userInfo = `
        <p><strong>Email:</strong> ${user.email}</p>
        <p><strong>Gender:</strong> ${user.gender}</p>
        <p><strong>ID:</strong> ${user.id}</p>
        <p><strong>Status:</strong> ${user.status}</p>
    `;
    return userInfo;
}

function displayUsers(users) {
    console.log('Users:', users); // Log users array
    const userListContainer = document.getElementById('userList');
    userListContainer.innerHTML = '';

    if (users.length === 0) {
        console.log('No users found.');
        userListContainer.textContent = 'No users found.';
        return;
    }

    

    users.forEach(user => {
        console.log('Displaying user:', user); // Log individual user
        const userDiv = document.createElement('div');
        userDiv.innerHTML = `
            <div class="displayuser" >
                    <div class="username">
                    <p>${user.name}</p>
                    </div>
                    <div class="eye">
                        <svg onclick="showDetails('${user.id}')" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                         <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                         <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                         </svg>
                    </div>
                </div>
                <hr>
        `;
        userListContainer.appendChild(userDiv);
    });
    updatePagination();
}


async function showDetails(userId) {
    try {
        const response = await fetch(`https://gorest.co.in/public/v2/users/${userId}`);
        if (!response.ok) {
            throw new Error('Failed to fetch user details: ' + response.status);
        }
        const user = await response.json();
        console.log('User details response:', user);
        if (!user || !user.name) {
            throw new Error('Invalid user data received');
        }
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
        // Show the modal
        const userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
        userDetailsModal.show();
    } catch (error) {
        console.error('Error fetching user details:', error);
    }
}



// Fetch and display user data when the page loads
window.onload = async function () {
    try {
        const users = await getUsers();
        displayUsers(users);
    } catch (error) {
        console.error('Error fetching user data:', error);
    }
};
