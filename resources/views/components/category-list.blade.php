<tbody>
    @forelse ($categories as $category)
        <tr>  
            <td>
                <a href="{{ route('show.brands', $category->slug) }}">{{ $category->name }}</a>
            </td>
        </tr>
    @empty
        <tr><td>Aucune catégorie trouvée</td></tr>
    @endforelse
</tbody>