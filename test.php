<?php

$ssh_host = '192.168.1.49'; // Le nom d'hôte ou l'adresse IP de la machine Linux
$ssh_port = 22; // Le port SSH
$ssh_user = 'root'; // Le nom d'utilisateur SSH
$ssh_pass = 'Paul123/'; // Le mot de passe SSH

// Connexion SSH
$ssh = ssh2_connect($ssh_host, $ssh_port);
ssh2_auth_password($ssh, $ssh_user, $ssh_pass);

// Exécution de la commande systemctl
$stream = ssh2_exec($ssh, 'systemctl status nginx');
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);

if (str_contains($output, 'running')) {
    $status = "running";
} else {
    $status = "fault";
}

// Affichage du résultat
echo nl2br($status);

// Fermeture de la connexion SSH
ssh2_disconnect($ssh);

?>
