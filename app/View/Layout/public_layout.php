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
<body>
    <header>
		<nav class="bg-zinc-800 shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<!-- Primary Navbar items -->
						<div class="hidden md:flex items-center space-x-1">
							<a href="/" class="py-4 px-2 text-orange-500 border-b-4 border-orange-500 font-semibold ">Home</a>
							<a href="/docs" class="py-4 px-2 text-gray-400 font-semibold hover:text-orange-500 transition duration-300">Documentation</a>
						</div>
					</div>
					<!-- Secondary Navbar items -->
                    <ul class="hidden md:flex items-center space-x-3">
                        <?php if (! empty($_SESSION['auth']) ) { ?>
                            <li><a href="/user/<?= $_SESSION['auth']['id'] ?> " class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-orange-500 hover:text-white transition duration-300">Profile</a></li>
                            <li><a href="/disconnect" class="py-2 px-2 font-medium text-white bg-orange-500 rounded hover:bg-orange-400 transition duration-300">Disconnect</a></li>
                        <?php } else { ?>
                            <li><a href="/login" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-orange-500 hover:text-white transition duration-300">Log In</a></li>
                            <li><a href="/sign-up" class="py-2 px-2 font-medium text-white bg-orange-500 rounded hover:bg-orange-400 transition duration-300">Sign Up</a></li>
                        <?php } ?>
                    </ul>
					<!-- Mobile menu button -->
					<div class="md:hidden flex items-center">
						<button class="outline-none mobile-menu-button">
                            <svg class=" w-6 h-6 text-gray-500 hover:text-orange-500 "
                                x-show="!showMenu"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
					    </button>
					</div>
				</ul>
			</div>
			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="">
					<li class="/"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-orange-500 font-semibold">Home</a></li>
					<li><a href="/docs" class="block text-sm px-2 text-white py-4 hover:bg-orange-500 transition duration-300">Documentation</a></li>
				</ul>
			</div>
			<script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>
		</nav>
    </header>
    <main>
        <?= $content ?>
    </main>
</body>
</html>