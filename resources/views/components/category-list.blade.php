<ul class="category-list">
    @foreach ($categories as $category)
        <li class="category-item">
            <span>{{$category->name}}</span>

            <!-- Le dropdown est bien à l’intérieur du LI -->
            <div class="dropdown">
                <div class="dropdown-content">
                    <div class="dropdown-header">
                        <h2>{{$category->name}}</h2>
                    </div>
                    <div class="brands-grid"> 
                        @foreach ($category->brands as $brand)
                            <div class="brand-card">
                                <a href="{{ route('product.by.brand', $brand->slug) }}" class="brand-link">
                                    <img src="{{ $brand->logo }}" alt="Logo {{ $brand->name }}" class="brand-logo" width="80" height="80" loading="lazy" decoding="async">
                                    <span class="brand-name">{{ $brand->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="view-all">
                        <a href="{{route('product.list')}}">View All</a>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<script src="{{ asset('dropdown.js') }}" defer></script>
