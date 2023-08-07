@extends('theme::layouts.app')

@section('content')

    <style>
        #right-panel {
            height: 470px;
        }

        input#name, input#address{
            background: #fff;
        }
    </style>

    <div class="flex px-8 mx-auto my-6 max-w-7xl xl:px-5">

        <!-- Left Settings Menu -->
    @include('theme::partials.sidebar')
    <!-- End Settings Menu -->


        <div id="right-panel" class="dark-section flex flex-col w-full bg-white border rounded-lg md:w-4/5 border-gray-150">
            <div class="dark-section flex flex-wrap items-center justify-between border-b border-gray-200 sm:flex-no-wrap">
                <div class="relative p-6">
                    <h3 class="text flex text-lg font-medium leading-6 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('dashboard/transactions')){{ 'text-gray-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-gray-500 group-focus:text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" /></svg>
                        @if(isset($section_title)){{ $section_title }}@else{{Auth::user()->name}} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') }} @endif
                    </h3>
                </div>
            </div>

            <div class="uk-card-body h-24 min-h-0 md:min-h-full">

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="relative flex flex-col px-10 py-8">
                        <div>
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="name" type="text" name="name" placeholder="Search for name" class="w-full form-input">
                            </div>
                        </div>

                        <div class="mt-5">
                            <label for="address" class="block text-sm font-medium leading-5 text-gray-700">Address</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="address" type="text" name="address" placeholder="Search for address" class="w-full form-input">
                            </div>
                        </div>

                        <div class="flex justify-end w-full mt-2">
                            <button class="flex self-end justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Search</button>
                        </div>

                    </div>
                </form>



            </div>
        </div>

    </div>

@endsection


