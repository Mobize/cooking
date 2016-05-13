<?php require_once 'partials/header.php' ?>

        <h1>Contact</h1>

        <div class="alert alert-danger" role="alert">
            <ul>
                <li>Error label</li>
            </ul>
        </div>

        <form class="form-horizontal" action="" method="POST" novalidate>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-3">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Votre prénom" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Votre adresse email" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-5">
                    <textarea id="message" name="message" class="form-control" placeholder="Votre message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Envoyer</button>
                </div>
            </div>
        </form>

<?php require_once 'partials/footer.php' ?>