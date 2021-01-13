<table border="1">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach($results as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['nama']['value'] ?? '-' }}</td>
                <td>{{ $item['alamat']['value'] ?? '-' }}</td>
                <td>{{ $item['jumlah']['value'] ?? '-' }}</td>
                <td>
                    <a href="{{ route('review-reimburse.edit', $item['id']) }}">
                        <button>Edit</button>
                    </a>
                    <form method="POST" action="{{ route('review-reimburse.destroy', $item['process-instance-id']) }}">
                        @csrf
                        {!! method_field('delete') !!}
                        <input type="submit" value="Hapus">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>