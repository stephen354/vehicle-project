<x-layout.default>


    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <script src="/assets/js/simple-datatables.js"></script>



<div class="flex items-center justify-end">
    <a href="{{ route('vehicle-usage--excel') }}" type="button" class="btn btn-primary">Export</a>
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
    
           
    <div x-data="multipleTable">
        <div class="panel mt-6">
            <h5 class=" mb-5 font-semibold text-lg dark:text-white-light">Vehicle Usage</h5>
            <div class="sm:mb-0 mb-4">
                
                <div class="flex items-center mt-2 flex-wrap sm:justify-start justify-center">
                    
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
        const data = @json($data);
        const dataJson = @json($data).map(v => [
            v.name,
            v.waiting,
            v.accept,
            v.decline
        ]);
        console.log(data);
        document.addEventListener("alpine:init", () => {
            Alpine.data("multipleTable", () => ({
                datatable2: null,
                init() {
                    

                    this.datatable2 = new simpleDatatables.DataTable('#myTable2', {
                        data: {
                            headings: ['Vehicle Name', 'Waiting Booking', 'Accept Booking', 'Decline Booking'],
                            data: dataJson
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [
                            {
                                select: 1,
                                render: (data, cell, row) => {
                                    return '<span class="badge text-sm bg-warning">' + data +
                                        '</span>';
                                },
                            },
                            {
                                select: 2,
                                render: (data, cell, row) => {
                                    return '<span class="badge text-sm bg-success">' + data +
                                        '</span>';
                                },
                            },
                            {
                                select: 3,
                                render: (data, cell, row) => {
                                    return '<span class="badge text-sm bg-danger">' + data +
                                        '</span>';
                                },
                            },
                            
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
