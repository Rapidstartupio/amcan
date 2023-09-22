@extends('theme::layouts.app')

@section('content')

<style>
    /* #right-panel {
        height: 700px; 
    }*/

    input#name,
    input#address {
        background: #fff;
    }

    .coming-soon {
        margin-top: 50px;
    }

    div.coming-soon h1 {
        font-size: 30px;
        font-weight: bold;
        font-family: unset;
        color: #5b5a63;
        text-align: center;
        margin-bottom: 40px;
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 mr-3 -ml-1 @if(Request::is('dashboard/credit-health')){{ 'text-gray-500' }}@else{{ 'text-gray-400' }}@endif transition duration-150 ease-in-out group-hover:text-gray-500 group-focus:text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"   />
                    </svg>
                    @if(isset($section_title)){{ $section_title }}@else{{Auth::user()->name}} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') }} @endif
                </h3>
            </div>
        </div>

        <div class="uk-card-body ">

            <form action="retrieve_report_id_form" method="POST" enctype="multipart/form-data" id="retrieve_report_id_form">
                <div class="relative flex flex-col px-10 py-8">
                    <h2 class="text-2xl mb-4 text-gray-900">Personal Info</h2>
                    <div>
                        <label for="firstName" class="block text-sm font-medium leading-5 text-gray-700">First Name</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="firstName" type="text" name="firstName" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="lastName" class="block text-sm font-medium leading-5 text-gray-700">Last Name</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="lastName" type="text" name="lastName" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="middle_name" class="block text-sm font-medium leading-5 text-gray-700">Middle Name</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="middleName" type="text" name="middleName" placeholder="" class="w-full form-input">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="dob" class="block text-sm font-medium leading-5 text-gray-700">Date Of Birth</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="dob" type="date" name="dob" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>

                    <h2 class="text-2xl my-4 text-gray-900">Address</h2>

                    <div class="mt-5">
                        <label for="civicNumber" class="block text-sm font-medium leading-5 text-gray-700">civicNumber</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="civicNumber" type="text" name="civicNumber" placeholder="" class="w-full form-input">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="streetName" class="block text-sm font-medium leading-5 text-gray-700">streetName</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="streetName" type="text" name="streetName" placeholder="" class="w-full form-input">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="suite" class="block text-sm font-medium leading-5 text-gray-700">suite</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="suite" type="text" name="suite" placeholder="" class="w-full form-input">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="city" class="block text-sm font-medium leading-5 text-gray-700">city</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="city" type="text" name="city" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="province" class="block text-sm font-medium leading-5 text-gray-700">province</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="province" type="text" name="province" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="postalCode" class="block text-sm font-medium leading-5 text-gray-700">postalCode</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="postalCode" type="text" name="postalCode" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="postalCode" class="block text-sm font-medium leading-5 text-gray-700">idpKey</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="idpKey" type="text" name="idpKey" placeholder="" class="w-full form-input" required>
                        </div>
                    </div>



                    <div class="flex justify-end w-full mt-2">
                        <button id="search-btn" class="flex self-end justify-center w-auto px-4 py-2 mt-5 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-wave-600 hover:bg-wave-500 focus:outline-none focus:border-wave-700 focus:shadow-outline-wave active:bg-wave-700">Search</button>
                    </div>

                </div>
            </form>


            <!-- <div class="coming-soon">
                <h1>Coming Soon!</h1>

                <svg id="e4e579b4-5122-4d29-876c-085905a2d49a" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="655" height="413.67951" viewBox="0 0 655 413.67951">
                    <path d="M689.063,372.583a122.04116,122.04116,0,0,1,10.10051-38.51722q2.27961-5.09249,5.01812-9.96076a.7438.7438,0,0,0-1.28354-.75026,123.7286,123.7286,0,0,0-13.7678,37.98231q-1.03367,5.58355-1.55378,11.24593c-.08811.95214,1.39893.94613,1.48649,0Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="435.2819" cy="73.9144" r="9.4144" fill="#e6e6e6" />
                    <path d="M690.026,372.83307a79.17357,79.17357,0,0,1,6.55267-24.98791q1.47888-3.30374,3.25549-6.462a.48254.48254,0,0,0-.83269-.48673,80.26825,80.26825,0,0,0-8.93182,24.6409q-.67059,3.6223-1.008,7.29575c-.05716.6177.90755.6138.96436,0Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="429.66984" cy="93.66195" r="6.10756" fill="#e6e6e6" />
                    <path d="M688.80883,372.25653a79.17368,79.17368,0,0,1-10.2024-23.73277q-.86592-3.51453-1.40764-7.09749a.48253.48253,0,0,0-.95592.12838,80.26823,80.26823,0,0,0,8.11306,24.92247q1.69918,3.26856,3.69253,6.37254c.33485.5222,1.09311-.07422.76037-.59313Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="403.73518" cy="93.23322" r="6.10756" fill="#e6e6e6" />
                    <path d="M670.05906,377.66024v-12a4.50508,4.50508,0,0,1,4.5-4.5h28a4.50508,4.50508,0,0,1,4.5,4.5v12a4.50508,4.50508,0,0,1-4.5,4.5h-28A4.50508,4.50508,0,0,1,670.05906,377.66024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <path d="M701.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,701.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="413.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="413.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M731.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,731.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="443.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="443.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M761.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,761.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="473.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="473.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M777.55906,382.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,777.55906,382.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="489.05906" y="90.5" width="20" height="4" fill="#ccc" />
                    <rect x="489.05906" y="121.5" width="20" height="4" fill="#ccc" />
                    <path d="M807.55906,382.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,807.55906,382.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="519.05906" y="90.5" width="20" height="4" fill="#ccc" />
                    <rect x="519.05906" y="121.5" width="20" height="4" fill="#ccc" />
                    <path d="M837.55906,382.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,837.55906,382.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="549.05906" y="90.5" width="20" height="4" fill="#ccc" />
                    <rect x="549.05906" y="121.5" width="20" height="4" fill="#ccc" />
                    <path d="M698.55906,463.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,698.55906,463.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="410.05906" y="171.5" width="20" height="4" fill="#ccc" />
                    <rect x="410.05906" y="202.5" width="20" height="4" fill="#ccc" />
                    <path d="M728.55906,463.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,728.55906,463.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="440.05906" y="171.5" width="20" height="4" fill="#ccc" />
                    <rect x="440.05906" y="202.5" width="20" height="4" fill="#ccc" />
                    <path d="M758.55906,463.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,758.55906,463.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="470.05906" y="171.5" width="20" height="4" fill="#ccc" />
                    <rect x="470.05906" y="202.5" width="20" height="4" fill="#ccc" />
                    <path d="M791.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,791.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="503.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="503.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M821.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,821.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="533.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="533.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M851.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,851.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="563.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="563.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M881.55906,301.16024h-12a4.50507,4.50507,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h12a4.50508,4.50508,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,881.55906,301.16024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <rect x="593.05906" y="9.5" width="20" height="4" fill="#ccc" />
                    <rect x="593.05906" y="40.5" width="20" height="4" fill="#ccc" />
                    <path d="M926.5,302.66024h-285a1,1,0,0,1,0-2h285a1,1,0,0,1,0,2Z" transform="translate(-272.5 -243.16024)" fill="#ccc" />
                    <path d="M926.5,383.66024h-285a1,1,0,0,1,0-2h285a1,1,0,0,1,0,2Z" transform="translate(-272.5 -243.16024)" fill="#ccc" />
                    <path d="M926.5,464.66024h-285a1,1,0,0,1,0-2h285a1,1,0,0,1,0,2Z" transform="translate(-272.5 -243.16024)" fill="#ccc" />
                    <path d="M854.063,453.583a122.04116,122.04116,0,0,1,10.10051-38.51722q2.27961-5.09249,5.01812-9.96076a.7438.7438,0,0,0-1.28354-.75026,123.7286,123.7286,0,0,0-13.7678,37.98231q-1.03367,5.58355-1.55378,11.24593c-.08811.95214,1.39893.94613,1.48649,0Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="600.2819" cy="154.9144" r="9.4144" fill="#e6e6e6" />
                    <path d="M855.026,453.83307a79.17357,79.17357,0,0,1,6.55267-24.98791q1.47888-3.30374,3.25549-6.462a.48254.48254,0,0,0-.83269-.48673,80.26825,80.26825,0,0,0-8.93182,24.6409q-.67059,3.6223-1.008,7.29575c-.05716.6177.90755.6138.96436,0Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="594.66984" cy="174.66195" r="6.10756" fill="#e6e6e6" />
                    <path d="M853.80883,453.25653a79.17368,79.17368,0,0,1-10.2024-23.73277q-.86592-3.51453-1.40764-7.09749a.48253.48253,0,0,0-.95592.12838,80.26823,80.26823,0,0,0,8.11306,24.92247q1.69918,3.26856,3.69253,6.37254c.33485.5222,1.09311-.07422.76037-.59313Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="568.73518" cy="174.23322" r="6.10756" fill="#e6e6e6" />
                    <path d="M835.05906,458.66024v-12a4.50508,4.50508,0,0,1,4.5-4.5h28a4.50508,4.50508,0,0,1,4.5,4.5v12a4.50508,4.50508,0,0,1-4.5,4.5h-28A4.50508,4.50508,0,0,1,835.05906,458.66024Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <path d="M654.5,606.66024h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-272.5 -243.16024)" fill="#3f3d56" />
                    <circle cx="199.05906" cy="205.5" r="27" fill="#2f2e41" />
                    <polygon points="173.405 378.826 172.69 366.588 219.556 358.003 220.612 376.067 173.405 378.826" fill="#ffb8b8" />
                    <path d="M436.62166,598.16324h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H421.7348a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,436.62166,598.16324Z" transform="translate(747.34041 -113.14222) rotate(86.65462)" fill="#2f2e41" />
                    <polygon points="193.789 378.714 186.004 388.185 145.768 362.666 157.257 348.688 193.789 378.714" fill="#ffb8b8" />
                    <path d="M454.38952,629.78677h23.64386a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H439.50266a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,454.38952,629.78677Z" transform="translate(-597.31958 343.86136) rotate(-50.58212)" fill="#2f2e41" />
                    <path d="M443.88663,577.83023l-5.31975,25.07884a4,4,0,0,0,3.84843,4.8295l52.29785.84351a4,4,0,0,0,4.00364-4.69462l-4.57453-25.92236a4,4,0,0,0-3.93914-3.30486H447.79957A4,4,0,0,0,443.88663,577.83023Z" transform="translate(-272.5 -243.16024)" fill="#2f2e41" />
                    <path d="M452.55906,586.66024s-51-32-61-15c-5,8.5-2.5,16.75,1.25,22.875a34.63053,34.63053,0,0,0,14.4025,12.89112l41.3475,20.23388,15-16-10-9Z" transform="translate(-272.5 -243.16024)" fill="#2f2e41" />
                    <path d="M478.55906,581.66024s66-19,53,17-62,22-62,22l-5-15,17-12Z" transform="translate(-272.5 -243.16024)" fill="#2f2e41" />
                    <circle cx="199.39764" cy="211.66535" r="24.56103" fill="#ffb8b8" />
                    <path d="M473.18454,585.629a131.99386,131.99386,0,0,1-30.25708-3.98633l-.29248-.08007-13.70556-63.04493a23.2247,23.2247,0,0,1,14.93286-26.94335,80.45969,80.45969,0,0,1,51.29956-1.02442h.00024a23.46956,23.46956,0,0,1,15.635,27.76465l-15.30835,63.19531-.21557.10254C488.91135,584.62606,480.956,585.629,473.18454,585.629Z" transform="translate(-272.5 -243.16024)" fill="#ccc" />
                    <path d="M454.77438,590.52651a10.05573,10.05573,0,0,1,14.47536-5.31221l26.98651-23.42452,2.44163,18.40848-26.00117,19.4221a10.11027,10.11027,0,0,1-17.90233-9.09385Z" transform="translate(-272.5 -243.16024)" fill="#ffb8b8" />
                    <path d="M480.51218,595.63583a4.53353,4.53353,0,0,1-1.29639-.19043,4.45263,4.45263,0,0,1-2.9624-2.81641l-3.25732-9.22851a4.472,4.472,0,0,1,1.30224-4.90235l36.7688-22.07422L496.573,491.76278l.36865-.08887c.14991-.0371,15.00025-3.417,21.0857,12.81055,4.26147,11.36524,20.03149,36.07715,18.91894,52.77637a14.88461,14.88461,0,0,1-12.322,13.72754l-41.38818,23.71289A4.456,4.456,0,0,1,480.51218,595.63583Z" transform="translate(-272.5 -243.16024)" fill="#ccc" />
                    <path d="M484.63609,588.33293a10.05575,10.05575,0,0,0-14.47536-5.31221l-26.9865-23.42452-2.44163,18.40848,26.00117,19.4221a10.11027,10.11027,0,0,0,17.90232-9.09385Z" transform="translate(-272.5 -243.16024)" fill="#ffb8b8" />
                    <path d="M461.60593,595.63583a4.456,4.456,0,0,1-2.72388-.93457l-44.38818-21.71289a14.88461,14.88461,0,0,1-12.322-13.72754c-1.11255-16.69922,17.65747-43.41113,21.91894-54.77637,6.085-16.22754,20.93555-12.84863,21.0857-12.81055l.36865.08887L428.051,558.42391l39.7688,20.07422a4.472,4.472,0,0,1,1.30224,4.90235l-3.25732,9.22851a4.45263,4.45263,0,0,1-2.9624,2.81641A4.5348,4.5348,0,0,1,461.60593,595.63583Z" transform="translate(-272.5 -243.16024)" fill="#ccc" />
                    <path d="M514.55908,605.66016h-89a7.00818,7.00818,0,0,1-7-7v-49a7.00818,7.00818,0,0,1,7-7h89a7.00817,7.00817,0,0,1,7,7v49A7.00818,7.00818,0,0,1,514.55908,605.66016Z" transform="translate(-272.5 -243.16024)" fill="#6c63ff" />
                    <circle cx="197.55906" cy="331" r="6" fill="#fff" />
                    <path d="M447.09061,453.82593c-1.45566-3.6923.93266-8.09242,4.47568-9.881s7.81846-1.44843,11.60824-.26964c3.18484.99063,6.16976,2.52588,9.27688,3.73845a20.76152,20.76152,0,0,0,9.75287,1.73691c3.31428-.37431,6.61291-2.23278,7.96907-5.28,1.40574-3.15859.44963-7.01316-1.71516-9.7088a18.79922,18.79922,0,0,0-8.61171-5.5348c-7.3075-2.57443-15.74829-2.64969-22.53234,1.0925s-11.39446,11.7102-9.99219,19.33" transform="translate(-272.5 -243.16024)" fill="#2f2e41" />
                    <path d="M305.16247,594.9787A122.0417,122.0417,0,0,1,315.263,556.46148q2.27961-5.09249,5.01813-9.96076a.7438.7438,0,0,0-1.28354-.75026,123.72825,123.72825,0,0,0-13.7678,37.98231q-1.03366,5.58356-1.55378,11.24593c-.08811.95214,1.39893.94613,1.48648,0Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="51.38142" cy="296.31007" r="9.4144" fill="#6c63ff" />
                    <path d="M306.1255,595.22874a79.1741,79.1741,0,0,1,6.55267-24.98791q1.47889-3.30373,3.25549-6.462a.48254.48254,0,0,0-.83269-.48673,80.26852,80.26852,0,0,0-8.93181,24.64089q-.67059,3.62232-1.008,7.29576c-.05716.6177.90755.6138.96435,0Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="45.76935" cy="316.05762" r="6.10756" fill="#6c63ff" />
                    <path d="M304.90835,594.6522a79.174,79.174,0,0,1-10.20241-23.73277q-.86592-3.51453-1.40763-7.09749a.48253.48253,0,0,0-.95592.12838,80.26809,80.26809,0,0,0,8.11306,24.92246q1.69919,3.26857,3.69252,6.37255c.33485.5222,1.09311-.07422.76038-.59313Z" transform="translate(-272.5 -243.16024)" fill="#e6e6e6" />
                    <circle cx="19.8347" cy="315.62888" r="6.10756" fill="#6c63ff" />
                    <path d="M286.15857,600.05591v-12a4.50508,4.50508,0,0,1,4.5-4.5h28a4.50508,4.50508,0,0,1,4.5,4.5v12a4.50508,4.50508,0,0,1-4.5,4.5h-28A4.50508,4.50508,0,0,1,286.15857,600.05591Z" transform="translate(-272.5 -243.16024)" fill="#f2f2f2" style="isolation:isolate" />
                    <path d="M586.90885,614.06085c0,6.57707-5.33178,9.56657-11.90885,9.56657s-11.90885-2.9895-11.90885-9.56657S565.73756,599.80972,575,602.45614C584.26244,598.48652,586.90885,607.48377,586.90885,614.06085Z" transform="translate(-272.5 -243.16024)" fill="#ff6584" />
                    <path d="M574.41992,605.53711a1.90366,1.90366,0,0,1-1.89111-1.65918c-.39429-3.28125-2.56763-9.708-3.48364-12.31836l-.00025-.001a1.703,1.703,0,0,1,.22022-1.5664,1.78652,1.78652,0,0,1,2.66333-.19239,1.70477,1.70477,0,0,1,.46826,1.27637c-.17944,3.35059,2.26294,8.76465,3.73486,11.69434a1.90795,1.90795,0,0,1-1.50976,2.75586A1.76339,1.76339,0,0,1,574.41992,605.53711Z" transform="translate(-272.5 -243.16024)" fill="#3f3d56" />
                    <path d="M583.232,598.14572c4.13393-3.38342.89056-10.30763-4.28341-8.9784a4.17809,4.17809,0,0,0-1.8637.99416c-3.17381,2.99811-3.66567,10.66906-3.66567,10.66906S579.02377,601.58992,583.232,598.14572Z" transform="translate(-272.5 -243.16024)" fill="#3f3d56" />
                </svg>
            </div> -->


        </div>
    </div>

</div>

@endsection

@section('javascript')
<script>
    document.getElementById('retrieve_report_id_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        var searchBtn = document.getElementById('search-btn');
        searchBtn.disabled = true;
        // Get the form data
        const formData = new FormData(event.target);

        // Convert the form data to a JSON object
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        axios.post(
                "/credithealth/retrieve-reportid", data)
            .then(response => {
                console.log(response);
                if (response.data.success) {
                    setTimeout(function() {
                        popToast('success', "Report Id Found: " + response.data.data);
                        window.location.reload();
                    }, 15);
                } else {
                    setTimeout(function() {
                        popToast('warning', response.data.error.message);
                    }, 15);
                }

                searchBtn.disabled = false;
            })
            .catch(res => {
                console.log(res);
                if (res.data.error) {
                    setTimeout(function() {
                        popToast('danger', res.data.error);
                    }, 10);
                }
                searchBtn.disabled = false;
            });

    });
</script>
@endsection