@extends('components.layout')
@section('title', 'Registration')
@section('content')

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="font-[Montserrat] mt-5 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900">
                Create an Account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
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

                @if(session()->has('success'))
                    <script>
                        alert('{{session('success')}}');
                    </script>
                @endif

            </div>
            <form class="space-y-6" action="{{route('registration.post')}}" method="POST" onsubmit="formValidator()">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full
                        Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4">
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone
                        Number</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 ps-4">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-primary-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-secondary-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign up
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have an account?
                <a href="/login" class="font-semibold leading-6 text-secondary-400 hover:text-indigo-500">Sign
                    in.</a>
        </div>
    </div>
    <script>
        // function for form validation
        function formValidator() {
            const fullName = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const password = document.getElementById('password').value.trim();

            // Validation logic
            if (fullName === '') {
                alert('Please enter your full name ');
                return false;
            }
            if (email === '') {
                alert('Please enter your email ');
                return false;
            }
            if (phone === '') {
                alert('Please enter your phone number ');
                return false;
            }
            if (password === '') {
                alert('Please enter your password ');
                return false;
            }

            // full name must not contain numbers
            if (fullName.match(/\d+/g)) {
                alert('Full name must not contain numbers');
                return false;
            }
            // full name must be at least 3 characters
            if (fullName.length < 3) {
                alert('Full name must be at least 3 characters');
                return false;
            }
            // email must be valid
            if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                alert('Email must be valid');
                return false;
            }
            // phone number must start with +254 and be 13 characters long
            if (!phone.match(/^\+254\d{9}$/)) {
                alert('Phone number must start with +254 and be 13 characters long');
                return false;
            }
            // password must be at least 8 characters long and contain at least one number and one special character
            if (!password.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/)) {
                alert('Password must be at least 8 characters long and contain at least one number and one special character');
                return false;
            }

            return true;
        }
    </script>
@endsection
