<?php

declare(strict_types=1);

?>
<a href="mailto:{{ config('website.email') }}" {{ $attributes }}>{{ $slot }}{{ config('website.email') }}</a>
<?php
