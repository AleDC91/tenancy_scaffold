<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="max-w-md text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            {{$category->name}}
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex justify-evenly">
                            <a href="{{ route('categories.edit', ['category' => $category]) }}"
                                class="font-medium text-blue-600  hover:underline me-5">Edit</a>
                            <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category?')">
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
