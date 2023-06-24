<tr class="{{ $alt }} {{ $id }}">
    <td class="label">
        {{ $type }} ({{ $level }} {{ $level_type }})
    </td>
    <td>
    </td>
    <td class="{{ $metal_class }}">
        <span class="tooltipCustom " title="{!! $metal_type !!}">
            {!! $metal_type !!}
        </span>
    </td>
    <td class="{{ $crystal_class }}">
        <span class="tooltipCustom " title="{!! $crystal_type !!}">
            {!! $crystal_type !!}
        </span>
    </td>
    <td class="{{ $deuterium_class }}">
        <span class="tooltipCustom " title="{!! $deuterium_type !!}">
            {!! $deuterium_type !!}
        </span>
    </td>
    <td class="{{ $energy_class }}">
        <span class="tooltipCustom " title="{!! $energy_type !!}">
            {!! $energy_type !!}
        </span>
    </td>
    <td>
		{!! $option !!}
	</td>
</tr>
