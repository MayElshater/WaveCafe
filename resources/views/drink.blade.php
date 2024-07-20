@extends('layouts.main')
@section('content')
<div id="drink" class="tm-page-content">
    @if (session('success'))
        <div class="tm-black-bg tm-contact-text-container tm-success-message">
            <h3 class="tm-text-primary">{{ session('success') }}</h3>
        </div>
    @endif

    <!-- Drink Menu Page -->
    <nav class="tm-black-bg tm-drinks-nav">
        <ul>
            @foreach ($groupedBeverages as $categoryName => $beverages)
                <li>
                    <a href="#" class="tm-tab-link" data-id="{{ strtolower(str_replace(' ', '-', $categoryName)) }}">{{ $categoryName }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    @foreach ($groupedBeverages as $categoryName => $beverages)
        <div id="{{ strtolower(str_replace(' ', '-', $categoryName)) }}" class="tm-tab-content" style="display: none;">
            <div class="tm-list">
                @foreach ($beverages as $beverage)
                    <div class="tm-list-item">          
                        <img src="{{ asset('assets/images/' . $beverage->image) }}" alt="Image" class="tm-list-item-img">
                        <div class="tm-black-bg tm-list-item-text">
                            <h3 class="tm-list-item-name">{{ $beverage->title }}<span class="tm-list-item-price">${{ $beverage->price }}</span></h3>
                            <p class="tm-list-item-description">{{ $beverage->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <!-- end Drink Menu Page -->
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tm-tab-link');
    const tabContents = document.querySelectorAll('.tm-tab-content');

    // Show the first category by default if no other category is active
    if (tabs.length > 0) {
        const firstTab = tabs[0];
        firstTab.classList.add('active');
        const firstTabId = firstTab.getAttribute('data-id');
        const firstTabContent = document.getElementById(firstTabId);

        if (firstTabContent) {
            firstTabContent.style.display = 'block';
        }
    }

    // Add event listener to tab links
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            // Hide all tab content
            tabContents.forEach(content => {
                content.style.display = 'none';
            });

            // Remove active class from all tab links
            tabs.forEach(t => {
                t.classList.remove('active');
            });

            // Show the clicked tab content and add active class
            const targetId = this.getAttribute('data-id');
            const targetContent = document.getElementById(targetId);

            if (targetContent) {
                targetContent.style.display = 'block';
            }

            this.classList.add('active');
        });
    });
});
</script>
@endsection

@endsection
