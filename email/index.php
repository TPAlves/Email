<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="Enviar.php" method="post" enctype="multipart/form-data">
        <fieldset>

            <legend> <span>🪧</span>Email<span>🪧</span></legend>
            <input type="email" placeholder="Destinatário" name="destino" required>
            <input type="text" placeholder="Assunto" name="assunto" required>
            <textarea name="conteudo" cols="30" rows="10" placeholder="Digite o conteúdo" required></textarea>
            <input type="file" name="arquivo" class="arq">
            <button type="submit">Enviar</button>
        </fieldset>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php

    $status = "";
    if (isset($_GET['status'])) {
        echo "
        <script>
          Swal.fire({
            title: 'E-mail enviado!!',
            confirmButtonColor: 'rgb(85, 128, 205)'
          })
        </script>
        ";
    }

    ?>


</body>

</html>