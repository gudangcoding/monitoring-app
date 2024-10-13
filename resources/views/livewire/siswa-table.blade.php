<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Nama Siswa</th>
                <th class="px-4 py-2">Hadir</th>
                <th class="px-4 py-2">Alfa</th>
                <th class="px-4 py-2">Sakit</th>
                <th class="px-4 py-2">Izin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswaList as $siswa)
                <tr>
                    <td class="border px-4 py-2">{{ $siswa->nama }}</td>
                    <td class="border px-4 py-2">
                        <input type="checkbox" wire:model.defer="absensiData.{{ $siswa->id }}.hadir">
                    </td>
                    <td class="border px-4 py-2">
                        <input type="checkbox" wire:model.defer="absensiData.{{ $siswa->id }}.alfa">
                    </td>
                    <td class="border px-4 py-2">
                        <input type="checkbox" wire:model.defer="absensiData.{{ $siswa->id }}.sakit">
                    </td>
                    <td class="border px-4 py-2">
                        <input type="checkbox" wire:model.defer="absensiData.{{ $siswa->id }}.izin">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
