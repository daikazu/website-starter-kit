<?php

declare(strict_types=1);

?>
@production
    {{-- ADD TRACKING CODES --}}

    @push('body')

    @endpush

    @push('scripts')
        @vite(['resources/js/event-tracking.js'])
    @endpush
@endproduction
<?php
