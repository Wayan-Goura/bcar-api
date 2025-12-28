<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Elegan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Background Abstrak Soft Blue-White */
            background: radial-gradient(circle at top left, #e3f2fd 0%, #ffffff 50%, #bbdefb 100%);
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Efek Kaca (Glassmorphism) */
        .login-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }

        .login-card h5 {
            color: #1a237e;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #d1d9e6;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 10px rgba(13, 110, 253, 0.1);
        }

        .btn-login {
            background: linear-gradient(45deg, #2196f3, #00bcd4);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            color: white;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
            color: white;
        }

        /* Dekorasi Tambahan */
        .bg-circle {
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(33, 150, 243, 0.1), rgba(0, 188, 212, 0.1));
            filter: blur(50px);
        }
    </style>
</head>
<body>

<div class="bg-circle" style="width: 300px; height: 300px; top: 10%; left: 10%;"></div>
<div class="bg-circle" style="width: 400px; height: 400px; bottom: 5%; right: 5%;"></div>

<div class="container d-flex justify-content-center">
    <div class="login-card">
        <h5 class="fw-bold text-center">ADMIN LOGIN</h5>

        <form method="POST" action="/admin/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary">Email Address</label>
                <input type="email" name="email" class="form-control"
                       placeholder="nama@email.com" required>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary">Password</label>
                <input type="password" name="password" class="form-control"
                       placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-login w-100 shadow-sm">
                Login Sekarang
            </button>
            
            <div class="text-center mt-4">
                <a href="#" class="text-decoration-none small text-muted">Lupa Password?</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>