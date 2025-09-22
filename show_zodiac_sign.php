<?php include __DIR__ . "/layouts/header.php"; ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $timestamp = strtotime($data);
    $dia = date("d", $timestamp);
    $mes = date("m", $timestamp);

    // Carregar XML
    $signos = simplexml_load_file("signos.xml") or die("Erro ao carregar XML.");

    $signoEncontrado = null;

    foreach ($signos->signo as $signo) {
        list($diaInicio, $mesInicio) = explode("-", $signo->inicio);
        list($diaFim, $mesFim) = explode("-", $signo->fim);

        // Ajuste para signos que cruzam o ano (Capricórnio, Aquário, Peixes)
        if ($mesInicio > $mesFim) { 
            if (($mes == $mesInicio && $dia >= $diaInicio) || 
                ($mes == $mesFim && $dia <= $diaFim) ||
                ($mes > $mesInicio || $mes < $mesFim)) {
                $signoEncontrado = $signo;
                break;
            }
        } else {
            if (($mes == $mesInicio && $dia >= $diaInicio) || 
                ($mes == $mesFim && $dia <= $diaFim) ||
                ($mes > $mesInicio && $mes < $mesFim)) {
                $signoEncontrado = $signo;
                break;
            }
        }
    }

    if ($signoEncontrado) {
        echo "<div class='card p-4 shadow-lg text-center'>";
        echo "<h2>Seu signo é: <strong>{$signoEncontrado->nome}</strong></h2>";
        
        // Exibir o símbolo zodiacal (emoji)
        if (!empty($signoEncontrado->imagem)) {
            echo "<div class='emoji-signo'>{$signoEncontrado->imagem}</div>";

        }

        echo "<p class='mt-3'>{$signoEncontrado->descricao}</p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Não foi possível determinar o signo.</div>";
    }
}
?>

</div> <!-- fechamento container -->
</body>
</html>
