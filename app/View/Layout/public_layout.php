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
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@2.6.0/dist/full.css"
      rel="stylesheet"
      type="text/css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Fira Code', 'sans-serif'],
                },
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
<body class="min-h-screen bg-base-200">
    <header class="sticky top-0">
        <div class="pt-4 navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                    </label>
                    <ul tabindex="0" class="menu bg-base-100 w-56 rounded-box dropdown-content mt-3 p-2 shadow">
                        <li><a href="/" class="bg-cyan-500 text-white">Homepage</a></li>
                        <li><a href="/docs">Documentation</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-center">
                <h1 class="text-2xl text-cyan-500">MountKuma Framework</h2>
            </div>
            <div class="navbar-end px-6">
                <?php
                    if(! empty($_SESSION['auth']) ){
                ?>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                        <img src="https://api.lorem.space/image/face?hash=33791" />
                        </div>
                    </label>
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="/user/<?php echo $_SESSION['auth']['id'] ?>">Profile</a></li>
                        <li><a href="/user/<?php echo $_SESSION['auth']['id'] ?>/edit">Settings</a></li>
                        <li><a href="/disconnect">Logout</a></li>
                    </ul>
                </div>
                <?php
                    }else{
                ?>
                    <ul class="flex justify-between w-48">
                        <li><a href="/login" class="py-2 px-4">Login</a></li>
                        <li><a href="/sign-up" class="py-2 px-4 bg-cyan-500 text-white rounded">Sign Up</a></li>
                    </ul>
                <?php
                    }
                ?>
            </div>
        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
</body>
</html>