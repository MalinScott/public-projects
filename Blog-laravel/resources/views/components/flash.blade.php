@if(session()->has('success'))
    <div x-data="{show: true}"
         x-show="show"
         x-init="setTimeout(()=> show = false, 9000)" class="fixed bottom-0 right-3 bg-green-100  p-2 px-4 rounded-xl bottom-3 text-sm">
        <p>{{session('success')}}</p>
    </div>
@endif
