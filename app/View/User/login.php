<form action="/connect" method="post" enctype="multipart/form-data">
    <div class="hero min-h-screen bg-base-200" style="margin-top: -8vh">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left mx-8">
                <h1 class="text-5xl font-bold">Login now!</h1>
                <p class="py-6">Lorem, ipsum dolor. Provident cupiditate voluptatem et in. Quaerat excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                    <div class="form-control">
                        <input type="text" name="username" placeholder="Username" class="my-2 input input-bordered" />
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" placeholder="Password" class="my-2 input input-bordered" />
                        <label class="label">
                            <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                        </label>
                    </div>
                    <div class="form-control mt-6">
                        <input type="submit" class="btn bg-cyan-800 hover:bg-cyan-900" value="Login">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>