<script>
    function getUsersActive() {
        $.ajax({
            url: "api/getUsers.php",
            type: "POST",
            data: {type: 'active'},
            dataType: "json"
        }).done(function(resposta) {
            console.log(resposta);
            var tbody = $("#tableUsersActive tbody");
            tbody.empty();
            resposta.forEach(function(user) {
                var row = "<tr>" +
                            "<td style=\"text-align: center;\">" + user.userId + "</td>" +
                            "<td style=\"text-align: left;\">" + user.userName + "</td>" +
                            "<td style=\"text-align: center;\">" + user.userCellphone + "</td>" +
                            "<td style=\"text-align: center;\">" + user.userMail + "</td>" +
                            "<td style=\"text-align: center;\">" + getPermission(user.userPermission) + "</td>" +
                            "<td style=\"text-align: center;\">" + (user.userStatus == 1 ?
                                "<button class=\"badge bg-info\" style=\"font-size: 1em; border: none;\" title=\"Editar Usuário\" onclick=\"openModalEdit(" + user.userId + ");\"><i class=\"fa-solid fa-pencil\"></i></button>&nbsp;&nbsp;<button class=\"badge bg-danger\" style=\"font-size: 1em; border: none;\" onclick=\"if(confirm('Deseja Realmente Desativar o Usuário?')) { statusUser(" + user.userId + ", " + user.userStatus + "); }\" title=\"Inativar Usuário\"><i class=\"fa-solid fa-power-off\"></i></button>" :
                                "<button class=\"badge bg-info\" style=\"font-size: 1em; border: none; opacity: 0.6; cursor: not-allowed; pointer-events: none;\" title=\"Editar Usuário\" onclick=\"openModalEdit(" + user.userId + ");\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>&nbsp;&nbsp;<button class=\"badge bg-success\" style=\"font-size: 1em; border: none;\" onclick=\"if(confirm('Deseja Realmente Reativar o Usuário?')) { statusUser(" + user.userId + ", " + user.userStatus + "); }\" title=\"Reativar Usuário\"><i class=\"fa-solid fa-power-off\"></i></button>") +
                            "</td>" +
                            "</tr>";
                tbody.append(row);
            });
        }).fail(function(jqXHR, textStatus) {
            //console.log("Request failed: " + textStatus);
        }).always(function(data) {
            //console.log(data);
        });
    }

    function getUsersInactive() {
        $.ajax({
            url: "api/getUsers.php",
            type: "POST",
            data: {type: 'inactive'},
            dataType: "json"
        }).done(function(resposta) {
            console.log(resposta);
            var tbody = $("#tableUsersInactive tbody");
            tbody.empty();
            resposta.forEach(function(user) {
                var row = "<tr>" +
                            "<td style=\"text-align: center;\">" + user.userId + "</td>" +
                            "<td style=\"text-align: left;\">" + user.userName + "</td>" +
                            "<td style=\"text-align: center;\">" + user.userCellphone + "</td>" +
                            "<td style=\"text-align: center;\">" + user.userMail + "</td>" +
                            "<td style=\"text-align: center;\">" + getPermission(user.userPermission) + "</td>" +
                            "<td style=\"text-align: center;\">" + (user.userStatus == 1 ?
                                "<button class=\"badge bg-info\" style=\"font-size: 1em; border: none;\" title=\"Editar Usuário\" onclick=\"openModalEdit(" + user.userId + ");\"><i class=\"fa-solid fa-pencil\"></i></button>&nbsp;&nbsp;<button class=\"badge bg-danger\" style=\"font-size: 1em; border: none;\" onclick=\"if(confirm('Deseja Realmente Desativar o Usuário?')) { statusUser(" + user.userId + ", " + user.userStatus + "); }\" title=\"Inativar Usuário\"><i class=\"fa-solid fa-power-off\"></i></button>" :
                                "<button class=\"badge bg-info\" style=\"font-size: 1em; border: none; opacity: 0.6; cursor: not-allowed; pointer-events: none;\" title=\"Editar Usuário\" onclick=\"openModalEdit(" + user.userId + ");\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>&nbsp;&nbsp;<button class=\"badge bg-success\" style=\"font-size: 1em; border: none;\" onclick=\"if(confirm('Deseja Realmente Reativar o Usuário?')) { statusUser(" + user.userId + ", " + user.userStatus + "); }\" title=\"Reativar Usuário\"><i class=\"fa-solid fa-power-off\"></i></button>") +
                            "</td>" +
                            "</tr>";
                tbody.append(row);
            });
        }).fail(function(jqXHR, textStatus) {
            //console.log("Request failed: " + textStatus);
        }).always(function(data) {
            //console.log(data);
        });
    }

    function openModalEdit(userId) {
        $('#modalEditUser').modal('show');
        $.ajax({
            url: "api/getUsers.php",
            type: "POST",
            data: {userId: userId, type: 'unique'},
            dataType: "json"
        }).done(function(data) {
            console.log(data[0].userName);
            $('#editUserName').val(data[0].userName);
            $('#editUserCPF').val(data[0].userCPF);
            $('#editUserMail').val(data[0].userMail);
            $('#editUserCellphone').val(data[0].userCellphone);
            $('#editUserLogin').val(data[0].userLogin);
            $('#editUserPermission').val(data[0].userPermission);
        }).fail(function(jqXHR, textStatus) {
            //console.log("Request failed: " + textStatus);
        }).always(function(data) {
            //console.log(data);
        });
    }

    function getPermission(permission) {
        if (permission == 1) {
            return "<span class=\"badge bg-warning\" style=\"font-size: 1em;\">Vendedor</span>";
        } else if (permission == 5) {
            return "<span class=\"badge bg-purple\" style=\"font-size: 1em;\">Usuário</span>";
        } else if (permission == 10) {
            return "<span class=\"badge bg-success\" style=\"font-size: 1em;\">Financeiro</span>";
        } else if (permission == 15) {
            return "<span class=\"badge bg-navy\" style=\"font-size: 1em;\">Administrador</span>";
        } else if (permission == 20) {
            return "<span class=\"badge bg-orange\" style=\"font-size: 1em;\">Desenvolvedor</span>";
        }
    }

    function saveUser() {
        var formData = $('#formUsers').serializeArray();
        event.preventDefault();
        var allFieldsFilled = true;

        for (var i = 0; i < formData.length; i++) {
            if (formData[i].value.trim() === '') {
                allFieldsFilled = false;
                break;
            }
        }

        if (allFieldsFilled) {
            $.ajax({
                url: "api/insertUser.php",
                type: "POST",
                data: formData,
                dataType: "json"
            }).done(function(resposta) {
                getUsersActive();
                $("#modalNewUser").trigger("click");
                console.log(resposta);
            }).fail(function(jqXHR, textStatus) {
                //console.log("Request failed: " + textStatus);
            }).always(function(data) {
                //console.log(data);
            });
        } else {
            alert('⚠️Atenção\nTodos os campos são obrigatórios.');
        }
    }

    function statusUser(userId, userStatus) {
        $.ajax({
            url: "api/statusUser.php",
            type: "POST",
            data: {
                userId: userId,
                userStatus: userStatus
            },
            dataType: "json"
        }).done(function(resposta) {
            getUsersActive();
            getUsersInactive();
        }).fail(function(jqXHR, textStatus) {
            //console.log("Request failed: " + textStatus);
        }).always(function(data) {
            //console.log(data);
        });
    }
</script>