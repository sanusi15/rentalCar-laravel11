<x-layout>
    <div class="w-full rounded-md bg-slate-50  p-4">
        <div class="flex justify-end">
            
            <button class="flex items-center justify-center mb-5 gap-2 px-4 py-2 bg-blue-600 rounded-md text-sm font-normal text-white ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                <span>
                    <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><title>add_line</title><g id="add_line" fill='none' fill-rule='nonzero'><path d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z'/><path fill='#FFFFFF' d='M11 20a1 1 0 1 0 2 0v-7h7a1 1 0 1 0 0-2h-7V4a1 1 0 1 0-2 0v7H4a1 1 0 1 0 0 2h7v7Z'/></g></svg>
                </span>
                Add Booking
            </button>
        </div>
        <div class="w-full max-w-full">
            <div class="table-responsive">
                <table class="datatable mytable table-flush text-slate-500" datatable>
                    <thead class="thead-light">
                        <tr>
                            <td width="10px">No</td>
                            <td width="250px">Customer</td>
                            <td>Car Type</td>
                            <td>Start Time</td>
                            <td>End Time</td>
                            <td>Duration</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-normal leading-normal text-sm">1</td>
                            <td class="font-normal leading-normal text-sm">Tiger Nixon</td>
                            <td class="font-normal leading-normal text-sm">Start Time</td>
                            <td class="font-normal leading-normal text-sm">End</td>
                            <td class="font-normal leading-normal text-sm">61</td>
                            <td class="font-normal leading-normal text-sm">$320,800</td>
                            <td class="font-normal leading-normal text-sm">$320,800</td>
                            <td class="font-normal leading-normal text-sm">$320,800</td>
                        </tr>
                        <tr>
                            <td class="font-normal leading-normal text-sm">2</td>
                            <td class="font-normal leading-normal text-sm">Garrett Winters Lorem</td>
                            <td class="font-normal leading-normal text-sm">Accountant</td>
                            <td class="font-normal leading-normal text-sm">Tokyo</td>
                            <td class="font-normal leading-normal text-sm">63</td>
                            <td class="font-normal leading-normal text-sm">$170,750</td>
                            <td class="font-normal leading-normal text-sm">$170,750</td>
                            <td class="font-normal leading-normal text-sm">$170,750</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
    <x-slot:customjs>{{$jsfile}}</x-slot:customjs>
</x-layout>