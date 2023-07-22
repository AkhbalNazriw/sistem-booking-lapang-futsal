<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <script>
    // Menghilangkan pesan error setelah 5 detik
    setTimeout(function() {
        var errorDiv = document.querySelector('.error');
        if (errorDiv) {
            errorDiv.style.display = 'none';
        }
    }, 2000);


    </script>

</head>
<body>
    <h1>Admin Login</h1>
    @if(session('error'))
    <p class="error">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/admin/login">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder= "Masukkan Nama Admin"><br><br>
 
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder= "Masukkan Password Anda"><br><br>
        
        <div class="login-btn">
        <input type="submit" value="Login">
        </div>
        <br>
        <br>
        <div>
        <a href="{{ route('admin.lupa-password') }}" class="lupa">Lupa Password?</a>
        </div>
    </form>
    
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer>
    <p> © 2023 TIFutsal. Cerated By : Akhbal Najri W | Farhah Annazila | Ilham Nursetyawan.</p>
</footer>

</body>
</html>
