<script src="https://kit.fontawesome.com/707f1f01cc.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@200;300;400&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">    
<style>

body {
            font-family: 'Nunito', sans-serif;
        }

.final {
        background-color: bisque;
        border-radius: 5px;
        padding: 10px;
        }

.final button {
    margin: 10px 15px 10px 0px;
    padding: 5px;
    cursor: pointer;
    border-radius: 4px;
    }

.finalizar {
    background-color: rgb(168, 216, 167);
    border-color: rgb(2, 119, 0);
    border: 2px;
}

.deletarex {
    background-color: rgb(216, 167, 167);
    border: 2px;
}

.estatus {
    display: flex;
    flex-direction: row;
    margin-top: 10px;
    align-items: center;
}

.str {
    padding: 3px;
    margin-left: 3px;
    border-radius: 3px;
}

hr{
    
}

</style>    

<?php
session_start();
if (isset($_GET['cod'])==true && isset($_SESSION['verifica'])==false){
    $ident=$_GET['cod'];
    $_SESSION['cod']=$ident;
} 
?>
<?php
if (isset($_SESSION['verifica'])==false) {
$cod=$_SESSION['cod'];
$host="localhost";  
$user="root";
$password="root";
$dbname="examespetcare";
$data=date("Y-m-d"); 
$con = new mysqli($host, $user, $password, $dbname)
                            or die ('Could not connect to the database server' . mysqli_connect_error());
                    mysqli_query($con, "SET NAMES 'utf8'");
                    mysqli_query($con,'SET character_set_connection=utf8');
                    mysqli_query($con,'SET character_set_client=utf8');
                    mysqli_query($con,'SET character_set_results=utf8');   
$select="SELECT animal, tutor, especie, idade, exame, qtdade, realizador, datareal, estatus FROM exames WHERE cod=$cod";
$busca=mysqli_query($con, $select);

while ($row=mysqli_fetch_array($busca)) {
    $animal=$row['animal'];
    $tutor=$row['tutor'];
    $especie=$row['especie'];
    $idade=$row['idade'];
    $exame=$row['exame'];
    $qtdade=$row['qtdade'];
    $realizador=$row['realizador'];
    $datareal=$row['datareal'];
    $estatus=$row['estatus'];
    $idadeRow=explode(".",$idade);
    $mesesRow=$idadeRow[1];
    $meses=substr($mesesRow,0,1);
    echo "<div class='container identificacaoExame'>
    <div class='container indentUm'><h3>Identificação</h3><p><b>$animal</b></p><p>Tutor: $tutor</p><p>Espécie: $especie</p><p>Idade: $idadeRow[0] ano(s) e $meses meses(s)</p></div>
    <hr>
    <div class='container identDois'><P>Exame Solicitado: $exame</p><p>Data de Solicitação: $datareal</p><p>Quantidade: $qtdade</p><p>Realizador: $realizador</p><div class='estatus'><p>Situação: <p class='str' id='str'>$estatus</p></p></div></div>";
}

                
echo "<div class='container final'><form method='post' receDados>";


echo "Responsável: <select class='form-control' name='responsavel' id='reponsavel' required>
        <option disable selected value></option>
        <option value='Clarissa'>Clarissa</option>
        <option value='José Augusto'>José Augusto</option>
        <option value='Ellen'>Ellen</option>
        <option value='Renata'>Renata</option>
        <option value='Larissa'>Larissa</option>
        <option value='Emily'>Emily</option>
        <option value='Daniela'>Daniela</option>
        <option value='Patrícia'>Patrícia</option>
        </select><br>";
echo "<div class='btns'><button type='submit' class='finalizar' value='pronto' name='pronto'><i class='fa-solid fa-circle-check'> Marcar como Finalizado</i></button>";
echo "<button class='deletarex' value='deletarex' name='deletarex'><i class='fa-solid fa-trash-can'> Deletar Exame</i></button></div>";  
echo "<a href='/ExamesPetCare/index.php'><i class='fa-solid fa-left-long'>Voltar</i></a>";      
echo "</form></div>";
echo "<script src=\"/ExamesPetCare/javascript/status.js\"></script>";

if (isset($_POST['deletarex'])==true) {
    $select="DELETE FROM exames WHERE cod=$cod";
    $query=mysqli_query($con, $select);
    if ($query) {
        echo "Exame deletado com sucesso!";
        $_SESSION['verifica']='ok';
        header("refresh: 0.5");
    }
}

if (isset($_POST['pronto'])==true) {
    $responsavel=$_POST['responsavel'];
    $selectDois="UPDATE exames SET estatus='Finalizado', realizadoem='$data', responsavel='$responsavel' WHERE cod=$cod;";
    $queryDois=mysqli_query($con, $selectDois);
    if ($queryDois) {
        echo "Status de exame atualizado com sucesso!";
        $_SESSION['verifica']='ok';
        header("refresh: 0.5");
    }

}
} else {
    echo "<a href='/ExamesPetCare/index.php'><i class='fa-solid fa-left-long'>Voltar</i></a>";      
}

?>