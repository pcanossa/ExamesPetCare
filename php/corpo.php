<style type="text/css">
    .stat {
        padding: 3px;
        border-radius: 3px;
    }

    form {
            font-family: 'Nunito', sans-serif;
        }

</style>

<?php
if (isset($_GET['pesquisa']) != 'sim') {
        session_start();
        $host="localhost";
        $user="root";
        $password="root";
        $dbname="examespetcare";
        $con = new mysqli($host, $user, $password, $dbname)
                                or die ('Could not connect to the database server' . mysqli_connect_error());
                        mysqli_query($con, "SET NAMES 'utf8'");
                        mysqli_query($con,'SET character_set_connection=utf8');
                        mysqli_query($con,'SET character_set_client=utf8');
                        mysqli_query($con,'SET character_set_results=utf8');   

        $select="SELECT animal, tutor, especie, exame, qtdade, realizador, datareal, estatus, cod FROM exames where estatus='Em Realização'";
        $query=mysqli_query($con, $select);
        echo "<div class='cabcorpo'><h3>Exames Aguardando Execução</h3></div>";
        echo "<div class='container cabexecut'><p>Animal</p><p>Tutor</p><p>Data de Solicitação</p><p>Exame </p><p>Realizador</p></div><br>";
        while ($result=mysqli_fetch_array($query)) {
                $animal=$result['animal'];
                $tutor=$result['tutor'];
                $especie=$result['especie'];
                $exame=$result['exame'];
                $qtdade=$result['qtdade'];
                $realizador=$result['realizador'];
                $datareal=$result['datareal'];
                $estatus=$result['estatus'];
                $cod=$result['cod'];
                $dataexplode=explode('-',$datareal);
                $ano=$dataexplode[0];
                $mes=$dataexplode[1];
                $dia=$dataexplode[2];
                $link="recebeDados.php?cod=$cod";
                $windowOpen="abrir($link);";
                

        echo "<form method='post' class='emexecut'><a href='php/recebeDados.php?cod=$cod'><p>$animal</p><p>$tutor</p><p>$dia/$mes/$ano</p><p>$exame</p><p>$realizador</p></a></form><br>";
        
                        
        }
} else { 
        session_start();
        echo "<div class='container busca'>
<form method='post'>
<input type='text' name='animal' id='animal' placeholder='animal'>
<input type='text' name='tutor' id='tutor' placeholder='tutor'>
Data de Realização: <input type='date' name='datareal' id='database' placeholder='data de realização'>
<input type='text' name='exame' id='exame' placeholder='exame'>
Situação: <select name='estatus' id='estatus'>
<option disable selected value></option>
<option value='Finalizado'>Finalizado</option>
<option value='Em Realização'>Em Realização</option>
</select>
<div class='botaoPesquisa'>
<button class='pesqbt' type='submit' name='pesquisar' id='pesquisar'><i class='fa-solid fa-magnifying-glass'></i> Pesquisar</button>
</div>
</form>
</div>";


if (isset($_POST['pesquisar'])) {

    $tam=sizeof($_POST);
    $keys=array_keys($_POST);
    $results=array();
    $validador=false;

for ($i=0; $i<$tam; $i++){
    $indice=$keys[$i];
    if ($_POST[$indice]!=""){
        array_push($results,array(
        "indice"=> $keys[$i],
        "valor"=> $_POST[$indice],
        ));
        $validador=true;

    }

}
if ($validador=='true') {
    $from="";
    $where="";

    $numeroPesquisa=sizeof($results);
    for ($i=0; $i<$numeroPesquisa   ; $i++) {
        $indice=$results[$i]['indice'];
        $valor=$results[$i]['valor'];
        if ($numeroPesquisa==1) {
            $busca="$indice LIKE '%$valor%'";
            } elseif ($i<($numeroPesquisa-1)) { 
                $busca=" $indice LIKE '%$valor%' AND";
                } else {
                    $busca=" $indice LIKE '%$valor%'"; 
                }    
        $where=$where.$busca;

    }
    $host="localhost";
    $user="root";
    $password="root";
    $dbname="examespetcare"; 
    $con = new mysqli($host, $user, $password, $dbname)
            or die ('Could not connect to the database server' . mysqli_connect_error());
        mysqli_query($con, "SET NAMES 'utf8'");
        mysqli_query($con,'SET character_set_connection=utf8');
        mysqli_query($con,'SET character_set_client=utf8');
        mysqli_query($con,'SET character_set_results=utf8');  
        
    $select="SELECT cod, animal, tutor, especie, idade, exame, qtdade, realizador, datareal, estatus FROM exames WHERE $where";
    $query=mysqli_query($con,$select);
    $rows=mysqli_num_rows($query);
    $count=0;

    if ($rows>0) {
        while ($result = mysqli_fetch_array($query)){
            $animal=$result['animal'];
            $tutor=$result['tutor'];
            $especie=$result['especie'];
            $exame=$result['exame'];
            $qtdade=$result['qtdade'];
            $realizador=$result['realizador'];
            $datareal=$result['datareal'];
            $estatus=$result['estatus'];
            $cod=$result['cod'];
            $dataexplode=explode('-',$datareal);
            $ano=$dataexplode[0];
            $mes=$dataexplode[1];
            $dia=$dataexplode[2];
            
            echo "<form  class='emexecut' method='post'><a href='php/recebeDados.php?cod=$cod' class='container resultpesq'><p>$dia/$mes/$ano</p><p>$animal</p><p>$tutor</p><p>$exame</p><p>$realizador</p><p class='estat' id='str$count'>$estatus</p></a></form><br>";
            $count++;
        }

        echo "<script>
            var tamanho=$rows;
            console.log(tamanho);
            </script>
            <script src=\"/ExamesPetCare/javascript/estatusbusca.js\";>
            </script>";      
    } else {
        echo "Nenhum resultado encontrado";
    }
    }        
    }
}
session_destroy();

?>