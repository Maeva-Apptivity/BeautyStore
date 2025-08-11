<tbody>
    @forelse ($categories as $category)
        <tr>  
            <td>
                <span class="category-name" data-id="{{ $category->id }}">
                    {{ $category->name }}
                </span>
            </td>
        </tr>
    @empty
        <tr><td>Aucune catégorie trouvée</td></tr>
    @endforelse
</tbody>