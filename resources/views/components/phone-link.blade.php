<?php

declare(strict_types=1);

?>
<a href="{{ phone(config('website.phone', 'US'))->formatRFC3966() }}" {{ $attributes }}>
    {{ $slot }}
    {{ str(phone(config('website.phone', 'US'))->formatForMobileDialingInCountry('US', true))->remove('+') }}
</a>
<?php
