 <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <th scope="col" class="px-6 py-3">Date</th>
             <th scope="col" class="px-6 py-3">Client</th>
             <th scope="col" class="px-6 py-3">Message</th>
             <th scope="col" class="px-6 py-3">Priority</th>
             @if (!request()->routeIs('tenant.dashboard'))
                 <th scope="col" class="px-6 py-3">Read</th>
             @endif
         </thead>
         <tbody>
             @php

                 if (request()->routeIs('clients.show')) {
                     // dd(request()->route('client')->id);
                     $clientId = request()->route('client')->user->id;
                     $messages = $messages->where('user_id', $clientId)->sortByDesc('created_at');
                 }

                 if (request()->routeIs('tenant.dashboard')) {
                     $messages = $messages->sortByDesc('created_at')->where('read', false);
                 }
                 $user = Auth::user();

                 if ($user->hasRole('employee') && !$user->hasRole('admin')) {
                     $userId = $user->id;

                     $messages = $messages
                         ->filter(function ($message) use ($userId) {
                             return $message->client->employee_id == $userId;
                         })
                         ->sortByDesc('created_at');
                 } else {
                     $messages = $messages->sortByDesc('created_at');
                 }
             @endphp
             @foreach ($messages as $message)
                 @php
                     $class = $message->read ? '' : 'font-bold text-red bg-slate-200';
                 @endphp
                 <tr data-message-id="{{ $message->id }}" style="cursor:pointer;" class="{{ $class }}">

                     <td class="px-6 py-4 max-w-md">{{ $message->created_at->format('Y-m-d') }}</td>
                     <td class="px-6 py-4 max-w-md font-bold">{{$message->client ? $message->client->user->name : "" }}</td>

                     <td class="px-6 py-4 max-w-md">
                         {{ strlen($message->body) < 50 ? $message->body : Str::limit($message->body, 50) . '...' }}
                     </td>

                     @php
                         $class = '';
                         switch ($message->priority) {
                             case 'urgent':
                                 $class =
                                     'inline bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300';
                                 $text = "<p class='$class'>urgent</p>";
                                 break;
                             case 'normal':
                                 $class =
                                     'inline bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300';
                                 $text = "<p class='$class'>normal</p>";
                                 break;
                         }
                         echo "<td>$text</td>";
                     @endphp
                     @if (!request()->routeIs('tenant.dashboard'))
                         <td class="px-6 py-4">
                             @if ($message->read)
                                 <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                     <path
                                         d="M64 208.1L256 65.9 448 208.1v47.4L289.5 373c-9.7 7.2-21.4 11-33.5 11s-23.8-3.9-33.5-11L64 255.5V208.1zM256 0c-12.1 0-23.8 3.9-33.5 11L25.9 156.7C9.6 168.8 0 187.8 0 208.1V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V208.1c0-20.3-9.6-39.4-25.9-51.4L289.5 11C279.8 3.9 268.1 0 256 0z" />
                                 </svg>
                             @else
                                 <svg class="w-5 h-5" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                     <path
                                         d='M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z' />
                                 </svg>
                             @endif
                         </td>
                     @endif
                 </tr>
             @endforeach
         </tbody>
     </table>
     @push('app_scripts')
         @vite(['resources/js/markAsRead.js'])
     @endpush
 </div>
