<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <link rel="shortcut icon" href="../../../assets/images/ourson.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    sunlight: '#f57c36',
                    sunshine: '#ee6414',
                    sunbreak: '#c7500c',
                }
            }
        }
    }
    </script>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <ul>
            <?php if (! empty($_SESSION['auth']) ) { ?>

                <li><a href="/user/<?= $_SESSION['auth']['id'] ?> ">Profile</a></li>
                <li><a href="/disconnect">Disconnect</a></li>

            <?php } else { ?>

                <li><a href="login">Login</a></li>
                <li><a href="sign-up">Sign up</a></li>

            <?php } ?>
        </ul>
    </header>
    <main>
        <?= $content ?>
    </main>
</body>
</html>