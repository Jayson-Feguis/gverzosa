<?php 
    include('../component/client/header/header.php');
?>

<div class="flex flex-col w-full">
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 pt-10 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 mt-10 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Log in</h1>
                <form action="../api/post_login.php" method="post">
                    <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="username"
                        placeholder="Username"
                        required
                        />
                    <input
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password"
                        required
                          />
                    <button
                        name="login"
                        type="submit"
                        class="w-full text-center py-3 rounded bg-secondary text-white hover:bg-green-dark focus:outline-none my-1"
                    >Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php 
    include('../component/client/footer/footer.php');
?>