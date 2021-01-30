@extends('layouts.siswa')
@section('style')
    <style>
        .otor:hover
        {
            color: white;
        }
        .gori
        {
            color: yellow;
        }
        .gori:hover
        {
            color: white;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="mb-4">
            <h3 style="text-align: center; color: white; font-family: 'Jetbrains_Mono';">
                {{ $title ?? 'NotFound' }}
            </h3>
            <hr style="height: 4; background-color: white; width: 50%;">
        </div>
    </div>
</div>
    <div class="row mt-4">
        @forelse ($books as $book)
        <div class="col-md-4 mb-4">
            <center>
                <div class="card" style="width: 18rem; background-color: #30475e; color: white; border-radius: 10px;">
                    <div class="py-1 mt-2" style="margin-left: -14.5rem;">
                        <a href="{{ route('siswa.detail', $book->id) }}" class="text-white modal-show-detail" title="Detail Buku"><i class="fa fa-eye mr-1" style="font-size: 20px;"></i></a>
                    </div>
                    <center>
                    <img src="{{ $book->BookImg }}" class="card-img-top p-2 rounded-circle" style="width: 70%; height: 200px; object-fit: cover;" alt="..."></center>
                    <hr style="background-color: white;">
                    <div class="card-body">
                        <b class="card-title" style="font-family: 'title-book'; font-size: 30px; margin-left: -4.5rem;">{{ Str::limit($book->name, 15) }}</b>
                    </div>
                    <hr style="background-color: white;">
                    <div class="card-body" style="margin-left: -5rem;">
                        <a href="{{ route('siswa.showcategory', $book->category->id) }}" style="font-size: 13px;" class="card-link gori">{{ $book->category->name }}</a>
                        <a href="{{ route('siswa.showauthor', $book->author->id) }}" style="font-size: 13px;" class="card-link otor">{{ $book->author->name }}</a>
                    </div>
                    <div class="my-2">
                        <small class="text-white offset-6"><i class="fa fa-stopwatch mr-1"></i>{{ $book->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </center>
        </div>
        @empty
        <div class="col-md-12">
            <h1 style="color: yellow; text-align: center; margin-left: -10px; font-family: 'SourceCodePro-SemiboldIt';">Data Buku sedang Kosong / Kehabisan Stok!</h1>
        </div>
        @endforelse
    </div>
    <div class="row ml-4 mb-2">
        <div class="col-md-4">
            {{ $books->links('pagination::bootstrap-4') }}
        </div>
    </div>
    {{-- footer --}}
    @include('layouts.partials.footer')
    {{-- modal show detail --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"  style="background: linear-gradient(#040b14, #30475e); color: white;">
                <div class="modal-header" id="modal-header">
                    <h5 class="modal-title" style="font-family: 'Jetbrains_Mono';" id="modal-title">Modal title</h5>
                    <button type="button" style="color: #0CD5F0;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-2" id="modal-body">

                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
@section('script')
    <script>
        $('body').on('click', '.modal-show-detail', function() {
            event.preventDefault();
            let me = $(this),
                url = me.attr('href'),
                title = me.attr('title');
            $('#modal-title').text(title);

            $.ajax({
                url: url,
                dataType: 'html',
                success: function(response) {
                    $('#modal-body').html(response);
                }
            });

            $('#modal').modal('show');
        });
    </script>
@endsection
