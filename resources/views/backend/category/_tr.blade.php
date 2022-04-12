<tr>
    <td><span><i class="{{ $item->category_icon }}"></i></span></td>
    <td>{{ $item->category_name_en }}</td>
    <td>{{ $item->category_name_hin }}</td>
    <td>{{ $item->category_name_ar }}</td>
    <td>
        <a href="{{ route('category.edit', $item->id) }}"
            class="btn btn-info" title="Edit Data"> <i
                class="fa fa-pencil"></i> </a>

        <a href="{{ route('category.delete', $item->id) }}"
            class="btn btn-danger" id="delete" data-id="{{ $item->id }}"
            title="Delete Data"> <i class="fa fa-trash"></i></a>
    </td>

</tr>
