<h1> My Drop-Down</h1>

<div>
    @forelse ($brands as $brand)
    <p>
        {{$brand->category_id}}
        {{$brand->name}}
    </p>
    
    @empty
        Aucune marque disponible
    @endforelse
</div>