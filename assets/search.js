
function filterUsers() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const userRows = document.querySelectorAll('#userTable tr');

    userRows.forEach(row => {
        const email = row.getAttribute('data-email').toLowerCase();
        if (email.includes(searchInput)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    if (searchInput) {
        searchInput.addEventListener('keyup', filterUsers);
    }
});
