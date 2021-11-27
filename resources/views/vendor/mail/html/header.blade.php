<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="image/logoKPU.png" class="logo" alt="Logo KPU">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
