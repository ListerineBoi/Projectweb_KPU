@component('mail::message')
# Mohon Maaf Pengajuan Pindah Anda Ditolak

alasan ditolak

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
