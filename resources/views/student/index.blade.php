<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Mahasiswa</title>
</head>
<body>
    @include('components.partials.sidebar')
    {{-- @include('components.navbar') --}}
    @include('components.buttomNav')


    {{-- <video id="videoElement" autoplay></video> --}}
    

    <script>
        window.addEventListener('DOMContentLoaded', async () => {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                const videoElement = document.getElementById('videoElement');
                videoElement.srcObject = stream;
            } catch (error) {
                console.error('Error accessing camera:', error);
            }
        });
    </script>


</body>
</html>