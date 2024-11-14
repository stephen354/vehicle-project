<x-layout.default>
    <script defer src="/assets/js/apexcharts.js"></script>
    <div x-data="sales">

    <div>
        <h5 class="font-semibold text-3xl dark:text-white-light">Dashboard</h5>
    </div>
        <div class="pt-5">
            <div class="grid xl:grid-cols-3 gap-6 mb-6">
               

                <div class="panel h-full">
                    <div class="flex items-center dark:text-white-light mb-5">
                        <h5 class="font-semibold text-lg">Vehicle Usage by Type</h5>
                        
                    </div>
                    <div class="space-y-9">
                        <div class="flex items-center">
                            <div class="w-9 h-9 ltr:mr-3 rtl:ml-3">
                                <div
                                    class="bg-secondary-light dark:bg-secondary text-secondary dark:text-secondary-light  rounded-full w-9 h-9 grid place-content-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.74157 18.5545C4.94119 20 7.17389 20 11.6393 20H12.3605C16.8259 20 19.0586 20 20.2582 18.5545M3.74157 18.5545C2.54194 17.1091 2.9534 14.9146 3.77633 10.5257C4.36155 7.40452 4.65416 5.84393 5.76506 4.92196M3.74157 18.5545C3.74156 18.5545 3.74157 18.5545 3.74157 18.5545ZM20.2582 18.5545C21.4578 17.1091 21.0464 14.9146 20.2235 10.5257C19.6382 7.40452 19.3456 5.84393 18.2347 4.92196M20.2582 18.5545C20.2582 18.5545 20.2582 18.5545 20.2582 18.5545ZM18.2347 4.92196C17.1238 4 15.5361 4 12.3605 4H11.6393C8.46374 4 6.87596 4 5.76506 4.92196M18.2347 4.92196C18.2347 4.92196 18.2347 4.92196 18.2347 4.92196ZM5.76506 4.92196C5.76506 4.92196 5.76506 4.92196 5.76506 4.92196Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex font-semibold text-white-dark mb-2">
                                    <h6>{{$tipe[0]['type'] ?? "Goods Transport"}}</h6>
                                    <p class="ltr:ml-auto rtl:mr-auto">{{$tipe[0]['accept'] ?? 0}}</p>
                                </div>
                                <div class="rounded-full h-2 bg-dark-light dark:bg-[#1b2e4b] shadow">
                                    <div
                                        class="bg-gradient-to-r from-[#7579ff] to-[#b224ef] w-full h-full rounded-full" style="width:{{($tipe[0]['division_result']??0)}}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="w-9 h-9 ltr:mr-3 rtl:ml-3">
                                <div
                                    class="bg-success-light dark:bg-success text-success dark:text-success-light rounded-full w-9 h-9 grid place-content-center">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.72848 16.1369C3.18295 14.5914 2.41018 13.8186 2.12264 12.816C1.83509 11.8134 2.08083 10.7485 2.57231 8.61875L2.85574 7.39057C3.26922 5.59881 3.47597 4.70292 4.08944 4.08944C4.70292 3.47597 5.59881 3.26922 7.39057 2.85574L8.61875 2.57231C10.7485 2.08083 11.8134 1.83509 12.816 2.12264C13.8186 2.41018 14.5914 3.18295 16.1369 4.72848L17.9665 6.55812C20.6555 9.24711 22 10.5916 22 12.2623C22 13.933 20.6555 15.2775 17.9665 17.9665C15.2775 20.6555 13.933 22 12.2623 22C10.5916 22 9.24711 20.6555 6.55812 17.9665L4.72848 16.1369Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle opacity="0.5" cx="8.60699" cy="8.87891" r="2"
                                            transform="rotate(-45 8.60699 8.87891)" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <path opacity="0.5" d="M11.5417 18.5L18.5208 11.5208" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex font-semibold text-white-dark mb-2">
                                    <h6>{{$tipe[1]['type'] ?? "Passenger Transport"}}</h6>
                                    <p class="ltr:ml-auto rtl:mr-auto">{{$tipe[1]['accept'] ?? '0'}}</p>
                                </div>
                                <div class="w-full rounded-full h-2 bg-dark-light dark:bg-[#1b2e4b] shadow">
                                    <div class="bg-gradient-to-r from-[#3cba92] to-[#0ba360] w-full h-full rounded-full" style="width:{{($tipe[1]['division_result']??0)}}%"
                                        ></div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
                <div class="panel h-full w-full">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Recent Orders</h5>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">Vehicle</th>
                                    <th>Booker Name</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th class="ltr:rounded-r-md rtl:rounded-l-md">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $statusApprove = ['Waiting','Accept','Decline'];
                                    $color = ['warning','success','danger'];
                                @endphp
                                @foreach ($approval as $item)
                                <tr class="text-white-dark hover:text-black dark:hover:text-white-light/90 group">
                                    <td class="min-w-[150px] text-black dark:text-white">
                                    <div class="flex">
                                        @if ($item->vehicle->type == "Goods Transport")
                                         <div class="w-9 h-9 ltr:mr-3 rtl:ml-3">
                                            <div
                                                class="bg-secondary-light dark:bg-secondary text-secondary dark:text-secondary-light  rounded-full w-9 h-9 grid place-content-center">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.74157 18.5545C4.94119 20 7.17389 20 11.6393 20H12.3605C16.8259 20 19.0586 20 20.2582 18.5545M3.74157 18.5545C2.54194 17.1091 2.9534 14.9146 3.77633 10.5257C4.36155 7.40452 4.65416 5.84393 5.76506 4.92196M3.74157 18.5545C3.74156 18.5545 3.74157 18.5545 3.74157 18.5545ZM20.2582 18.5545C21.4578 17.1091 21.0464 14.9146 20.2235 10.5257C19.6382 7.40452 19.3456 5.84393 18.2347 4.92196M20.2582 18.5545C20.2582 18.5545 20.2582 18.5545 20.2582 18.5545ZM18.2347 4.92196C17.1238 4 15.5361 4 12.3605 4H11.6393C8.46374 4 6.87596 4 5.76506 4.92196M18.2347 4.92196C18.2347 4.92196 18.2347 4.92196 18.2347 4.92196ZM5.76506 4.92196C5.76506 4.92196 5.76506 4.92196 5.76506 4.92196Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <path opacity="0.5"
                                                        d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        @else
                                        <div class="w-9 h-9 ltr:mr-3 rtl:ml-3">
                                            <div
                                                class="bg-success-light dark:bg-success text-success dark:text-success-light rounded-full w-9 h-9 grid place-content-center">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.72848 16.1369C3.18295 14.5914 2.41018 13.8186 2.12264 12.816C1.83509 11.8134 2.08083 10.7485 2.57231 8.61875L2.85574 7.39057C3.26922 5.59881 3.47597 4.70292 4.08944 4.08944C4.70292 3.47597 5.59881 3.26922 7.39057 2.85574L8.61875 2.57231C10.7485 2.08083 11.8134 1.83509 12.816 2.12264C13.8186 2.41018 14.5914 3.18295 16.1369 4.72848L17.9665 6.55812C20.6555 9.24711 22 10.5916 22 12.2623C22 13.933 20.6555 15.2775 17.9665 17.9665C15.2775 20.6555 13.933 22 12.2623 22C10.5916 22 9.24711 20.6555 6.55812 17.9665L4.72848 16.1369Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <circle opacity="0.5" cx="8.60699" cy="8.87891" r="2"
                                                        transform="rotate(-45 8.60699 8.87891)" stroke="currentColor"
                                                        stroke-width="1.5" />
                                                    <path opacity="0.5" d="M11.5417 18.5L18.5208 11.5208" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        @endif
                                       
                                            <p class="whitespace-nowrap">{{$item->vehicle->name}} <span
                                                    class="text-primary block text-xs">{{$item->vehicle->type}}</span></p>
                                        </div>
                                    </td>
                                    <td class="text-black">{{$item->booker_name}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->date_end}}</td>
                                    <td><span
                                            class="badge text-sm bg-{{$color[$item->status]}} shadow-md dark:group-hover:bg-transparent">{{$statusApprove[$item->status]}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel h-full w-full">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Top Vehicle Usage</h5>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr class="border-b-0">
                                    <th class="ltr:rounded-l-md rtl:rounded-r-md">Vehicle</th>
                                    <th>Accept Booking</th>
                                    <th>Waiting Booking</th>
                                    <th>Decline Booking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $statusApprove = ['Waiting','Accept','Decline'];
                                    $color = ['warning','success','danger'];
                                @endphp
                                @foreach ($dataVehicle as $item)
                                <tr class="text-white-dark hover:text-black dark:hover:text-white-light/90 group">
                                    <td class="min-w-[150px] text-black dark:text-white">
                                    <div class="flex">
                                        @if ($item->type == "Goods Transport")
                                         <div class="w-9 h-9 ltr:mr-3 rtl:ml-3">
                                            <div
                                                class="bg-secondary-light dark:bg-secondary text-secondary dark:text-secondary-light  rounded-full w-9 h-9 grid place-content-center">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.74157 18.5545C4.94119 20 7.17389 20 11.6393 20H12.3605C16.8259 20 19.0586 20 20.2582 18.5545M3.74157 18.5545C2.54194 17.1091 2.9534 14.9146 3.77633 10.5257C4.36155 7.40452 4.65416 5.84393 5.76506 4.92196M3.74157 18.5545C3.74156 18.5545 3.74157 18.5545 3.74157 18.5545ZM20.2582 18.5545C21.4578 17.1091 21.0464 14.9146 20.2235 10.5257C19.6382 7.40452 19.3456 5.84393 18.2347 4.92196M20.2582 18.5545C20.2582 18.5545 20.2582 18.5545 20.2582 18.5545ZM18.2347 4.92196C17.1238 4 15.5361 4 12.3605 4H11.6393C8.46374 4 6.87596 4 5.76506 4.92196M18.2347 4.92196C18.2347 4.92196 18.2347 4.92196 18.2347 4.92196ZM5.76506 4.92196C5.76506 4.92196 5.76506 4.92196 5.76506 4.92196Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <path opacity="0.5"
                                                        d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        @else
                                        <div class="w-9 h-9 ltr:mr-3 rtl:ml-3">
                                            <div
                                                class="bg-success-light dark:bg-success text-success dark:text-success-light rounded-full w-9 h-9 grid place-content-center">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.72848 16.1369C3.18295 14.5914 2.41018 13.8186 2.12264 12.816C1.83509 11.8134 2.08083 10.7485 2.57231 8.61875L2.85574 7.39057C3.26922 5.59881 3.47597 4.70292 4.08944 4.08944C4.70292 3.47597 5.59881 3.26922 7.39057 2.85574L8.61875 2.57231C10.7485 2.08083 11.8134 1.83509 12.816 2.12264C13.8186 2.41018 14.5914 3.18295 16.1369 4.72848L17.9665 6.55812C20.6555 9.24711 22 10.5916 22 12.2623C22 13.933 20.6555 15.2775 17.9665 17.9665C15.2775 20.6555 13.933 22 12.2623 22C10.5916 22 9.24711 20.6555 6.55812 17.9665L4.72848 16.1369Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <circle opacity="0.5" cx="8.60699" cy="8.87891" r="2"
                                                        transform="rotate(-45 8.60699 8.87891)" stroke="currentColor"
                                                        stroke-width="1.5" />
                                                    <path opacity="0.5" d="M11.5417 18.5L18.5208 11.5208" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        @endif
                                       
                                            <p class="whitespace-nowrap">{{$item->name}} <span
                                                    class="text-primary block text-xs">{{$item->type}}</span></p>
                                        </div>
                                    </td>
                                    <td><span
                                        class="badge bg-success text-sm shadow-md dark:group-hover:bg-transparent">{{$item->accept}}</span>
                                    </td>
                                    <td><span
                                        class="badge bg-warning text-sm shadow-md dark:group-hover:bg-transparent">{{$item->waiting}}</span>
                                    </td>
                                    <td><span
                                            class="badge bg-danger text-sm shadow-md dark:group-hover:bg-transparent">{{$item->decline}}</span>
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
</x-layout.default>
