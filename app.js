var selected = [];
$('#delete').click(function () {
    $('.delete-checkbox').each(function (e) {
        if ($(this).prop("checked")) {
            selected.push($(this).attr('id'));
        }
    });
    $.post(
        'index.php', {
        selected: JSON.stringify(selected),
    },
        // used this callback funcition to update list page without reloading but then AutoQA detects checkboxes
        // function(data) {
        // 	$('#product-list').html(data);
        // }
    );
})


$('select#productType').on("change", function () {
    $("#" + $(this).val()).show().siblings(".option").hide();
});