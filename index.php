<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenue</h1>
        <nav>
            <a href="index.php">Accueil</a>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h2>Contactez-nous</h2>
            <p>Remplissez le formulaire ci-dessous pour nous envoyer un message.</p>
        </section>

        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'success'): ?>
                <div class="alert alert-success">Votre message a bien été envoyé.</div>
            <?php elseif ($_GET['status'] === 'error'): ?>
                <div class="alert alert-error">Une erreur est survenue lors de l'envoi du message. Veuillez réessayer.</div>
            <?php endif; ?>
        <?php endif; ?>

        <section class="contact-form">
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" required placeholder="Votre nom">
                </div>

                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" required placeholder="votre@email.com">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" required placeholder="Votre message..."></textarea>
                </div>

                <button type="submit">Envoyer</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> - Tous droits réservés</p>
    </footer>
</body>
</html>
