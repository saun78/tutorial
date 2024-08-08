<html>
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                LOGIN
            </h2>
            <p class="mb-4">login to find job</p>
        </header>

        <form method="POST" action="/login">
            @csrf

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ old('name') }}" required />
 
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}" required />
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" required minlength="5" />
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Login
                </button>
            </div>
            <div class="mt-8">
                <p>doesn't have an account? <a href="/register" class="text-laravel">register</a></p>
            </div>
        </form>
    </div>
</div>
</html>

