<?php
    include('includes/navbar/navbar.php');
    include("pages/smtp-config.php");    
    $to = "r.fourneuve@outlook.fr";
    $from = "POPSMOKE-PC";
    $headers = "From:" . $from;
    $template_message = "Bonjour,
 
    Nous tenons à nous excuser de ne pas pouvoir répondre tout de suite à votre demande concernant ce problème.  Nous vous répondrons dès que possible.
    
    Bien cordialement,
    
    La société POPSMOKE-PC
    
    +33 7 86 11 07 99
    contact@popsmokepc.com";
    $template_object = "Formulaire - POPSMOKE-PC";

    require_once('includes/navbar/navbar.php');
    $title = "Découvrez nos offres";
    $subtitle = "Nous Contacter";
    $links = "#contact";
    $navbar = navbar($title,$subtitle,$links);
    echo $navbar;
    

    if (isset( $_POST['submit'])){
        $message = $_POST['message'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];

        if (!empty($message)){
            if (!empty($email)){
                if (!empty($subject)){
                    $retval = mail($to,$subject,$message,$headers);
                    $retval = mail($email,$template_object,$template_message,$headers);
                }else{
                    $erreur = "Veuillez renseigner un object";
                }
            }else{
                $erreur = "Veuillez renseigner l'email";
            }
            
        }else{
            $erreur = "Veuillez renseigner le message ";
        }
    }
    
?>




<html>
<body>
<main style="margin-right: 140px;margin-left: 140px;">
<div class="card-body p-sm-5">
    <h2 class="text-center mb-4">Nous Contacter</h2>
    <form method="post" id="contact">
        <div class="mb-3"><input id="name-2" class="form-control" type="text" name="subject" placeholder="Object" required /></div>
        <div class="mb-3"><input id="email-2" class="form-control" type="email" name="email" placeholder="Email" required /></div>
        <div class="mb-3"><textarea id="message-2" class="form-control" name="message" rows="6" placeholder="Message"required></textarea></div>
        <div><button class="btn btn-primary d-block w-100" type="submit" name="submit">Envoyer </button></div>
    </form><br>
    <br>
    <br>
</div>
</main>
</body>
</html>