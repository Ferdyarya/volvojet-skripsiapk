<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-10">
                    <a href="{{ route('customer.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create
                        Customer</a>
                        <a href="{{ route('customerpdf') }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Export PDF</a>
                </div>
                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">No</th>
                                <th class="border px-6 py-4">Nama</th>
                                <th class="border px-6 py-4">Kategori Unit</th>
                                <th class="border px-6 py-4">Email</th>
                                <th class="border px-6 py-4">kode</th>
                                <th class="border px-6 py-4">Harga</th>
                                <th class="border px-6 py-4">Qty</th>
                                <th class="border px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customer as $item)
                                <tr>
                                    <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="border px-6 py-4">{{ $item->nama }}</td>
                                    <td class="border px-6 py-4">{{ $item->unit->name }}</td>
                                    <td class="border px-6 py-4">{{ $item->email }}</td>
                                    <td class="border px-6 py-4">{{ $item->kode }}</td>
                                    <td class="border px-6 py-4">{{ number_format($item->harga) }}</td>
                                    <td class="border px-6 py-4">{{ $item->qty }}</td>
                                    <td class="border px-6 py-4 text-center">
                                        <a href="{{ route('customer.edit', $item->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit
                                        </a>

                                        <form action="{{ route('customer.destroy', $item->id) }}" method="POST"
                                            class="inline-block">
                                            {!! method_field('delete') . csrf_field() !!}
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="8" class="border text-center p-5">
                                        Data Tidak Di Temukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- untuk paginate --}}
            <div class="text-center mt-5">
                {{ $customer->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
