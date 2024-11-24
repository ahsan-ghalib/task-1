<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>
    @php
        $crumbs = [
            'home' => route('dashboard'),
            'users' => route('users.index'),
            'create User' => '#'
        ];
    @endphp
    <x-breadcrumbs :crumbs="$crumbs"></x-breadcrumbs>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full sm:max-w-screen-xl mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
                <!-- Session Status -->
                <x-auth-session-status
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    :status="session('status')"/>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-2.5">
                        {{ __('Create User') }}
                    </h3>
                    <!-- Name Address -->
                    <div>
                        <x-input-label for="title" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                      required autofocus/>
                    </div>
                    <div>
                        <x-input-label for="title" :value="__('Email')"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                      required autofocus/>
                    </div>
                    <div>
                        <x-input-label for="title" :value="__('Roles')"/>
                        <x-select name="role" id="league-type">
                            <option selected disabled>-Select Role-</option>
                            @foreach($roles  as $role)
                                <option value="{{$role->name}}">{{ucwords($role->name)}}</option>
                            @endforeach

                        </x-select>
                    </div>
                    <div>
                        <x-input-label for="title" :value="__('Password')"/>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')"
                                      required autofocus/>
                    </div>
                    <div>
                        <x-input-label for="title" :value="__('Confirm Password')"/>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')"
                                      required autofocus/>
                    </div>

                    <!-- Save -->
                    <div class="flex gap-2 items-center justify-end mt-4">
                        <x-primary-button class="ml-3">
                            {{ __('Save') }}
                        </x-primary-button>
                        <a href="{{ route('users.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-white-800 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-2">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
