<x-layouts.app>
    <div class="overflow-y-auto w-full h-screen">
        <table class="text-sm text-left text-gray-400 w-11/12 mt-2 mx-auto">
            <thead class="text-xs text-gray-400 uppercase bg-custom-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($locations as $location)
                <tr class="border-b bg-gray-800 border-gray-700">
                    <td class="px-6 py-4">
                        {{ $location->name }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
