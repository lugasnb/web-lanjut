@extends('layouts.app')

@section('title', 'Contact Me')

@section('content')
<!-- Contact Section -->
<div class="contact-section py-5">
    <div class="container">
        <h1 class="display-4 text-center fadeInUp">Contact Me</h1>
        <p class="lead text-center mb-5 fadeInUp">
            Jika kamu ingin bekerja sama, bertanya, atau hanya ingin menyapa, silakan kirim pesan melalui form di bawah ini.
        </p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Form untuk kontak -->
                <form action="{{ route('contact.send') }}" method="POST" class="fadeInUp">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama lengkap" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Alamat email aktif" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Pesan</label>
                        <textarea name="message" rows="5" class="form-control" placeholder="Tulis pesanmu di sini..." required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mt-5 fadeInUp">
            <p>Atau hubungi saya melalui:</p>
            <p>
                <i class="fas fa-envelope text-primary"></i> lugasnusabkti@gmail.com <br>
                <i class="fas fa-phone text-primary"></i> +62 838-5008-2592 <br>
                <i class="fab fa-instagram text-primary"></i> @lugasnb
            </p>
        </div>
    </div>
</div>
@endsection
