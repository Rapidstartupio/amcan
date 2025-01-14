@extends('theme::layouts.app')


@section('content')

	<div class="flex flex-col px-8 mx-auto my-6 xl:px-5 lg:flex-row max-w-7xl">

		<div class="flex flex-col items-center justify-center w-full px-10 py-16 mb-8 mr-6 bg-white dark:bg-gray-800 border  rounded-lg lg:mb-0 lg:flex-1 lg:w-1/3 dark:border-white border-gray-150">
			<img src="{{ Voyager::image($user->avatar) }}" class="w-24 h-24 border-4 border-gray-200 dark:border-white rounded-full">
			<h2 class="mt-8 text-2xl font-bold dark:text-white">{{ $user->name }}</h2>
			<p class="my-1 font-medium text-wave-blue dark:text-white">{{ '@' . $user->username }}</p>
			<div class="px-3 py-1 my-2 text-xs font-medium dark:text-white text-gray-600 bg-gray-200 dark:bg-gray-600 rounded">{{ $user->role->display_name }}</div>
			<p class="max-w-lg mx-auto mt-3 text-base text-center dark:text-white text-gray-500">{{ $user->profile('about') }}</p>
		</div>

		<div class="flex flex-col w-full p-10 overflow-hidden bg-white dark:bg-gray-800 dark:border-white border rounded-lg lg:w-2/3 border-gray-150 lg:flex-2">
			<p class="text-lg text-gray-600 dark:text-white">Your application info about {{ $user->name }} here</p>
		    <p class="mt-5 text-lg text-gray-600 dark:text-white">You can edit this template inside of <code class="px-2 py-1 font-mono text-base font-medium text-gray-600 bg-indigo-100 rounded-md">resources/views/{{ theme_folder('/profile.blade.php') }}</code></p>
		</div>

	</div>

@endsection
	