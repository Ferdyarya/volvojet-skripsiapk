<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-10">
                    <a href="{{ route('brgkeluar.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Barang Keluar</a>
                </div>
                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">No</th>
                                <th class="border px-6 py-4">Product</th>
                                <th class="border px-6 py-4">Supplier</th>
                                <th class="border px-6 py-4">Qty</th>
                                <th class="border px-6 py-4">Tanggal</th>
                                <th class="border px-6 py-4">Action</th>z
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brgkeluar as $item)
                                <tr>
                                    <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="border px-6 py-4">{{ $item->product->nama }}</td>
                                    <td class="border px-6 py-4">{{ $item->customer->nama }}</td>
                                    <td class="border px-6 py-4">{{ $item->qty }}</td>
                                    <td class="border px-6 py-4">{{ $item->tanggal }}</td>
                                    <td class="border px-6 py-4 text-center">
                                        <a href="{{ route('brgkeluar.edit', $item->id) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit
                                        </a>

                                        <form action="{{ route('brgkeluar.destroy', $item->id) }}" method="POST"
                                            class="inline-block">
                                            {!! method_field('delete') . csrf_field() !!}
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="6" class="border text-center p-5">
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
                {{ $brgkeluar->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
