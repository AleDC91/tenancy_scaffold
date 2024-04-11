<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Days
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deadlines as $deadline)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/deadlines/{{ $deadline->id }}">
                            {{ $deadline->name }}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $deadline->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $deadline->date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ now()->diffInDays($deadline->date) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-evenly">
                            <a href="{{ route('deadlines.edit', ['deadline' => $deadline]) }}"  class="font-medium text-blue-600  hover:underline me-5">Edit</a>
                            <form action="{{ route('deadlines.destroy', ['deadline' => $deadline]) }}" 
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this deadline?')">
                                @csrf
                                @method('delete')
                            <button type="submit" class="font-medium text-red-600  hover:underline">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
