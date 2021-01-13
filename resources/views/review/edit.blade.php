<form method="POST" action="{{ route('review-reimburse.update', $id) }}">
    @csrf
    {!! method_field('put') !!}
    <p>Nama : {{ $body['nama']['value'] }}</p>
    <p>Alamat : {{ $body['alamat']['value'] }}</p>
    <p>Jumlah : {{ $body['jumlah']['value'] }}</p>
    <select name="is_approved">
        <option value="true">Setuju</option>
        <option value="false">Tidak Setuju</option>
    </select>
    <input type="submit" value="Kirim">
</form>
