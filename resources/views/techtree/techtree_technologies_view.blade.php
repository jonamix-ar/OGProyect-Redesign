<div class="content technologies">
	{!! $category_list !!}
</div>
<script>
    $(".content.technologies h1").click(function() {
        $('.content.technologies ul[data-category="' + $(this).data("category") + '"]').slideToggle();
    });
</script>