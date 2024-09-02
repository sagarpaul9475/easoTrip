var full_name = localStorage.getItem('full_name')


if (full_name) {
    document.getElementById('auth-links').innerHTML = '';
    document.getElementById('auth-links2').innerHTML = '';
    document.getElementById('indiviual-name').innerHTML = full_name;
}
else {
    document.getElementById('user-profile').innerHTML = '';
}
function log_out(){
    // Clear all data from localStorage
    localStorage.clear();

    // Refresh the current page
    window.location.reload();
}