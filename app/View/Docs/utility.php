<div class="m-12 flex items-center">
    <div class="w-full">
        <p class="text-base leading-4 text-gray-600">Classes</p>
        <h1 class="md:text-5xl text-3xl font-bold leading-10 mt-3 text-white">Utility</h1>
        <p class="text-base leading-5 mt-5 text-gray-500 w-7/12">We’re working on a suit of tools to make managing complex systems easier, for everyone for free. we can’t wait to hear what you think</p>
        <div class="mt-8 mockup-window border border-base-300 bg-base-300">
            <pre><code class="language-php">
    public function view($path, $head, $data = [])
    {
        $path = explode(".", $path);
        
        // Get the file name and turn it capitalized
        if ( preg_match('~^\p{Lu}~u', $path[0]) ) {
            $path = join("/",$path);
        } 
        else {
            $path[0] = ucfirst($path[0]);
            $path = join("/",$path);
        }

        $title = $head['title'];

        ob_start();

        require_once($_SERVER['DOCUMENT_ROOT'] . '/app/View/' . $path . '.php');
        $content = ob_get_clean();
        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/app/View/Layout/public_layout.php');
    }
            </code></pre>
        </div>
    </div>
</div>