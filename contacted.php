<?php 
$title = "Message envoyé ! Vianney Accart, Développeur Web Back-End";
require 'header.php';
?>

<section class="contacted" id="contact">
    <div class="section-title-contacted">
        <h2>Discutons ensemble</h2>
        <p>Vous avez un projet ? Des suggestions ? N'hésitez pas à me contacter.</p>
    </div>

    <?php 
    if(isset($_POST['message'])) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' . $_POST['mail'] . "\r\n";

        $message = '<h1>Message envoyé depuis la page Contact de vianneyaccart.fr</h1>
        <p><b>Nom : </b>' . $_POST['name'] . '<br>
        <b>Email : </b>' . $_POST['mail'] . '<br>
        <b>Message : </b>' . $_POST['message'] . '</p>';

        $retour = mail('vianneyaccart@gmail.com', 'Nouveau message depuis vianneyaccart.fr', $message, $entete);
        
        if($retour) {
            echo '<p class="contact-form">Merci pour votre message, il a bien été envoyé. Je vous recontacte dans les plus brefs délais.</p>';
        }
    }
    ?>
    
    <form method="POST" action="contacted.php" class="form">
        <div class="form-container">
            <div class="name-mail">
                <div class="name-container">
                    <label class="label" for="name">Nom<span class="requiredField">*</span></label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="email-container">
                    <label class="label" for="mail">Email<span class="requiredField">*</span></label>
                    <input type="email" name="mail" id="mail" required>
                </div>       
            </div>

            <div class="message-container">
                <label class="label" for="message">Message<span class="requiredField">*</span></label>
                <textarea name="message" id="message" required></textarea>
            </div>

            <input class="submit-button" type="submit" value="Envoyer"/>

        </div>
    </form>
</section >

<?php require 'footer.php'; ?>
