<table class="queue">
    <tbody>
        <tr>
            @foreach ($shipyard as $key => $item_data)
                @if (!empty($item_data))
                    @php
                    $item_values = explode(',', $item_data);
                    $item_name = $langs[$objects->getObjects($item_values[0])];
                    @endphp
                    @if ($key > 0)
                    <td class="tooltip js_hideTipOnMobile" title="" style="text-align: center">
                        <img class="queuePic" height="28" width="28"
                            src="{{ $img_path . 'small/small_' . $item_values[0] . '.jpg' }}" alt="{{ $item_name }}"
                            title="{{ $item_name }}"><br>{{ $item_values[1] }}
                    </td>
                    @endif
                @endif
            @endforeach
        </tr>
    </tbody>
</table>