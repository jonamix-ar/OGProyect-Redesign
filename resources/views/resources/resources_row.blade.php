<tr class="{{ $alt }} {{ $id }}">
    <td class="label">
        {{ $type }} ({{ $level }} {{ $level_type }})
    </td>
    <td>
    </td>
    <td class="undermark">
        <span class="tooltipCustom " title="{!! $metal_type !!}">
            {!! $metal_type !!}
        </span>
    </td>
    <td class="normalmark">
        <span class="tooltipCustom " title="{!! $crystal_type !!}">
            {!! $crystal_type !!}
        </span>
    </td>
    <td class="normalmark">
        <span class="tooltipCustom " title="{!! $deuterium_type !!}">
            {!! $deuterium_type !!}
        </span>
    </td>
    <td class="overmark">
        <span class="tooltipCustom " title="{!! $energy_type !!}">
            {!! $energy_type !!}
        </span>
    </td>
    <td>
        <select name="{{ $name }}" size="1" class="undermark dropdownInitialized" style="display: ;">
            {{-- <option class="undermark" value="100" selected="">100%</option>
            <option class="undermark" value="90">90%</option>
            <option class="undermark" value="80">80%</option>
            <option class="undermark" value="70">70%</option>
            <option class="middlemark" value="60">60%</option>
            <option class="middlemark" value="50">50%</option>
            <option class="middlemark" value="40">40%</option>
            <option class="overmark" value="30">30%</option>
            <option class="overmark" value="20">20%</option>
            <option class="overmark" value="10">10%</option>
            <option class="overmark" value="0">0%</option> --}}
            {!! $option !!}
        </select>

        <span class="dropdown currentlySelected undermark" rel="dropdown396" style="width: 67px;">
            <a class="undermark" data-value="100" rel="dropdown396" href="javascript:void(0);">100%</a>
        </span>
    </td>
</tr>
