<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@200;300;400&family=Raleway:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/707f1f01cc.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
    <style>
           .ident {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content:space-between;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }

        .ident {
            background-color: rgb(237, 197, 150);
            border-radius: 12px;
            padding: 10px;
        }

        .identificacao {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-items: center;
            width: fit-content;
            background-color: rgb(174, 173, 189);
            color:rgb(64, 63, 72);
            padding: 5px;
            font-weight: bold;
            border-radius: 3px;
        }

        .identificacao p{
            margin: 5px;
        }


        .identmajor {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .examescad {
            display: flex;
            flex-wrap: wrap;
        }

        .enviarbt {
            background-color: rgb(186, 224, 187);
            border: 0px;
            padding: 5px;
            border-radius: 3px;
            cursor: pointer;
        }

        .enviarbt:hover{
            background-color: rgb(2, 183, 17);
            transition: 0.5s;
            color: azure;
        }
        
        .deletarbt {
            background-color: rgb(196, 33, 33);
            border: 0px;
            padding: 6px;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 5px;
            color:azure;
        }

        .registrobt {
            border-radius: 3px;
            border: 1px rgb(121, 121, 121) solid;
            cursor: pointer;
        }

        .registrobt:hover{
            background-color: rgb(121, 121, 121);
            transition: 0.5s;
            color: azure;
        }
        <?php 
        if (isset($_POST['enviar'])==true) {
            echo ".enviar {
                visibility: hidden;
                }    ";
        }
        ?>
    </style>
<body>
<?php session_start(); ?> 
    <div class="container cabinclude">Nova Solicitação de Exame</div>
    <form class="formm" action="" method="post">
        <div class="container ident">
            <div class="itens item1">
                <input type="text" name="animal" id="animal" placeholder="Nome do Animal" required>
            </div>
            <div class="itens item2">
                <input type="text" name="tutor" id="tutor" placeholder="Tutor" required>
            </div>
            <div class="itens item3">
                <select name="especie" id="especie" class="especie">
                    <option value="canina">canina</option>
                    <option value="felina">felina</option>
                    <option value="ave">ave</option>
                    <option value="peixe">peixe</option>
                    <option value="mustelídeo">mustelídeo</option>
                    <option value="outra">outra</option>
                </select>
            </div>
            <div class="itens item4">
                <input type="number" name="idade" id="idade" placeholder="idade(anos)" type='range' min='0' max='100' step="any" required>
