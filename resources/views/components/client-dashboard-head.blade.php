@php
    $user = Auth::user()->name;
@endphp
<div class="grid lg:grid-cols-2 p-8 justify-between">

    <div class="me-8">
        <h2 class="text-3xl my-4">Welcome, {{$user}}!</h2>
        <p class="text-lg">Here you can see your data, load your documents and keep in touch with {{tenant()->domains->first()->company}}</p>
    </div>
    <div class="client-dashboard-buttons w-full flex items-center justify-center gap-3">
        <button class="py-3 px-4 bg-indigo-800 text-white rounded-lg">
            Load Documents
        </button>
        <button class="py-3 px-4 bg-green-800 text-white rounded-lg">
            Send Email
        </button>
    </div>
</div>