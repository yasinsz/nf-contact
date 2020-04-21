<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Kontaktiere<br><strong>deine digitale Zukunft.</strong></h2>

    <?php if ($success) : ?>
        <div class="success">
            Vielen Dank für dein Interesse, <?= htmlspecialchars($name) ?>.
            Wir werden uns in Kürze bei dir melden!
        </div>
    <?php elseif ($participated) : ?>
        <div class="success">
            Vielen Dank für dein Interesse.
            Leider hast du das Formular schon einmal abgeschickt.
        </div>
    <?php else : ?>
        <form method="POST">
            <fieldset <?php if ($nameError) echo 'class="error"'; ?>>
                <label>Name</label>
                <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
                <div class="error-text"><?= $nameError ?></div>
            </fieldset>

            <fieldset <?php if ($emailError) echo 'class="error"'; ?>>
                <label>E-Mail-Adresse</label>
                <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
                <div class="error-text"><?= $emailError ?></div>
            </fieldset>

            <fieldset <?php if ($messageError) echo 'class="error"'; ?>>
                <label>Nachricht</label>
                <textarea name="message" rows="5"><?= htmlspecialchars($message) ?></textarea>
                <div class="error-text"><?= $messageError ?></div>
            </fieldset>

            <fieldset>
                <button>Absenden</button>
            </fieldset>
        </form>
    <?php endif; ?>
</body>

</html>