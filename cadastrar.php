<?php include("senha.php") ?>
<?php
$obrigatorios = array();

function criaCampo($nome, $id, $obrigatorio) {
    global $obrigatorios;
    $val = "";
    if ($obrigatorio) {
        array_push($obrigatorios, $id);
    }
    if (isset($_POST[$id])) {
        $val = $_POST[$id];
    }
    echo "<tr><td>$nome: </td><td><input type='text' name='$id' id='$id' value='$val'></td></tr>";
}
?>
<form action="inserir.php" id="cad" method="post">
    <table>
        <?php
        criaCampo("Nome", "nome", false);
        criaCampo("Endereço", "endereco", true);
        criaCampo("Cidade", "cidade", false);
        criaCampo("Estado", "estado", true);
        criaCampo("País", "pais", false);
        criaCampo("E-mail", "email", true);
        criaCampo("CPF", "cpf", true);
        criaCampo("Setor", "setor", true);
        criaCampo("Profissão", "profissao", false);
        ?>
    </table>
    <input type="button" onclick="validar()" value="Cadastrar">
</form>

<script>
    var obrigatorios = <?php echo json_encode($obrigatorios) ?>;
    var validar = function () {
        var campos = "";
        for (i = 0; i < obrigatorios.length; i++) {
            if (document.getElementById(obrigatorios[i]).value == "") {
                campos = campos + " - " + obrigatorios[i] + "\n";
            }
        }
        if (campos.length != 0) {
            window.alert("Campos obrigatórios não preenchidos!\n" + campos);
            return false;
        }
        if (!TestaCPF(cpf.value)) {
            window.alert("CPF inválido!!!");
            return false;
        }
        cad.submit();
        return true;
    }
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000")
            return false;

        for (i = 1; i <= 9; i++)
            Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))
            Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)))
            return false;

        Soma = 0;
        for (i = 1; i <= 10; i++)
            Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))
            Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11)))
            return false;
        return true;
    }
</script>