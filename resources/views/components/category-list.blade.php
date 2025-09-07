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
                                <a href="#" class="brand-link">
                                    <img src="{{ $brand->logo }}" alt="{{ $brand->name }} logo" class="brand-logo">
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
<script src="dropdown.js"></script>