<div class="mt-4 flex flex-col w-full lg:flex-row">
    <div class="grid pt-8 text-center ml-6 flex-grow w-2/12 card bg-base-300 rounded-box">
        <nav>
            <ul>
                <li class="py-2">
                    <a href="#get-started" class="text-cyan-400 hover:text-cyan-500">Get Started</a>
                </li>
                <li class="py-2">
                    <a href="#utility" class="text-cyan-400 hover:text-cyan-500">Utilities</a>
                </li>
                <li class="py-2">
                    <a href="#controller" class="text-cyan-400 hover:text-cyan-500">Controller</a>
                </li>
                <li class="py-2">
                    <a href="#model" class="text-cyan-400 hover:text-cyan-500">Model</a>
                </li>
            </ul>
        </nav>
    </div> 
    <div class="divider lg:divider-horizontal"></div> 
    <div class="grid px-12 flex-grow w-10/12 card bg-base-200 rounded-box">
        <section id="get-started" class="mt-8">
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/app/View/Home/Docs/instal.php'); ?>
        </section>
        <section id="utility" class="mt-8">
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/app/View/Home/Docs/utility.php'); ?>
        </section>
        <section id="controller" class="mt-8">
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/app/View/Home/Docs/controller.php'); ?>
        </section>
        <section id="model" class="mt-8">
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/app/View/Home/Docs/model.php'); ?>
        </section>
    </div>
</div>