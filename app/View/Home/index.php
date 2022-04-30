<section class="pt-32 flex justify-center align-center bg-gray-900 md:pl-40" style="height: 100vh;">
	<div class="mt-4 container px-6 py-10 w-10/12">
	    <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">
	      	Discover the <br>
			<span class="text-sunshine">Mount-Kuma</span> Framework !
		</h1>

	    <p class="mt-4 text-gray-500 xl:mt-6 dark:text-gray-300">
	        This is a young framework, so be patient and enjoy it !
	    </p>

	    <div class="grid grid-cols-1 gap-8 mt-14 xl:mt-14 xl:gap-14 md:grid-cols-2 xl:grid-cols-3">
	        <div class="p-8 space-y-3 border-2 border-sunshine rounded-xl">
	            <span class="flex inline-block text-sunshine">
	                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
	                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
	                </svg>
					<p class="mb-2 text-xs font-semibold tracking-wide uppercase text-sunshine mx-3 my-2">
	  					Discover
					</p>
	            </span>

                <h2 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">The documentation</h2>

                <p class="text-gray-500 dark:text-gray-300">
					You will find here all the documentations,</br>
					I will do my best to create the documentation as the framework grows
                </p>

                <a href="#" class="flex">
					<span class="inline-flex p-2 text-white capitalize transition-colors duration-200 transform bg-sunshine rounded-full hover:underline hover:bg-sunbreak">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
					</span>
					<p class="mb-2 text-xs font-semibold tracking-wide uppercase text-white mx-3 my-3">
						Get started
					</p>
				</a>
            </div>

            <div class="p-8 space-y-3 border-2 border-sunshine rounded-xl">
                <span class="flex inline-block text-sunshine">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                    </svg>
					<p class="mb-2 text-xs font-semibold tracking-wide uppercase text-sunshine mx-3 my-2">
          				About
        			</p>
                </span>

                <h2 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">The framework</h2>

                <p class="text-gray-500 dark:text-gray-300">
					This framework is made for my personnal use, feel free to use it, and if needed don't hesitate to make a pull request or contact me !
                </p>

				<a href="#" class="flex">
					<span class="inline-flex p-2 text-white capitalize transition-colors duration-200 transform bg-sunshine rounded-full hover:underline hover:bg-sunbreak">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
					</span>
					<p class="mb-2 text-xs font-semibold tracking-wide uppercase text-white mx-3 my-3">
						Github
					</p>
				</a>
            </div>

			<div class="p-8 text-white space-y-3 border-2 border-sunshine rounded-xl">
                <h2 class="text-2xl font-semibold text-gray-700 capitalize dark:text-white">Country Data</h2>
				<?php foreach ($data['countries'] as $country) { ?>
					<div>
						<?= $country['id'].' >' ?>
						<span class="text-sunshine"> <?= $country['name'] ?> </span>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
</section>