
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="Potee7gPfKVH91PacKUPfmdnGzKagY5qDyrghbVu">

        <title>PlatinumPlusCapitalAdmin</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <!-- Livewire Styles -->
<style >
    [wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid], [wire\:loading\.inline-flex] {
        display: none;
    }

    [wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short], [wire\:loading\.delay\.long], [wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest] {
        display:none;
    }

    [wire\:offline] {
        display: none;
    }

    [wire\:dirty]:not(textarea):not(input):not(select) {
        display: none;
    }

    input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {
        animation-duration: 50000s;
        animation-name: livewireautofill;
    }

    @keyframes livewireautofill { from {} }
</style>

        <!-- Scripts -->
        <link rel="preload" as="style" href="http://platinumpluscapital.rapidstartup.io/build/assets/app-b076542d.css" /><link rel="modulepreload" href="http://platinumpluscapital.rapidstartup.io/build/assets/app-ce9f0651.js" /><link rel="stylesheet" href="http://platinumpluscapital.rapidstartup.io/build/assets/app-b076542d.css" /><script type="module" src="http://platinumpluscapital.rapidstartup.io/build/assets/app-ce9f0651.js"></script>        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>          
    </head>
    <body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400">

        <main class="bg-white dark:bg-slate-900">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-1/2">

                <div class="min-h-[100dvh] h-full flex flex-col after:flex-1">

                    <div class="flex-1">

                        <!-- Header -->
                        <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a class="block" href="/">
                                <svg width="32" height="32" viewBox="0 0 32 32">
                                    <defs>
                                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                                            <stop stop-color="#A5B4FC" offset="100%" />
                                        </linearGradient>
                                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                                            <stop stop-color="#38BDF8" offset="100%" />
                                        </linearGradient>
                                    </defs>
                                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                                    <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
                                    <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
                                    <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
                                </svg>
                            </a>
                            <div class="text-sm">
                                Have an account? <a class="font-medium text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400" href="/login">Sign In</a>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="px-4 pt-12 pb-8">
                            <div class="max-w-md mx-auto w-full">
                                <div class="relative">
                                    <div class="absolute left-0 top-1/2 -mt-px w-full h-0.5 bg-slate-200 dark:bg-slate-700" aria-hidden="true"></div>
                                    <ul class="relative flex justify-between w-full">
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="/onboarding/01">1</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="/onboarding/02">2</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-indigo-500 text-white" href="/onboarding/03">3</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400" href="/onboarding/04">4</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-8">
                        <div class="max-w-md mx-auto">
    
                            <h1 class="text-3xl text-slate-800 dark:text-slate-100 font-bold mb-6">Company information ✨</h1>
                            <!-- Form -->
                            <form>
                                <div class="space-y-4 mb-8">
                                    <!-- Company Name -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="company-name">Company Name <span class="text-rose-500">*</span></label>
                                        <input id="company-name" class="form-input w-full" type="text" />
                                    </div>
                                    <!-- City and Postal Code -->
                                    <div class="flex space-x-4">
                                        <div class="flex-1">
                                            <label class="block text-sm font-medium mb-1" for="city">City <span class="text-rose-500">*</span></label>
                                            <input id="city" class="form-input w-full" type="text" />
                                        </div>
                                        <div class="flex-1">
                                            <label class="block text-sm font-medium mb-1" for="postal-code">Postal Code <span class="text-rose-500">*</span></label>
                                            <input id="postal-code" class="form-input w-full" type="text" />
                                        </div>
                                    </div>
                                    <!-- Street Address -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="street">Street Address <span class="text-rose-500">*</span></label>
                                        <input id="street" class="form-input w-full" type="text" />
                                    </div>
                                    <!-- Country -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="country">Country <span class="text-rose-500">*</span></label>
                                        <select id="country" class="form-select w-full">
                                            <option>USA</option>
                                            <option>Italy</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <a class="text-sm underline hover:no-underline" href="/onboarding/02">&lt;- Back</a>
                                    <a class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-auto" href="/onboarding/04">Next Step -&gt;</a>
                                </div>
                            </form>
    
                        </div>
                    </div>

                </div>

            </div>

            <!-- Image -->
            <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="http://platinumpluscapital.rapidstartup.io/images/onboarding-image.jpg" width="760" height="1024" alt="Onboarding" />
                <img class="absolute top-1/4 left-0 -translate-x-1/2 ml-8 hidden lg:block" src="http://platinumpluscapital.rapidstartup.io/images/auth-decoration.png" width="218" height="224" alt="Authentication decoration" />
            </div>

        </div>

    </main>

    </body>
</html>
