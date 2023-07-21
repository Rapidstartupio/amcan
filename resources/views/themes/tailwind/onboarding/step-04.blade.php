@extends('theme::layouts.empty')

@section('content')

<main class="bg-white dark:bg-slate-900">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-1/2">

                <div class="min-h-[100dvh] h-full flex flex-col after:flex-1">

                    <div class="flex-1">

                        <!-- Header -->
                        <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a href="{{ route('wave.home') }}" class="flex items-center justify-center space-x-3 transition-all duration-1000 ease-out transform text-wave-500">
                                @if(Voyager::image(theme('logo')))
                                    <img class="h-9" src="{{ Voyager::image(theme('logo')) }}" alt="Amcan">
                                @else
                                    <svg class="w-9 h-9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 208 206"><defs/><defs><linearGradient id="a" x1="100%" x2="0%" y1="45.596%" y2="45.596%"><stop offset="0%" stop-color="#5D63FB"/><stop offset="100%" stop-color="#0769FF"/></linearGradient><linearGradient id="b" x1="50%" x2="50%" y1="0%" y2="100%"><stop offset="0%" stop-color="#39BEFF"/><stop offset="100%" stop-color="#0769FF"/></linearGradient><linearGradient id="c" x1="0%" x2="99.521%" y1="50%" y2="50%"><stop offset="0%" stop-color="#38BCFF"/><stop offset="99.931%" stop-color="#91D8FF"/></linearGradient></defs><g fill="none" fill-rule="evenodd"><path fill="url(#a)" d="M185.302 38c14.734 18.317 22.742 41.087 22.698 64.545C208 159.68 161.43 206 103.986 206c-39.959-.01-76.38-22.79-93.702-58.605C-7.04 111.58-2.203 69.061 22.727 38a104.657 104.657 0 00-9.283 43.352c0 54.239 40.55 98.206 90.57 98.206 50.021 0 90.571-43.973 90.571-98.206A104.657 104.657 0 00185.302 38z"/><path fill="url(#b)" d="M105.11 0A84.144 84.144 0 01152 14.21C119.312-.651 80.806 8.94 58.7 37.45c-22.105 28.51-22.105 68.58 0 97.09 22.106 28.51 60.612 38.101 93.3 23.239-30.384 20.26-70.158 18.753-98.954-3.75-28.797-22.504-40.24-61.021-28.47-95.829C36.346 23.392 68.723.002 105.127.006L105.11 0z"/><path fill="url(#c)" d="M118.98 13c36.39-.004 66.531 28.98 68.875 66.234 2.343 37.253-23.915 69.971-60.006 74.766 29.604-8.654 48.403-38.434 43.99-69.685-4.413-31.25-30.678-54.333-61.459-54.014-30.78.32-56.584 23.944-60.38 55.28v-1.777C49.99 44.714 80.872 13.016 118.98 13z"/></g></svg>
                                @endif
                            </a>
                            <div class="text-sm">
                                Have an account? <a class="font-medium text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400" href="{{ route('login') }}">Sign In</a>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="px-4 pt-12 pb-8">
                            <div class="max-w-md mx-auto w-full">
                                <div class="relative">
                                    <div class="absolute left-0 top-1/2 -mt-px w-full h-0.5 bg-slate-200 dark:bg-slate-700" aria-hidden="true"></div>
                                    <ul class="relative flex justify-between w-full">
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="{{ route('onboarding.step','01') }}">1</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="{{ route('onboarding.step','02') }}">2</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="{{ route('onboarding.step','03') }}">3</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="{{ route('onboarding.step','04') }}">4</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-8">
                        <div class="max-w-md mx-auto">

                            <div class="text-center">
                                <svg class="inline-flex w-16 h-16 fill-current mb-6" viewBox="0 0 64 64">
                                    <circle class="text-emerald-100 dark:text-emerald-400/30" cx="32" cy="32" r="32" />
                                    <path class="text-emerald-500 dark:text-emerald-400" d="m28.5 41-8-8 3-3 5 5 12-12 3 3z" />
                                </svg>
                                <h1 class="text-3xl text-slate-800 dark:text-slate-100 font-bold mb-8">Great! Details accepted, Let's get your loan application started. 🙌</h1>
                                <a class="btn bg-indigo-500 hover:bg-indigo-600 text-white" href="{{ route('register') }}">Go To Loan Dashboard -&gt;</a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <!-- Image -->
            <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="{{ asset('images/onboarding-image.jpg') }}" width="760" height="1024" alt="Onboarding" />
                <img class="absolute top-1/4 left-0 -translate-x-1/2 ml-8 hidden lg:block" src="{{ asset('images/auth-decoration.png') }}" width="218" height="224" alt="Authentication decoration" />
            </div>

        </div>

    </main>


@endsection
