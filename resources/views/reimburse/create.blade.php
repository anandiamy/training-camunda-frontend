<form method="POST" action="{{ route('pengajuan-reimburse.store') }}">
    @csrf
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="alamat" placeholder="Alamat">
    <input type="text" name="jumlah" placeholder="Jumlah">
    <input type="submit" value="Kirim">
</form>
