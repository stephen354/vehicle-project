<x-layout.default>

    <!-- Error and Success Alert -->
@if(session('errors'))
<div x-data="{ open: true }" x-show="open" class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light">
    <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Danger!</strong>{{session('errors')}}</span>
    <button type="button" @click="open = false" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
</div>
@endif @if(session('success'))
<div  x-data="{ open: true }" x-show="open"
class="flex items-center p-3.5 rounded text-success bg-success-light dark:bg-success-dark-light">
<span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">{{session('success')}}</strong></span>
<button type="button"  @click="open = false" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
        stroke-linejoin="round" class="w-5 h-5">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
</button>
</div>
@endif
    <!-- stack forms -->
    <form action="/vehicle-order/store" method="POST">
        @csrf
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="panel">
                <h5 class="mb-5 font-semibold text-lg dark:text-white-light">Vehicle Order</h5>
                <div class="space-y-5">
                    <div>
                        <input type="text" name="name" placeholder="Enter Name" class="form-input" required/>
                    </div>
                    <div>
                        <input type="text" name="purpose" placeholder="Enter Purpose" class="form-input" required/>
                    </div>
                   
                    <div>
                        <label for="">Date and Time of Loan</label>
                        <span class="text-white-dark text-[11px] inline-block mt-1">Start</span>
                        <input type="date" name="date_start" placeholder="Enter Purpose" class="form-input" required/>
                    </div>
                    <div>
                        <span class="text-white-dark text-[11px] inline-block">End</span>
                        <input type="date" name="date_end" placeholder="Enter Purpose" class="form-input" required/>
                    </div>
                    <div>
                        <label for="">Approved By</label>
                        <select class="form-select mb-3" name="user_1" required>
                            <option selected value="">-</option>
                            @php
                                $divisi = ['','Supervisor','Manager','Fleet Manager','Logistic Manager'];
                            @endphp
                            @foreach ($user as $item)        
                                <option value="{{$item->id}}">{{$item->name}} - {{$divisi[$item->role-1]}}</option>
                            @endforeach
                        </select>
                        <select class="form-select mb-3" name="user_2" required>
                            <option selected value="">-</option>
                            @foreach ($user as $item)        
                                <option value="{{$item->id}}">{{$item->name}} - {{$divisi[$item->role-1]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                </div>
            </div>
            <div class="panel">
                <h5 class="mb-5 font-semibold text-lg dark:text-white-light">Vehicle</h5>
                <div class="space-y-5">
                    <div>
                        <label for="">Choice</label>
                        <select class="form-select" name="vehicle_id">
                            <option selected value="">-</option>
                            @foreach ($data as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="ctnTextarea">Description Vehicle</label>
                        <textarea id="ctnTextarea" name="description" rows="3" class="form-textarea" placeholder="Enter Textarea" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <script src="/assets/js/simple-datatables.js"></script>

              
    <div x-data="multipleTable">
        <div class="panel mt-6">
            <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Vehicles</h5>
            <table id="myTable2" class="whitespace-nowrap"></table>
        </div>
    </div>

    <script>
        
        const dataVehicle = @json($data).map(v => [
                v.name,            
                v.type,          
                v.status,        
                JSON.stringify(v)
            ]);
        document.addEventListener("alpine:init", () => {
            Alpine.data("multipleTable", () => ({
                datatable2: null,
                init() {
                    

                    this.datatable2 = new simpleDatatables.DataTable('#myTable2', {
                        data: {
                            headings: ['Name', 'Type Vehicle','Status', 'Action'
                            ],
                            data: dataVehicle
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [
                            
                            {
                                select: 2,
                                render: (data, cell, row) => {
                                    var statusColors = {
                                        "Ready": "success",
                                        "Booking": "primary",
                                        "Repair": "warning",
                                        "Broken": "danger", 
                                    };
                                    return '<span class="badge bg-' + statusColors[data] + '">' + data +
                                        '</span>';
                                },
                            },
                            {
                                select: 3,
                                sortable: false,
                                render: (data, cell, row) => {
                                    var d = JSON.parse(data);
                                    return `<div class="flex items-center">
                                            <button type="button" class="ltr:mr-2 rtl:ml-2" x-tooltip="Edit" @click="$dispatch('open-modal', {id:${d.id},name:'${d.name}',type:'${d.type}',status:'${d.status}',action:'Edit'})" data-id="1" >
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5" />
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                            </button>
                                            <button type="button" x-tooltip="Delete">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                                    <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </div>`;
                                },
                            }
                        ],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    });
                },

                formatDate(date) {
                    if (date) {
                        const dt = new Date(date);
                        const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt
                        .getMonth() + 1;
                        const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                        return day + '/' + month + '/' + dt.getFullYear();
                    }
                    return '';
                },

                randomColor() {
                    const color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                    const random = Math.floor(Math.random() * color.length);
                    return color[random];
                },

                
            }));
        });
    </script>
     <!-- start hightlight js -->
     <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
     <script src="/assets/js/highlight.min.js"></script>
     <!-- end hightlight js -->
 
     <script src="/assets/js/nice-select2.js"></script>

</x-layout.default>
