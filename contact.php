<?php
include_once 'partials/header.php';

$firstname = !empty($_POST['firstname']) ? strip_tags($_POST['firstname']) : '';
$lastname = !empty($_POST['lastname']) ? strip_tags($_POST['lastname']) : '';
$email = !empty($_POST['email']) ? strip_tags($_POST['email']) : '';
$message = !empty($_POST['message']) ? strip_tags($_POST['message']) : '';
$newsletter = !empty($_POST['newsletter']) ? intval($_POST['newsletter']) : 0;

$errors = array();
$result = '';

if (!empty($_POST)) {

    $contact = new Contact();

    foreach($_POST as $key => $value) {
        try {
            if (property_exists($contact, $key)) {
                $contact->$key = $value;
            }
        } catch (Exception $e) {
            $errors[$key] = $e->getMessage();
        }
    }

    /*
    foreach($contact->getProperties() as $field) {
        try {
            if (isset($$field)) {
                $contact->$field = $$field;
            }
        } catch (Exception $e) {
            $errors[$field] = $e->getMessage();
        }
    }
    */

    if (empty($errors)) {

        $insert_id = $contact->save();

        if (!empty($insert_id)) {

            $result .= '<div class="alert alert-success">Votre message a bien été envoyé</div>';
            $result .= '<script>setTimeout(function() { location.href = "index.php"; }, 3000);</script>';
        } else {
            $result .= '<div class="alert alert-danger">Une erreur s\'est produite, merci de réessayer ultèrieurement</div>';
        }
    }
}
?>
        <h1>Contact</h1>

        <hr>

        <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <ul>
            <?php
            foreach($errors as $error) {
                echo '<li>'.$error.'</li>';
            }
            ?>
            </ul>
        </div>
        <?php } ?>

        <?php
        if (!empty($result)) {
            echo $result;
        } else {
        ?>
        <form class="form-horizontal" method="POST" novalidate>
            <div class="form-group<?= !empty($errors['firstname']) ? ' has-error' : '' ?>">
                <label for="firstname" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-3">
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Prénom" value="<?= $firstname ?>">
                </div>
            </div>
            <div class="form-group<?= !empty($errors['lastname']) ? ' has-error' : '' ?>">
                <label for="lastname" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-3">
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Nom" value="<?= $lastname ?>">
                </div>
            </div>
            <div class="form-group<?= !empty($errors['email']) ? ' has-error' : '' ?>">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?>">
                </div>
            </div>
            <div class="form-group<?= !empty($errors['message']) ? ' has-error' : '' ?>">
                <label for="message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-5">
                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Message" maxlength="140" rows="7"><?= $message ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </div>
            </div>
        </form>
        <?php } ?>

<?php include_once 'partials/footer.php' ?>