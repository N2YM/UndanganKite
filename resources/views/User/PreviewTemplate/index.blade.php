<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('CSS/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <section class="one"
            style="@if ($tmp->cover1) background-image: url('{{ asset('storage/' . $tmp->cover1) }}'); @endif">
        </section>
        <section class="two"
            style="@if ($tmp->cover2) background-image: url('{{ asset('storage/' . $tmp->cover2) }}'); @endif">
        </section>
        <section class="three"
            style="@if ($tmp->cover3) background-image: url('{{ asset('storage/' . $tmp->cover3) }}'); @endif">
        </section>
        <section class="four"
            style="@if ($tmp->cover4) background-image: url('{{ asset('storage/' . $tmp->cover4) }}'); @endif">
        </section>
        <section class="five"
            style="@if ($tmp->cover5) background-image: url('{{ asset('storage/' . $tmp->cover5) }}'); @endif">
        </section>

    </div>

    <!-- Audio element -->
    <audio id="background-audio" src="{{ asset('' . $tmp->audio_undangan) }}" type="audio/mpeg" loop></audio>
    <!-- Control button -->
    <button class="control-button" onclick="toggleAudio()">
        <i id="audio-icon" class="fa-solid fa-play"></i>
    </button>

    <script>
        var audio = document.getElementById('background-audio');
        var icon = document.getElementById('audio-icon');
        var isPlaying = false;

        // Debugging log
        console.log('Audio URL:', audio.src);
        audio.addEventListener('error', function(event) {
            console.error('Error loading audio:', event);
        });

        function toggleAudio() {
            if (isPlaying) {
                audio.pause();
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
            } else {
                audio.play();
                icon.classList.remove('fa-play');
                icon.classList.add('fa-pause');
            }
            isPlaying = !isPlaying;
        }
    </script>
</body>

</html>
