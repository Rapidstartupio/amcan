@extends('theme::layouts.app')

@section('content')

    <style>
        #right-panel {
            height: 700px;
        }

        #transaction-table {
            margin: 20px 20px;
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

{{--                    @if(isset($section_title)){{ $section_title }}@else{{Auth::user()->name}} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') }} @endif--}}
                    {{Auth::user()->name}} Repayments
                    </h3>
                </div>
            </div>

            <div class="uk-card-body h-24 min-h-0 md:min-h-full">

                <div id="transaction-table" class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                            Loan Repayments
                            <p class="mt-1 text-sm font-normal text-gray-500 ">Browse those repayments, stay organized and get paid off faster.</p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Loan ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Loan Amount
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Amount Being Paid
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Paid To Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Remaining
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date & Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($transactions as $transaction)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    #{{$transaction->loan_id}}
                                </th>
                                <td class="px-6 py-4">
                                    ${{$transaction->total_loan_amount}}
                                </td>
                                <td class="px-6 py-4">
                                    ${{$transaction->amount}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$transaction->status}}
                                </td>
                                <td class="px-6 py-4">
                                    ${{$transaction->total_paid}}
                                </td>
                                <td class="px-6 py-4">
                                    ${{$transaction->total_loan_amount - $transaction->total_paid}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$transaction->created_at->format('d/m/Y H:i:s')}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('transaction.view', $transaction->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        {{ $transactions->links() }}

                        </tbody>
                    </table>
                </div>



            </div>
        </div>






    </div>

@endsection


