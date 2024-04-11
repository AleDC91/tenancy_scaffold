<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Employee
                </th>
                <th scope="col" class="px-6 py-3">
                    Clients
                </th>
                <th scope="col" class="px-6 py-3">
                    Permissions
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src={{ $employee->profile_image }} alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $employee->name }}</div>
                            <div class="font-normal text-gray-500">{{ $employee->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        25
                    </td>
                    <td class="px-6 py-4">
                        permissions list
                    </td>

                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                        </a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>
