<?php
// verifie que la session est bien démarrée
initSession();
//On supprime les données de l'utilisateur en session
unset($_Session['user']);

//Detruire la session
session_destroy();
//Message flash
addFlash('Au revoir Darling');
//Redirection
header('Location:/');
exit;