</div>   
            <button class='registrobt' type="submit" name='registroanimal' id='registroanimal' value='regitrado'><i class="fa-solid fa-paw"></i> Registrar Animal</button>
        </form>   
            <?php
            $_SESSION['enviar']=false;
            if (isset($_POST['registroanimal'])==true) {
                $animal=$_POST['animal'];
                $tutor=$_POST['tutor'];
                $especie=$_POST['especie'];
                $idade=$_POST['idade'];
                $registro=true;
                $_SESSION['registro']=$registro;
                $_SESSION['animal']=$animal;
                $_SESSION['tutor']=$tutor;
                $_SESSION['especie']=$especie;
                $_SESSION['idade']=$idade;
                $_SESSION['linha']=array();
                $_SESSION['registro']=isset($_POST['registroanimal']);
                $_SESSION['cito']=array();
            }
            ?>
            <?php
            
                if (isset($_SESSION['registro'])==false)   { 
                    echo "";
                } else {     
                    $animal=$_SESSION['animal'];
                    $tutor=$_SESSION['tutor'];
                echo "<form class='container cadexames' method='post'>
                <select name='exame' id='exame' class='exame' placeholder='exame' required>
                <option disable selected value></option>
                <option value='Hemograma'>Hemograma</option>
                <option value='Ureia'>Diferencial Hemograma</option>
                <option value='ALT'>ALT</option>
                <option value='AST'>AST</option>
                <option value='FA'>FA</option>
                <option value='Creatinina'>Creatinina</option>
                <option value='Ureia'>Ureia</option>
                <option value='PT e frações'>PT e frações</option>
                <option value='Triglicérides'>Triglicérides</option>
                <option value='Colesterol'>Colesterol</option>
                <option value='Bilirrubinas'>Bilirrubinas</option>
                <option value='Amilase'>Amilase</option>
                <option value='Lipase'>Lipase</option>
                <option value='Glicose'>Glicose</option>
                <option value='Fenobarbital'>Fenobarbital</option>
                <option value='UPC'>UPC</option>
                <option value='Urinálise'>Urinálise</option>
                <option value='Coproparasitológico'>Coproparasitológico</option>
                <option value='Histopatológico'>Histopatológico</option>
                <option value='Citologia'>Citologia</option>
                <option value='Raspado de pele'>Raspado de Pele</option>
                <option value='PCR Hemoparasitoses'>PCR Hemoparasitoses</option>
                <option value='PCR Cinomose'>PCR Cinomose</option>
                <option value='PCR FIV/ FeLV'>PCR FIV/ FeLV</option>
                <option value='PCR Leishmaniose'>PCR Leishmaniose</option>
                <option value='PCR Bactérias Intestinais'>PCR Bactérias Intestinais</option>
                <option value='PCR Clostridium botulinum'>PCR Clostridium botulinum</option>
                <option value='PCR Leptospirose'>PCR Leptospirose</option>
                <option value='PCR Brucelose'>PCR Brucelose</option>
                option value='Sorologia Hemoparasitoses'>Sorologia Hemoparasitoses</option>
                <option value='Sorologia Cinomose'>Sorologia Cinomose</option>
                <option value='Sorologia Leishmaniose'>Sorologia Leishmaniose</option>
                <option value='Sorologia Bactérias Intestinais'>Sorologia Bactérias Intestinais</option>
                <option value='Sorologia Clostridium botulinum'>Sorologia Clostridium botulinum</option>
                <option value='Sorologia Leptospirose'>Sorologia Leptospirose</option>
                <option value='Sorologia Brucelose'>Sorologia Brucelose</option>
                <option value='Teste Rápido FIV/ FeLV'>Teste Rápido FIV/ FeLV</option>
                <option value='Teste Rápido Cinomose'>Teste Rápido Cinomose</option>
                <option value='Teste Rápido 4dx'>Teste Rápido 4dx</option>
                <option value='Teste Rápido Leishmaniose'>Teste Rápido Leishmaniose</option>
                <option value='Teste Rápido Parvovirose'>Teste Rápido Parvovirose</option>
                <option value='Cultura com Antibiograma'>Cultura com Antibiograma</option>
                <option value='Análise de urólito'>Análise de urólito</option>
                <option value='Coagulograma'>Coagulograma</option>
                <option value='Toxicológico'>Toxicológico</option>
                <option value='Necrópsia'>Necrópsia</option>
                </select>";
                echo "<input type='number' name='qtdade' id='qtdade' type='range' min='0' max='100' required>";
                echo "<select name='realizador' id='realizador' class='realizador' required>
                <label for='realizador'>Realizador</label>
                <option value='Interno Idexx'>Interno Idexx</option>
                <option value='Interno Pato'>Interno Pato</option>
                <option value='Animalab'>Animalab</option>
                <option value='Unicep'>Unicep</option>
                <option value='Vetpat'>Vetpat</option>
                <option value='Tecsa'>Tecsa</option>
                <option value='Litolab'>Litolab</option>
                <option value='Outro'>Outro</option>
                </select>
                <button class='registrobt' type='submit' name='adicionarexame' id='adicionarexame' value='enviado'><i class='fa-solid fa-flask'></i> Adicionar Exame</button>
                </form>
                <form method='post' action=''>
                <button class='deletarbt' type='submit' name='deletar' id='deletar' value='deletar'><i class='fa-regular fa-trash-can'></i> Deletar Exames</button>
                </form>
                </div>
                <div class='identmajor'>
                <div class='container identificacao'>
                <p>Animal: $animal<p><br>
                <p>Tutor: $tutor<p>
                </div>
                </div>";  
                
            }    
            ?> 
            <?php
                if (isset($_POST['adicionarexame'])==true) {
                    $exame=$_POST['exame'];
                    $qtdade=$_POST['qtdade'];
                    $realizador=$_POST['realizador'];
                    $animal=$_SESSION['animal'];
                    $tutor=$_SESSION['tutor'];
                    $idade=$_SESSION['idade'];
                    $especie=$_SESSION['especie'];
                    $host="localhost";
                    $user="root";
                    $password="root";
                    $dbname="examespetcare"; 
                    $data=date("Y-m-d");  
                    $_SESSION['data']=$data;
                    $_SESSION['enviado']=$_POST['adicionarexame'];
                    $_SESSION['exame']=$_POST['exame'];
                    $_SESSION['realizador']=$_POST['realizador'];
                    $_SESSION['qtdade']=$_POST['qtdade'];
                    
                    
                            
                            $linha = array();
                            $linha=$_SESSION['linha'];
                            array_push($linha,array (
                                "Animal" => $animal,
                                "Tutor" => $tutor,
                                "Exame" => $exame,
                                "Quantidade" => $qtdade,
                                "Realizador" => $realizador,
                                "Idade" => $idade,
                                "Especie" => $especie,
                                "Datareal" => $data,
                            ));
                            
                            $_SESSION['linha'] = $linha;

                            echo "<script src=\"javascript/escondebotao.js\"></script>";
                           
                    if ($_SESSION['exame']=='Citologia') {
                        echo "<script src=\"javascript/escondedois.js\"></script>";
                        echo "<div class='container citologia'>";
                        for ($ct=0; $ct<$qtdade; $ct++) {     
                        echo "<div class='container cadcito'>
                        <form method='post'>
                        <select name='tipodecoleta$ct' required>Tipo de Coleta
                        <option value='PAAF'>PAAF</option>
                        <option value='Inprint'>Inprint</option>
                        <option value='Escarificação'>Escarificação</option>
                        <option value='Líquidos'>Líquidos</option>
                        </select>
                        <input type='text' name='local$ct' id='local' placeholder='local de coleta' required>
                        <input type='number' name='tamanho$ct' id='local' placeholder='tamanho (cm)' type='range' min='0' max='100' step='any' required>
                        <select name='aspecto$ct' required>aspecto
                        <option value='macio'>macio</option>
                        <option value='firme'>firme</option>
                        </select>
                        <select name='aderencia$ct' required>aderência
                        <option value='aderido'>aderido</option>
                        <option value='não aderido'>não aderido</option>
                        </select>
                        <select name='ulcerado$ct' required>ulceração
                        <option value='ulcerado'>ulcerado</option>
                        <option value='não ulcerado'>não ulcerado</option>
                        </select>
                        <select name='alopecia$ct' required>alopecia
                        <option value='alopecico'>alopécico</option>
                        <option value='não alopécico'>não alopécico</option>
                        </select>
                        </div>";
                        $_SESSION['ct']=$ct;
                        }
                        echo "<button class='registrobt' name='cadastrocito' type='submit' value='cadastrocito'>Enviar</button>
                        </form>
                        ";
                        $_SESSION['enviar']=true;
                    }
                    echo "</div>
                    <div class='cabexame'>
                    <h3>EXAMES CADASTRADOS</h3>
                    <hr>
                    <div class='container examescadb'><h4>Exame</h4><h4>Quantidade</h4><h4>Realizador</h4></div>
                    ";
                    $linha=array();
                    $linha=$_SESSION['linha'];
                    $tam=(sizeof($linha));
                    for ($i=0; $i<$tam; $i++){
                        $e=$linha[$i]['Exame'];
                        $q=$linha[$i]['Quantidade'];
                        $r=$linha[$i]['Realizador'];
                        echo "<div class='container listaexames'><p>$e</p><p>$q</p><p>$r</p></div><br>";

                    }
                    if (($_SESSION['enviar'])==false) {
                        echo "</div><div class='container enviar'>
                        <form method='post' action=''>
                        <button class='enviarbt' type='submit' name='enviar' id='enviar' value='enviado'><i class='fa-solid fa-vial-circle-check'></i> Enviar Exames</button>
                        </form>
                        </div>";
                    }
                            
                } else {
                    echo "";
                }
                if (isset($_POST['enviar'])==true) {
                    $host="localhost";
                    $user="root";
                    $password="root";
                    $dbname="examespetcare"; 
                    $linha=$_SESSION['linha'];
                    $tam=(sizeof($linha));
                    for ($i=0; $i<$tam; $i++){
                        $animal = $linha[$i]['Animal'];
                        $especie = $linha[$i]['Especie'];
                        $idade = $linha[$i]['Idade'];
                        $tutor = $linha[$i]['Tutor'];
                        $exame = $linha[$i]['Exame'];
                        $realizador = $linha[$i]['Realizador'];
                        $qtdade = $linha[$i]['Quantidade'];
                        $data = $linha[$i]['Datareal'];
                    
                    $con = new mysqli($host, $user, $password, $dbname)
                            or die ('Could not connect to the database server' . mysqli_connect_error());
                    mysqli_query($con, "SET NAMES 'utf8'");
                    mysqli_query($con,'SET character_set_connection=utf8');
                    mysqli_query($con,'SET character_set_client=utf8');
                    mysqli_query($con,'SET character_set_results=utf8');    
                    
                    $insert = "INSERT INTO exames (animal, tutor, idade, especie, exame, qtdade, realizador, datareal, estatus) VALUES ('$animal', '$tutor', $idade, '$especie', '$exame', $qtdade, '$realizador', '$data', 'Em Realização')";
                    $query=mysqli_query($con, $insert);
                    }
                    $tamcito=sizeof($_SESSION['cito']);
                    if (($tamcito>0)) {
                        $cito=$_SESSION['cito'];
                        $tam=(sizeof($cito));
                        for ($i=0; $i<$tam; $i++){
                            $local = $cito[$i]['Localcoleta'];
                            $tipocoleta = $cito[$i]['Tipocoleta'];
                            $aspecto =  $cito[$i]['Aspecto'];
                            $aderencia = $cito[$i]['Aderencia'];
                            $ulcerado = $cito[$i]['Ulceracao'];
                            $tamanho = $cito[$i]['Tamanho'];
                            $alopecia = $cito[$i]['Alopecia'];
                        
                            $con = new mysqli($host, $user, $password, $dbname)
                                    or die ('Could not connect to the database server' . mysqli_connect_error());
                            mysqli_query($con, "SET NAMES 'utf8'");
                            mysqli_query($con,'SET character_set_connection=utf8');
                            mysqli_query($con,'SET character_set_client=utf8');
                            mysqli_query($con,'SET character_set_results=utf8');    
                            
                            $busca="SELECT cod FROM exames where animal='$animal' and datareal='$data' and tutor='$tutor'";
                            $pesquisa=mysqli_query($con,$busca);
                            $result=mysqli_fetch_array($pesquisa);
                            if ($result) {
                                $cod=$result['cod'];
                            }
                        
                    
                            $insert = "INSERT INTO cadcito (cod, localcoleta, tipocoleta, aspecto, aderencia, ulceracao, tamanho, alopecia) VALUES ($cod,  '$local', '$tipocoleta', '$aspecto', '$aderencia', '$ulcerado', $tamanho, '$alopecia')";
                            $query=mysqli_query($con, $insert);
                        }
                    }
                    echo 'Exames Enviados';
                    session_destroy();
                    echo "<form method='post' action=''>
                    <button>Limpar</button>
                    </form>";
                }

                if (isset($_POST['deletar'])==true) {
                    $_SESSION['linha']=array();
                    $_SESSION['cito']=array();
                }

                if (isset($_POST['cadastrocito'])==true) {
                    $_SESSION['enviar']=false;
                    $ct=$_SESSION['ct'];
                    for ($i=0; $i<=$ct; $i++) {
                        $tipocoleta=$_POST["tipodecoleta$i"];
                        $local=$_POST["local$i"];
                        $aspecto=$_POST["aspecto$i"];
                        $ulcerado=$_POST["ulcerado$i"];
                        $aderencia=$_POST["aderencia$i"];
                        $alopecia=$_POST["alopecia$i"];
                        $tamanho=$_POST["tamanho$i"];
        
                        $cito=array();
                        $cito=$_SESSION['cito'];
                        array_push($cito, array(
                                "Localcoleta" => $local,
                                "Tipocoleta" => $tipocoleta,
                                "Aspecto" => $aspecto,
                                "Ulceracao" => $ulcerado,
                                "Aderencia" => $aderencia,
                                "Alopecia" => $alopecia,
                                "Tamanho" => $tamanho,
                            ));
        
                        $_SESSION['cito']=$cito;  

                        echo "<script src=\"javascript/escondebotao.js\"></script>";

                    }    
                    echo "</div>
                    <div class='cabexame'>
                    <h3>EXAMES CADASTRADOS</h3>
                    <hr>
                    <div class='container examescadb'><h4>Exame</h4><h4>Quantidade</h4><h4>Realizador</h4></div>
                    ";
                    $linha=array();
                    $linha=$_SESSION['linha'];
                    $tam=(sizeof($linha));
                    for ($i=0; $i<$tam; $i++){
                        $e=$linha[$i]['Exame'];
                        $q=$linha[$i]['Quantidade'];
                        $r=$linha[$i]['Realizador'];
                        echo "<div class='container listaexames'><p>$e</p><p>$q</p><p>$r</p></div><br>";

                    }
                    echo "</div><div class='container enviar'>
                    <form method='post' action=''>
                    <button class='enviarbt' type='submit' name='enviar' id='enviar' value='enviado'><i class='fa-solid fa-vial-circle-check'></i> Enviar</button>
                    </form>
                    </div>"; 
                   
                }
                echo "</div><div class='voltar'><a href='/ExamesPetCare/index.php'><i class='fa-solid fa-left-long'>Voltar</i></a></div>"; 


            
            ?>    
            <?php

            
               
              
                    
                    
                    
                
                   

            ?>


        </div>
        <div class="container exame">


       
            
        </div>
    
</body>
</html>