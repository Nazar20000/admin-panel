$(document).ready(function() {
    function loadUsers() {
        $.ajax({
            url: 'users.php?action=read',
            method: 'GET',
            success: function(response) {
                let users = JSON.parse(response);
                let html = '';
                users.forEach(function(user) {
                    html += `<tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.created_at}</td>
                        <td><button class="delete-btn" data-id="${user.id}">Удалить</button></td>
                    </tr>`;
                });
                $('#userTable tbody').html(html);
            }
        });
    }

    loadUsers();

    $('#createUserForm').on('submit', function(e) {
        e.preventDefault();
        let data = $(this).serialize() + '&action=create';
        $.post('users.php', data, function(response) {
            let res = JSON.parse(response);
            if (res.status === 'success') {
                loadUsers();
                $('#createUserForm')[0].reset();
            }
        });
    });

    $(document).on('click', '.delete-btn', function() {
        let id = $(this).data('id');
        $.post('users.php', { id: id, action: 'delete' }, function(response) {
            let res = JSON.parse(response);
            if (res.status === 'success') {
                loadUsers();
            }
        });
    });
});