@extends('components.layout')
@section('title', 'Login')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="font-[Montserrat] mt-10 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900">
                Sign in to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="error">
                @if($errors->any())
                    <script>
                        let errorMessage = ''

                        @foreach($errors->all() as $error)
                            errorMessage += '{{$error}}\n';
                        @endforeach

                        if (errorMessage !== '') {
                            alert(errorMessage);
                        }
                    </script>
                @endif

                @if(session()->has('error'))
                    <script>
                        alert('{{session('error')}}');
                    </script>
                @endif
                <form class="space-y-6" action="{{route('login.post')}}" method="POST"
                      onsubmit="return loginValidator()">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-3">
                        </div>
                    </div>

                    <div>

                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                   required
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-3">
                        </div>
                    </div>

                    <div>
                        <input type="checkbox" name="view_password" id="viewPassword"
                               onchange=" return togglePasswordVisibility()">
                        <label for="viewPassword">View Password</label>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-primary-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-secondary-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Sign in
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Don't have an account?
                    <a href="/registration" class="font-semibold leading-6 text-secondary-400 hover:text-indigo-500">Sign
                        up.</a>
                </p>
            </div>
        </div>
        <script>
            function loginValidator() {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                if (email === '') {
                    alert('Email is required');
                    return false;
                }

                if (password === '') {
                    alert('Password is required');
                    return false;
                }

                return true;
            }

            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const viewPasswordCheckbox = document.getElementById('viewPassword');

                if (viewPasswordCheckbox.checked) {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            }
        </script>
@endsection
