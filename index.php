<?php 
    include('layouts/head.php'); 
    if(isset($_POST)){
        $errors = [];
        if(empty($_POST['email'])){
            $errors['email'] = "Le champs email est obligatoire";
        }
        if(empty($_POST['message'])){
            $errors['message'] = "Le champs message est obligatoire";
        }
    }
?>

<div class="container my-5">
    <form method="POST" action="index.php">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Prénom</label>
                    <input type="text" class="form-control" name="name" value=<?php if(isset($_POST['name'])) echo $_POST['name']; ?>>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nom</label>
                    <input type="text" class="form-control" name="lastname" value=<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email *</label>
            <input type="email" class="form-control" name="email" value=<?php if(isset($_POST['email'])) echo $_POST['email']; ?>>
            <p class="error">
                <code>
                    <?php if(isset($errors['email'])) echo $errors['email']; ?>
                </code>
            </p>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Message *</label>
            <textarea class="form-control" name="message"></textarea>
            <p class="error">
                <code>
                    <?php if(isset($errors['message'])) echo $errors['message']; ?>
                </code>
            </p>
        </div>
        <div class="form-group text-right">
            <small><p class="error"><code>* Champs obligatoires</code></p></small>
        </div>
        <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
    </form>

    <?php 
        if(isset($_POST['envoyer'])) {
    ?>

        <div class="jumbotron my-5">
            <h2 class="display-4">Success 😎</h2>
            <hr class="my-4">
            <div class="row">
                <div class="col-lg-4 col-sm-12 my-5 text-center">
                    <img src="https://media.giphy.com/media/S6qkS0ETvel6EZat45/giphy.gif" alt="ross" class="avatar">
                </div>
                <div class="col-lg-8 col-sm-12 my-5">
                    <p class="lead">
                        <?php 

                            $to = "jenny.viannay75@gmail.com"; // l'adresse du destinataire des mails
                            $from = "jenny.test4php@gmail.com";
                            if(isset($_POST['name'])){
                                $name = $_POST['name'];
                            }
                            $message = $_POST['message'];
                            $email = $_POST['email'];
                            $subject = "New message from rour contact form";
                            $content = "Le message suivant vous a été envoyé par " .$email ." : <br> " .$message;
                            $headers = "From: " .$from;
                            mail($to, $subject, $content, $headers);
                            echo "Merci pour votre message " .$_POST['name'] .", celui-ci a bien été envoyé.";
                        ?>
                    </p>
                </div>
            </div>  
        </div>   
    <?php
        }
    ?>
</div>

<?php include('layouts/footer.php'); ?>