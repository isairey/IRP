<?php require_once "./chatbot.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chat Bot IA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-4">
    <h2>Chat Bot IA</h2>
    <div class="chat-contenedor border p-3 mb-3" style="height:300px; overflow-y:auto;"></div>

    <form id="chat-form">
        <div class="input-group">
            <input type="text" id="mensaje" class="form-control" placeholder="Escribe tu mensaje...">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>

    <script>
    $("#chat-form").submit(function(e) {
        e.preventDefault();
        let mensaje = $("#mensaje").val();
        if (!mensaje) return;

        $(".chat-contenedor").append('<div><strong>Tú:</strong> ' + mensaje + '</div>');
        $("#mensaje").val("");

        $.post("chatbot.php", { mensaje: mensaje }, function(data) {
            let res = JSON.parse(data);
            if (res.respuesta) {
                $(".chat-contenedor").append('<div><strong>IA:</strong> ' + res.respuesta + '</div>');
                $(".chat-contenedor").scrollTop($(".chat-contenedor")[0].scrollHeight);
            } else {
                alert("Error: " + res.error);
            }
        });
    });
    </script>
</body>
</html>
