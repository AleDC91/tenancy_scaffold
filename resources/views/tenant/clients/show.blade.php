@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <h1 class="text-2xl lg:text-3xl text-center my-6">{{ $client->user->name }}
                <a class="float-end me-12" href="/clients/{{ $client->id }}/edit">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                    </svg>
                </a>
            </h1>
            <div class="flex justify-center items-center mt-24">
                <div class="rounded-full overflow-hidden">
                    <img src={{ asset($client->user->profile_image) }} alt="">
                </div>
                <div>
                    <div class="mb-4">
                        <h4 class="text-xl">Email:</h4>
                        <a href="mailto:{{ $client->user->email }}">{{ $client->user->email }}</a>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-xl">Job:</h4>
                        <p>{{ $client->job }}</p>
                        <p>{{ $client->job_description }}</p>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-xl">CF:</h4>
                        <p>{{ strtoupper($client->CF) }}</p>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-xl">Regime:</h4>
                        <p>{{ $client->regime_id === 1 ? 'Forfettario' : ($client->regime_id === 2 ? 'Ordinario' : 'Speciale') }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <h4 class="text-xl">Since:</h4>
                        <p>{{ $client->acquisition_date }}</p>
                    </div>
                </div>
            </div>
            <h2 class="text-xl mt-10 mb-8 px-6">Next Deadlines</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Deadline</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Action</th>



                    </thead>
                    <tbody>
                        @foreach ($client->yearlyDeadlines->sortBy('date') as $deadline)
                            @if (\Carbon\Carbon::parse($deadline->date)->isFuture())
                                <tr>
                                    <td class="px-6 py-4 max-w-md">{{ $deadline->date }}</td>
                                    <td class="px-6 py-4 max-w-md">
                                        <a href="/deadlines/{{ $deadline->id }}">{{ $deadline->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ strlen($deadline->description) < 100 ? $deadline->description : Str::substr($deadline->description, 0, 100) }}...
                                    </td>
                                    @php
                                        $pivotRecord = DB::table('client_annual_deadlines')
                                            ->where('client_id', $client->id)
                                            ->where('deadline_id', $deadline->id)
                                            ->first();

                                        $class = '';
                                        if ($pivotRecord) {
                                            switch ($pivotRecord->status) {
                                                case 'pending':
                                                    $class =
                                                        'inline bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300';
                                                    $button = Blade::compileString(
                                                        "<form action='/annualdeadline/{$client->id}/{$deadline->id}' method='post'
                                                        class='inline'>
                                                        " .
                                                            csrf_field() .
                                                            "
                <input type='hidden' name='_method' value='PUT'>
                                                            <button type='submit'>Done!
                                                            </button>
                                                        </form>",
                                                    );
                                                    break;
                                                case 'completed':
                                                    $class =
                                                        'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full';
                                                    $button = '';
                                                    break;
                                                case 'missed':
                                                    $class =
                                                        'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full';
                                                    break;
                                                default:
                                                    $class = '';
                                            }
                                            echo "<td class='px-6 py-4'>";
                                            echo "<p class='$class'>$pivotRecord->status</p>";
                                            echo '</td>';
                                        } else {
                                            echo '<td class="px-6 py-4">N/A</td>';
                                        }

                                        echo "<td>$button</td>";
                                    @endphp
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h2 class="text-xl mt-10 mb-8 px-6">Messages</h2>

            <x-messages-table />
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole
