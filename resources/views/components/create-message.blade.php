 @if ($errors->any())
     <div class="p-4 m-4 text-sm text-center text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
         role="alert">
         <ul class="alert alert-warning">
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

 <form action={{ route('inbox.store') }} method="post" class="m-10 pb-36">
     @csrf


     <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
     <textarea id="message" rows="4" name="message"
         class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
         placeholder="Write your thoughts here..."></textarea>
         <div class="flex items-center my-4">
            <input id="priority" type="checkbox" name="priority" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="priority" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mark as urgent</label>
        </div>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
     <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-3">Submit</button>
 </form>
