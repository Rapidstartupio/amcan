 <!-- Fonts -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Cards -->
<div class="grid grid-cols-12 gap-6">
    @include('theme::settings.partials.loan.fintech-intro')

    <div class="flex flex-col col-span-full xl:col-span-8 bg-white  shadow-lg rounded-sm border border-slate-200 ">
        <header class="px-5 py-4 border-b border-slate-100  flex items-center">
            <h2 class="font-semibold text-slate-800 ">Portfolio Returns</h2>
        </header>
        <div class="px-5 py-3">
            <div class="flex flex-wrap justify-between items-end">
                <div class="flex items-center">
                    <div class="text-3xl font-bold text-slate-800  mr-2">244.7%</div>
                    <div class="text-sm text-slate-500 "><span class="font-medium text-slate-800 ">17.4%</span> AVG</div>
                </div>
                <div id="fintech-card-01-legend" class="grow ml-2 mb-1">
                    <ul class="flex flex-wrap justify-end"></ul>
                </div>
            </div>
        </div>
        <div class="grow">
            <canvas id="fintech-card-01" width="800" height="300"></canvas>
        </div>
    </div>

    <div class="flex flex-col col-span-full xl:col-span-4 bg-gradient-to-b from-slate-700  to-slate-800  shadow-lg rounded-sm border border-slate-700">
        <header class="px-5 py-4 border-b border-slate-600 flex items-center">
            <h2 class="font-semibold text-slate-200">Active Cards</h2>
        </header>
    </div>
</div>

