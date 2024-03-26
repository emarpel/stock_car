<script>
    function getAudit() {
        $.ajax({
            url: "api/getAudit.php",
            type: "POST",
            dataType: "json"
        }).done(function(resposta) {
            var tbody = $("#tableAudit tbody");
            tbody.empty();
            resposta.forEach(function(audit) {
                var row = "<tr>" +
                            "<td style=\"text-align: center;\">" + audit.auditUserId + "</td>" +
                            "<td style=\"text-align: center;\">" + audit.auditDate + "</td>" +
                            "<td style=\"text-align: center;\">" + audit.auditHour + "</td>" +
                            "<td style=\"text-align: center;\">" + audit.auditPage + "</td>" +
                            "<td style=\"text-align: center;\">" + audit.auditTypeAction + "</td>" +
                            "<td style=\"text-align: center;\">" + audit.auditAction + "</td>" +
                            "</tr>";
                tbody.append(row);
            });
        }).fail(function(jqXHR, textStatus) {
            //console.log("Request failed: " + textStatus);
        }).always(function(data) {
            //console.log(data);
        });
    }
</script>