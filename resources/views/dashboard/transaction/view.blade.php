@extends('theme::layouts.app')

@section('content')
    <style>
        #right-panel
        {
            height: 820px;
        }
        .field-underline {
            width: 95%;
            margin-left: 1.5rem;
            height: 2px;
            /*background: #e5e7eb;*/
            border-radius: 50px;
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

                        {{-- @if(isset($section_title)){{ $section_title }}@else{{Auth::user()->name}} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') }} @endif--}}
                        {{Auth::user()->name}} Repayments
                    </h3>
                </div>
            </div>

            <div class="uk-card-body h-24 min-h-0 md:min-h-full">

            <div class="content-wrapper">
                    <div class="field-content">
                        <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Loan ID</strong></h3>
                        <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px"><b>#</b>{{ $transaction->loan_id }}</p>
                        <hr class="hr field-underline">
                    </div>
                    <div class="field-content">
                        <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Total Loan Amount</strong></h3>
                        <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px"><b>$</b>{{ $transaction['total_loan_amount'] }}</p>
                        <hr class="hr field-underline">
                    </div>
                    <div class="field-content">
                        <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Amount Being Paid</strong></h3>
                        <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px; margin-right: 30px"><b>$</b>{{ $transaction['amount'] }}</p>
                        <hr class="hr field-underline">
                    </div>
                    <div class="field-content">
                        <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Status</strong></h3>
                        <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px">{{ $transaction['status'] }}</p>
                        <hr class="hr field-underline">
                    </div>
                <div class="field-content">
                    <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Paid To Date</strong></h3>
                    <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px"><b>$</b>{{ $transaction['total_paid'] }}</p>
                    <hr class="hr field-underline">
                </div>
                    <div class="field-content">
                        <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Total Remaining Amount</strong></h3>
                        <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px"><b>$</b>{{ $transaction['total_loan_amount'] - $transaction['amount'] }}</p>
                        <hr class="hr field-underline">
                    </div>
                    <div class="field-content">
                        <h3 class="text flex text-lg font-small leading-6 text-gray-600 mt-5" style="margin-left: 30px"><strong>Date</strong></h3>
                        <p class="text flex text-lg font-small leading-6 text-gray-600 mt-5 mb-2" style="margin-left: 30px">{{ $transaction['created_at'] }}</p>
                        <hr class="hr field-underline">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
    </script>
@endsection



