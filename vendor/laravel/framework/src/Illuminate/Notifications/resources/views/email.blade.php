@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Me të mira,<br>Tregom
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Nëse hasni në probleme duke klikuar butonin "{{ $actionText }}" , atëherë kopjoni dhe vendosni URL-në më poshtë në web-shfletuesin tuaj : [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
