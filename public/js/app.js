var selected = [];
$('#delete').click(function () {
    // console.log('selected:' + selected);
    // console.log('click');

    $('.delete-checkbox').each(function (e) {
        if ($(this).prop("checked")) {
            selected.push($(this).attr('id'));
        }
    });
    $.post('/', { selected: JSON.stringify(selected) })
})


$('select#productType').on("change", function () {
    $("#" + $(this).val()).show().siblings(".option").hide();
});

$('#product_form').submit(function (e) {
    e.preventDefault();
    var relocate = false;
    $.ajax({
        url: this.action,
        // type: this.method,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            console.log('Post was successful!');
            if (result[0] === '{') {
                console.log(result);
                var obj = $.parseJSON(result);
                if (!obj.newSKU) $("#newSKU").show()
                else $("#newSKU").hide();
                if (!obj.filledData) $("#filledData").show()
                else $("#filledData").hide();
                if (!obj.correctData) $("#correctData").show()
                else $("#correctData").hide();
            }
            else {
                window.location.replace("/")
            }
        },
        error: function (result) {
            console.log('Post was not successful!');
        }
    });
});
