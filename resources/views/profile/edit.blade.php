@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Profile</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('profile') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
                <a href="{{ route('profile.change.password') }}" class="bg-gray-200 text-gray-700 text-sm uppercase ml-2 py-2 px-4 flex items-center rounded">
                    <span class="ml-2 text-xs font-semibold">Change Password</span>
                </a>
            </div>
        </div>
        <div class="mt-8 bg-white rounded">
            <form action="{{ route('profile.update') }}" method="POST" class="w-full max-w-2xl mx-auto px-6 py-12 flex flex-wrap justify-between" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full sm:w-auto order-last sm:order-first">
                    <div class="md:flex md:items-center mb-4">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Name :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" value="{{ auth()->user()->name }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-4">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Email :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="email" value="{{ auth()->user()->email }}">
                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button class="w-full shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Update User
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
