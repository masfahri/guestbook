<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Unit / Instansi</th>
            <th>Email</th>
            <th>Keperluan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tamu as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->instansi }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->keperluan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>