<?php
    if (! empty($_GET['token'])){
        $token = $_GET['token'];
    }
?>
<form action="/update-password" method="post" enctype="multipart/form-data">
    <div class="hero min-h-screen bg-base-200" style="margin-top: -8vh">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left mx-8">
                <h1 class="text-5xl font-bold">Enter the new password</h1>
                <p class="py-6">Lorem, ipsum dolor. Provident cupiditate voluptatem et in. Quaerat excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <div>
                        <input type="hidden" name="token" value="<?= $token ?>">
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" placeholder="Password" class="my-2 input input-bordered" />
                    </div>
                    <div class="form-control">
                        <input type="password" name="password-confirmation" placeholder="Password Confirmation" class="my-2 input input-bordered" />
                    </div>
                    <div class="form-control mt-6">
                        <input type="submit" class="btn bg-cyan-800 hover:bg-cyan-900" value="Reset">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

