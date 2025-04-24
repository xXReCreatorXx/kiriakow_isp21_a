<div class="contant-category">
    @foreach($tags as $tag)
    <form class="contant-category_form" action="{{ route('category') }}" method="GET">
        <button class="contant-category_button" style="color: {{ $tag->color }}" name="tag" value="{{ $tag->id }}">
            {{ $tag->name }}
        </button>
    </form>
    @endforeach
</div>