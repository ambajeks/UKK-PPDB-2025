<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Dashboard Admin</h1>
        <div class="alert alert-success">
            Selamat datang, <strong>{{ auth()->user()->username ?? auth()->user()->email }}</strong>!  
            Anda masuk sebagai <span class="badge bg-primary">Admin</span>.
        </div>
    </div>
</x-app-layout>
