<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://127.0.0.1:8000/image/logokpu.png" class="logo" alt="Logo KPU">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
