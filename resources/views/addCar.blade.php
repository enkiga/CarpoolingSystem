@extends('components.layout')
@section('title', 'Car Details')
@php
    $activePage = 'car-details';
@endphp

@section('content')
    @include('components.navigationBar')
    <section class="text-gray-600 body-font pt-20">
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
        </div>
        <form class="container mx-auto px-5 py-3  bg-primary-50 rounded-2xl" action="{{route('addVehicle.post')}}"
              method="POST" onsubmit="return addCarValidation()" enctype="multipart/form-data">
            @csrf
            {{--heading--}}
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-xl font-bold title-font px-3 py-3 mb-4 text-gray-900 tracking-widest text-start border-b-2 border-primary-100 ">
                    Car Details:</h1>

                <div class="flex items-center justify-center w-full">
                    <label for="vehicle_image"
                           class="flex flex-col items-center justify-center w-full h-36 border-2 border-primary-500 border-dotted rounded-lg cursor-pointer bg-white  hover:bg-primary-100 hover:text-white">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class='bx bx-cloud-upload w-8 h-8 text-3xl mb-4'></i>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                or drag and drop</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="vehicle_image" type="file" name="vehicle_image" class="hidden" alt="vehicle_image"/>

                        <!-- Image Preview -->
                        <img id="imagePreview" src="#" alt="Image Preview" class="hidden h-40 w-80 object-fill mt-2 ">

                    </label>
                </div>
                <div class="flex flex-wrap w-full mt-5 justify-between">

                    <div class="flex flex-col mx-3 md:w-1/4 w-full">
                        <label for="vehicle_name" class="text-start px-2 text-base font-bold text-gray-700">Car Name
                            :</label>

                        <input type="text" name="vehicle_name" id="vehicle_name"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Toyota Hilux">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/4 w-full">
                        <label for="vehiclePlate" class="text-start px-2 text-base font-bold text-gray-700">Car
                            Plate:</label>

                        <input type="text" name="vehiclePlate" id="vehiclePlate"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="KAA 123A">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/4 w-full">
                        <label for="vehicle_capacity" class="text-start px-2 text-base font-bold text-gray-700">Seat
                            Number:</label>

                        <input type="number" name="vehicle_capacity" id="vehicle_capacity"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black">
                    </div>

                </div>

                <div class="mt-5 w-auto ">
                    <input type="submit"
                           value="Submit"
                           class="mt-5 bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-10 rounded tracking-widest">
                </div>
            </div>
        </form>
    </section>
    <script>
        document.getElementById('vehicle_image').addEventListener('change', function () {
            const fileInput = this;
            const imagePreview = document.getElementById('imagePreview');
            const uploadInstructions = document.querySelector('.flex-col.items-center.justify-center.pt-5.pb-6');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden'); // Show the image preview
                    uploadInstructions.style.display = 'none'; // Hide the upload instructions
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        });

        function addCarValidation() {
            const vehicle_name = document.getElementById('vehicle_name').value;
            const vehiclePlate = document.getElementById('vehiclePlate').value;
            const vehicle_capacity = document.getElementById('vehicle_capacity').value;
            const file = document.getElementById('vehicle_image').value;

            if (vehicle_name === '') {
                alert('Car name is required');
                return false;
            }

            if (vehiclePlate === '') {
                alert('Car plate is required');
                return false;
            }

            if (vehicle_capacity === '') {
                alert('Car seats is required');
                return false;
            }

            if (file === '') {
                alert('Car image is required');
                return false;
            }

            // ensure car plate has should start with 3 characters a white space followed by 3 digits and end with 1 character
            const plateRegex = /^[a-zA-Z]{3}\s[0-9]{3}[a-zA-Z]{1}$/;
            if (!plateRegex.test(vehiclePlate)) {
                alert('Car plate should start with 3 characters a white space followed by 3 digits and end with 1 character');
                return false;
            }

            // ensure car image ends with prefix .jpg, .png, .jpeg, .gif
            const fileRegex = /(?:\.([^.]+))?$/;
            const fileExtension = fileRegex.exec(file)[1];
            if (!['jpg', 'png', 'jpeg', 'gif'].includes(fileExtension)) {
                alert('Car image should be of type jpg, png, jpeg or gif');
                return false;
            }


            return true;

        }
    </script>

    @include('components.footer')
@endsection
