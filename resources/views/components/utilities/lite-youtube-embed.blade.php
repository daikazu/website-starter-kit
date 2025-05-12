@props([
    "videoId",
    "title" => "Play Video",
    "duration",
    "uploadDate",
    "description" => "Watch the video",
])

<lite-youtube
    {{ $attributes->class(["aspect-ratio-[16/9] mx-auto overflow-clip rounded-lg bg-black/30 shadow-md"]) }}
    videoid="{{ $videoId }}"
    playlabel="Play: {{ $title }}"
    style="background-image: url({{ "https://i.ytimg.com/vi/{$videoId}/hqdefault.jpg" }})"
>
    <a href="https://youtube.com/watch?v={{ $videoId }}" class="lty-playbtn" title="Play Video">
        <span class="lyt-visually-hidden">Play Video: {{ $title }}</span>
    </a>
</lite-youtube>

@pushOnce("styles")
@vite(["node_modules/lite-youtube-embed/src/lite-yt-embed.css"])
@endPushOnce

@pushOnce("scripts")
@vite(["node_modules/lite-youtube-embed/src/lite-yt-embed.js"])
@endPushOnce

@php
    use Spatie\SchemaOrg\Schema;
    use Illuminate\Support\Carbon;

    $videoSchema = Schema::videoObject()
        ->name($title)
        ->description($description)
        ->thumbnailUrl("https://i.ytimg.com/vi/{$videoId}/maxresdefault.jpg")
        ->uploadDate(Carbon::parse("2023-02-06", config("app.local_timezone"))->startOfDay())
        ->duration($duration)
        ->contentUrl("https://www.youtube.com/watch?v={$videoId}")
        ->embedUrl("https://www.youtube.com/embed/{$videoId}");

    seo()->addSchema($videoSchema);
@endphp
