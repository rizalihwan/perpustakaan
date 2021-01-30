<center>
    <div class="form-group">
        <img src="{{ $book->BookImg }}" style="width: 150px; height: 150px; object-fit: cover; object-position: center;" alt="" srcset="">
    </div>
</center>
<div class="form-group">
    <label for="name" style="font-family: 'font_detail_book'; font-size: 20px;">Nama Buku</label>
    <input type="text" name="name" value="{{ $book->name }}" style="font-family: 'a-josep'; background: transparent; color: white; border: 2px solid #0CD5F0;" readonly id="name" class="form-control">
</div>
<div class="form-group">
    <label for="description" style="font-family: 'font_detail_book'; font-size: 20px;">Deskripsi</label>
    <textarea name="description" rows="6" style="font-family: 'a-josep'; background: transparent; color: white; border: 2px solid #0CD5F0;" readonly id="description" class="form-control">{{ $book->description }}</textarea>
</div>
