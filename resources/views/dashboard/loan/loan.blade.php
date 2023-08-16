@extends('theme::layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        #right-panel {
            height: 675px;
        }
        #fintech-loan-sections 
        {
            margin: 20px;
        }
        .recent-repayment-table {
            height: 100%;
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('dashboard/loan')){{ 'text-gray-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-gray-500 group-focus:text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" /></svg>
                        @if(isset($section_title)){{ $section_title }}@else{{Auth::user()->name}} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') }} @endif
                    </h3>
                </div>
            </div>

            <div class="uk-card-body h-24 min-h-0 md:min-h-full">

                <div id="fintech-loan-sections">
                    <!-- Fonts -->
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

                    <!-- Cards -->
                    <div class="grid grid-cols-12 gap-6">
                        @include('dashboard.loan.fintech-intro')

                        <div class="flex flex-col col-span-full xl:col-span-8 bg-white  shadow-lg rounded-sm border border-slate-200 ">
                            <header class="px-5 py-4 border-b border-slate-100  flex items-center">
                                <h2 class="font-semibold text-slate-800 ">Repayment Schedule</h2>
                            </header>
                            <div class="px-5 py-3">
                                <div class="flex flex-wrap justify-between items-end">
                                    <div class="flex items-center">
                                        <div class="text-3xl font-bold text-slate-800  mr-2">89.7%</div>
                                        <div class="text-sm text-slate-500 "><span class="font-medium text-slate-800 ">17.4%</span> AVG</div>
                                    </div>
                                    <div id="fintech-card-01-legend" class="grow ml-2 mb-1">
                                        <ul class="flex flex-wrap justify-end"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="grow parent">
{{--                                <canvas id="chartjs-0" style="width:100%;max-width:600px"></canvas>--}}
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                                <script>
                                    const xValues = {!! json_encode($months) !!};
                                    const yValues = {!! json_encode($total_paid_amounts) !!};
                                    new Chart("myChart", {
                                        type: "line",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                                fill: true,
                                                lineTension: 0.2,
                                                backgroundColor: "rgba(51,64,84,0.6)",
                                                borderColor: "rgba(51,64,84,0.9)",
                                                borderWidth: 2.5,
                                                pointBorderWidth: 2.5,
                                                pointHoverRadius: 6,
                                                pointRadius: 3,
                                                pointBackgroundColor: "rgba(51,64,84,1)",
                                                pointHoverBackgroundColor: "rgb(29,53,84)",
                                                pointBorderColor: "rgba(51,64,84,1)",
                                                pointHoverBorderColor: "rgb(29,53,84)",
                                                steppedLine: false,
                                                data: yValues
                                            }]
                                        },
                                        options: {
                                            legend: {display: false},
                                            scales: {
                                                yAxes: [{ticks: {min: 30, max:300}}],
                                                xAxes: [{}],
                                            }
                                        }
                                    });
                                </script>

{{--                                <script>new Chart("chartjs-0", {"type":"line","data":{"labels":["January","February","March","April","May","June","July"],"datasets":[{"label":"My First Dataset","data":[65,59,80,81,56,55,40],"fill":true,"borderColor":"rgb(75, 192, 192)","lineTension":0.1}]},"options":{}});</script>--}}
                            </div>
                        </div>

                        <div class="flex flex-col col-span-full xl:col-span-4 bg-gradient-to-b from-slate-700  to-slate-800  shadow-lg rounded-sm border border-slate-700">
                            <header class="px-5 py-4 border-b border-slate-600 flex items-center">
                                <h2 class="font-semibold text-slate-200">Recent Repayments</h2>
                            </header>


                                <table class="recent-repayment-table w-full text-sm text-left text-gray-500">

                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            Paid To Date
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Date & Time
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($transactions as $transaction)
                                        <tr class="text-xs bg-white border-b hover:bg-gray-50">

                                            <td class="px-6 py-4">
                                                <b>${{$transaction->total_paid}}</b>
                                            </td>
                                            <td class="px-6 py-4">
                                                <b>{{$transaction->created_at->format('d/m/Y H:i:s')}}</b>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('transaction.view', $transaction->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                    </svg>
                                                </a>
                                                {{-- <a href="{{ route('transaction.view', $transaction->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Transaction</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>






            </div>
        </div>

    </div>

@endsection


