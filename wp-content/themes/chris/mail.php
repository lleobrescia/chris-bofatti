<?php
$data     = json_decode(file_get_contents('php://input'), true); //Recebe JSON

$to               = 'contato@chrisbonfatti.com.br';
$subject          = "Mensagem do Site [ Chris Bonfatti ]";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: Contato Chris Bonfatti <contato@chrisbonfatti.com.br>" . "\r\n";

$corpo = 'Nome: '.$data['nome'].'<br>Telefone: '.$data['telefone'].'<br>E-mail: '.$data['email'].'<br>Mensagem: '.$data['mensagem'].'<br>';



if (mail($to, $subject, $corpo, $headers)) {
    echo 'true';
} else {
    echo 'false';
}
