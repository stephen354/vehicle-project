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


    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <script src="/assets/js/simple-datatables.js"></script>


    <div x-data="{ open: false , id:null,approve_id:null}" x-on:open-modal.window="open = true; id = $event.detail.id;approve_id = $event.detail.approve_id;" x-on:close-modal.window="open = false" class="mb-5">
                        
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
            :class="open && '!block'">
            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                <div x-show="open" x-transition x-transition.duration.300
                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                    <div
                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div class="font-bold text-lg"><span x-text="action">Add</span>Form Approval Booking</div>
                        <button type="button" class="text-white-dark hover:text-dark" @click="open = false">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-6 h-6">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </button>
                    </div>
                    <form action="/approval/store" method="POST">
                        @csrf
                    <div class="p-5">
                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">

                                <input type="text" name="booking_id" x-model="id" class="form-input mb-3" hidden/>
                                <input type="text" name="approve_id" x-model="approve_id" class="form-input mb-3" hidden/>
                                <div>
                                    <label for="ctnTextarea">Note</label>
                                    <textarea id="ctnTextarea" name="note" rows="3" class="form-textarea" placeholder="Enter Textarea" ></textarea>
                                </div>
                                <div>
                                    <label for="">Approval</label>
                                    <select class="form-select" name="status">
                                        <option selected value="1">Accept</option>
                                        <option value="2">Decline</option>
                                    </select>
                                </div>
                                
                           
                        </div>
                        <div class="flex justify-end items-center mt-8">
                           
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ openNote: false ,name:'',note:'',status:''}" x-on:open-modal-note.window="openNote = true;name = $event.detail.name;note = $event.detail.note;status = $event.detail.status" x-on:close-modal-note.window="openNote = false" class="mb-5">
                        
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
            :class="openNote && '!block'">
            <div class="flex items-start justify-center min-h-screen px-4" @click.self="openNote = false">
                <div x-show="openNote" x-transition x-transition.duration.300
                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                    <div
                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div class="font-bold text-lg">Approval BY <span x-text="name">Add</span></div>
                        <button type="button" class="text-white-dark hover:text-dark" @click="openNote = false">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-6 h-6">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5">
                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">

                                <div>
                                    <label for="ctnTextarea">Note :</label>
                                    <p x-text="note">Waiting</p>
                                </div>
                                
                        </div>
                        <div class="flex justify-end items-center mt-8"> 
                            <button type="submit" class="btn btn-secondary ltr:ml-4 rtl:mr-4" @click="openNote = false">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal Delete --}}
    <div x-data="{ openDelete: false ,id:''}" x-on:open-modal-delete.window="openDelete = true;id = $event.detail.id;" x-on:close-modal-delete.window="openDelete = false" class="mb-5">
                        
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
            :class="openDelete && '!block'">
            <div class="flex items-start justify-center min-h-screen px-4" @click.self="openDelete = false">
                <div x-show="openDelete" x-transition x-transition.duration.300
                    class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                    <div
                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div class="font-bold text-lg">Delete <span x-text="name">Add</span></div>
                        <button type="button" class="text-white-dark hover:text-dark" @click="openDelete = false">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="w-6 h-6">
                                <line x1="18" y1="6" x2="6" y2="18">
                                </line>
                                <line x1="6" y1="6" x2="18" y2="18">
                                </line>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5">
                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">

                                <div>
                                    <p>Are you sure to delete this order?</p>
                                </div>
                                
                        </div>
                        <form action="/vehicle-order/delete" method="POST">
                            @csrf
                            <input type="text" name="id" x-model="id" hidden>
                            <div class="flex justify-end items-center mt-8"> 
                                <button type="submit" class="btn btn-danger ltr:ml-4 rtl:mr-4">Delete</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END Delete Modal --}}
           
    <div x-data="multipleTable">
        <div class="panel mt-6">
            <h5 class="md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">Approval Booking</h5>
            <div class="sm:mb-0 mb-4">
                
                <div class="flex items-center mt-2 flex-wrap sm:justify-start justify-center">
                    <div class="flex items-center ltr:mr-4 rtl:ml-4">
                        <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-primary"></div>
                        <div>Approval</div>
                    </div>
                    <div class="flex items-center ltr:mr-4 rtl:ml-4">
                        <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-warning"></div>
                        <div>Waiting</div>
                    </div>
                    <div class="flex items-center ltr:mr-4 rtl:ml-4">
                        <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-success"></div>
                        <div>Accept</div>
                    </div>
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 bg-danger"></div>
                        <div>Decline</div>
                    </div>
                </div>
            </div>
            <table id="myTable2" class="whitespace-nowrap"></table>
        </div>
    </div>

    <script>
        const id = '{{ Session::get('id') }}';
        console.log(id);
        const data = @json($data);
        const dataJson = @json($data).map(v => [
            v.booker_name,
            v.purpose,
            v.vehicle.name,
            v.vehicle_condition,
            v.date,
            v.date_end,
            JSON.stringify(v),
            JSON.stringify(v),
            JSON.stringify(v)
        ]);
        console.log(dataJson);
        document.addEventListener("alpine:init", () => {
            Alpine.data("multipleTable", () => ({
                datatable2: null,
                init() {
                    

                    this.datatable2 = new simpleDatatables.DataTable('#myTable2', {
                        data: {
                            headings: ['Booker Name', 'Purpose', 'Vehicle', 'Vehicle Condition', 'Booking Start',
                                'Booking End', 'Approved By', 'Approved By', 'Action'
                            ],
                            data: dataJson
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [
                            {
                                select: 6,
                                render: (data, cell, row) => {
                                    var data = JSON.parse(data);
                                    var color = ['warning','success','danger'];
                                    var message = ['Wait','Accept','Decline'];
                                    var output = data.approve[0].users.name;
                                    output += ` <button class="badge text-sm bg-${color[data.approve[0].status]} flex items-center justify-between" @click="$dispatch('open-modal-note',{name:'${data.approve[0].users.name}',note:'${data.approve[0].note}',status:'${data.approve[0].status}'})"> ${message[data.approve[0].status]}</button>`;
                                    if(data.approve[0].status == 0 && data.approve[0].users.id == id){
                                        output = `You <button type="button" class="badge text-sm bg-primary flex items-center justify-between" @click="$dispatch('open-modal',{id:'${data.id}',approve_id:'${data.approve[0].id}'})">Approval</button>`
                                    }
                                    return output;
                                },
                            },
                            {
                                select: 7,
                                render: (data, cell, row) => {
                                    var data = JSON.parse(data);
                                    var color = ['warning','success','danger'];
                                    var message = ['Wait','Accept','Decline'];
                                    var output = data.approve[1].users.name;
                                    output += ` <button class="badge text-sm bg-${color[data.approve[1].status]} flex items-center justify-between" @click="$dispatch('open-modal-note',{name:'${data.approve[1].users.name}',note:'${data.approve[1].note}',status:'${data.approve[1].status}'})"> ${message[data.approve[1].status]}</button>`;
                                   if(data.approve[1].status == 0 && data.approve[1].users.id == id){
                                        output = `You <button type="button" class="badge text-sm bg-primary flex items-center justify-between" @click="$dispatch('open-modal',{id:'${data.id}',approve_id:'${data.approve[1].id}'})">Approval</button>`
                                    }
                                    return output;
                                },
                            },
                            {
                                select: 8,
                                sortable: false,
                                render: (data, cell, row) => {
                                    var d = JSON.parse(data);
                                    return `<div class="flex items-center">
                                            <button type="button" x-tooltip="Delete" @click="$dispatch('open-modal-delete', {id:${d.id}})">
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

                
            }));
        });
    </script>
     <!-- start hightlight js -->
     <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
     <script src="/assets/js/highlight.min.js"></script>
     <!-- end hightlight js -->
 
     <script src="/assets/js/nice-select2.js"></script>

</x-layout.default>
