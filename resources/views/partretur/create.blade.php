<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Part Retur &raquo; Create') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="">
                {{-- handling error --}}
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                </div>
                @endif
                <form action="{{ route('partretur.store') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="flex flex-1/5 -mx-2 mb-6 hapus">
                        <div class="w-full px-3" ">
                            <label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">Nama Part</label>
                            <input value="{{ old('nama') }}" name="nama[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Nama Part">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">Part Number</label>
                            <input value="{{ old('pn') }}" name="pn[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Part Number">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-last-name">
                                Asal Supplier
                            </label>
                            <select name="id_supplier[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" name="supplier">
                                @foreach ($supplier as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Unit
                            </label>
                            <select name="id_unit[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" name="unit[]">
                                @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                QTY
                            </label>
                            <input value="{{ old('qty') }}" name="qty[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="number" step="0.01" placeholder="QTY" name="qty[]">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">Tanggal</label>
                            <input value="{{ old('tanggal') }}" name="tanggal[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="date" placeholder="Tanggal" name="tanggal[]">
                        </div>
                    </div>

                    <div id="newrow">

                    </div>

                    {{-- Action button --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="button" name="name" id="addrow"
                                class="bg-sky-400 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded">
                                Add More
                            </button>

                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save Part Retur
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
    <script>
        var i=0;
        $('#addrow').click(function(){
            var html = '';
            html +=
            `
                <div class="flex flex-1/5 -mx-2 mb-6 hapus">
                    <div class="flex flex-1/5 -mx-2 mb-6 hapus">
                        <div class="w-full px-3" ">
                            <label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">Nama Part</label>
                            <input value="{{ old('nama') }}" name="nama[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Nama Part">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">Part Number</label>
                            <input value="{{ old('pn') }}" name="pn[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Part Number">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 "
                                for="grid-last-name">
                                Asal Supplier
                            </label>
                            <select name="id_supplier[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" name="supplier">
                                @foreach ($supplier as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Unit
                            </label>
                            <select name="id_unit[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" name="unit[]">
                                @foreach ($unit as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                QTY
                            </label>
                            <input value="{{ old('qty') }}" name="qty[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="number" step="0.01" placeholder="QTY" name="qty[]">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">Tanggal</label>
                            <input value="{{ old('tanggal') }}" name="tanggal[]"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="date" placeholder="Tanggal" name="tanggal[]">
                        </div>
                        <button type="button" name="hapus" id="hapus"
                                    class="bg-red-700 hover:bg-red-700 remove-table-row text-white font-bold py-2 px-4 rounded">
                                    Remove
                        </button>
                    </div>

                `;
                $("#newrow").append(html);
                });

        $(document).on('click',' .remove-table-row', function(){
            $(this).closest('.hapus').remove();

        });

    </script>
</x-app-layout>
