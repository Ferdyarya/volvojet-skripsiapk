<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nota Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-3">
                    {{-- <a href="{{ route('sales.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Penjualan
                        Sales</a> --}}
                    @if (!empty($filter))
                    <a href="{{ route('notapembelianpdf', $filter) }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Export PDF</a>
                    <div class="flex justify-end mt-7">
                        @else
                        <a href="{{ route('notapembelianpdf','all') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Export PDF</a>
                        <div class="flex justify-end mt-7">
                            @endif


                            <div class=" xl:w-96 ">
                                <div class="float-right row">
                                    <form action="{{ url()->current() }}">
                                        <div class="input-group">
                                            <select name="filter" class="form-control input-sm select2 rounded-xl">
                                                <option value="">FILTER</option>
                                                @if (!empty($filter))
                                                <option value="all">SHOW ALL</option>
                                                @endif
                                                @foreach ($sales as $item)
                                                <option value="{{ $item->id_customermaster }}" {{ $item->id_customermaster ==
                                                    old('filter', $filter) ? 'selected' : '' }}>
                                                    {{ strtoupper($item->customermaster->name) }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append mt-2">
                                                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300
                                                    font-medium rounded-lg text-sm px-4 py-2.5 mr-2 mb-2 dark:bg-green-600
                                                    dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">No</th>
                                {{-- <th class="border px-6 py-4">Nama Sales</th> --}}
                                <th class="border px-6 py-4">Id Transaksi</th>
                                <th class="border px-6 py-4">Customer Yang Beli</th>
                                <th class="border px-6 py-4">Unit Dibeli</th>
                                <th class="border px-6 py-4">Harga Unit</th>
                                <th class="border px-6 py-4">Qty</th>
                                <th class="border px-6 py-4">Tanggal</th>
                                <th class="border px-6 py-4">Total Harga</th>
                                {{-- <th class="border px-6 py-4">Status</th> --}}
                                @if (Auth::user()->hakAkses('adminsales'))
                                <th class="border px-6 py-4">Action</th>
                                @else
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sales as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                                {{-- <td class="border px-6 py-4">{{ $item->salesmaster->name }}</td> --}}
                                <td class="border px-6 py-4">{{ $item->nota_number }}</td>
                                <td class="border px-6 py-4">{{ $item->customermaster->name }}</td>
                                <td class="border px-6 py-4">{{ $item->unit->name }}</td>
                                {{-- <td class="border px-6 py-4">{{ $item->gambar }}</td> --}}
                                <td class="border px-6 py-4">Rp. {{ number_format($item->harga )}}</td>
                                <td class="border px-6 py-4">{{ $item->qty }}</td>
                                <td class="border px-6 py-4">{{ $item->tanggal }}</td>
                                <td class="border px-6 py-4">Rp. {{ number_format($item->harga * $item->qty )}}</td>



                                @if (Auth::user()->hakAkses('adminsales'))
                                @if ($item->status == 0)
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('sales.edit', $item->id) }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit
                                    </a>

                                    <form action="{{ route('sales.destroy', $item->id) }}" method="POST"
                                        class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                                    </form>
                                    <form action="{{ route('notapembelianpdfid', $item->id) }}"
                                        class="inline-block">
                                        <button type="submit"
                                            class="bg-yellow-300 hover:bg-yellow-700 text-white font-bold py-2 px-4 mx-2 rounded">Cetak</button>
                                    </form>

                                </td>
                                @else
                                <td class="border px-6 py-4 text-center">
                                    <p>Done</p>
                                </td>
                                @endif
                            </tr>
                            @else
                            @endif
                            @empty

                            <tr>
                                <td colspan="10" class="border text-center p-5">
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
                {{ $sales->links() }}
            </div>

        </div>
    </div>



</x-app-layout>
