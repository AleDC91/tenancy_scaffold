{{-- {{dd($deadline)}} --}}
<form class="max-w-md mx-auto" action="{{ route('deadlines.update', ['deadline' => $deadline]) }}"  method="POST">
    @csrf
    @method('PUT')
    <div class="relative z-0 w-full mb-8 group">
        <input type="text" name="deadline_name" value="{{$deadline->name}}" id="deadline_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="deadline_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deadline Name</label>
    </div>
    <div class="relative z-0 w-full mb-8 group">
        <input type="text" name="deadline_description" value="{{$deadline->description}}" id="deadline_description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
        <label for="deadline_description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
    </div>
    <div class="relative z-0 w-full mb-8 group">
        <input type="date" name="deadline_date" id="deadline_date" value={{$deadline->date}} 
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="deadline_date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date</label>
    </div>
    <div class="border-t border-b border-blue-600 p-5 pb-0 mb-4">
        <h3 class="mb-2 text-sm text-blue-600">Valid for categories</h3>

        {{-- {{dd($deadline->clientTypes)}} --}}
        @foreach (App\Models\ClientTypes::all() as $type)
            <div class="flex items-center mb-4">
                <input id="{{ 'type_' . $type->id }}" {{ $deadline->clientTypes->contains($type->id) ? 'checked' : '' }} name="client_types[]" type="checkbox" value="{{ $type->id }}" selected="selected"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="{{ 'type_' . $type->id }}"
                    class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">{{ $type->name }}</label>
            </div>
        @endforeach
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
  </form>
  
  