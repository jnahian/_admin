(function ($) {

    submitForm = function (that) {
        var form = $(that).parents('form'),
                btnText = $(that).text(),
                link = form.attr('action'),
                type = form.attr('method');


        form.one("submit", function (e) {
            e.preventDefault();
            $(that).prop('disabled', true);
            $(that).html('Please wait...');

            formData = new FormData(this);

            $.ajax({
                url: link,
                type: type,
                data: formData,
                processData: false,
                contentType: false,
                mimetype: "multipart/form-data",
                dataType: "json",
                success: function (ret) {

                    if (ret.success) {
                        $('.reset').click();
                    }
                    Materialize.toast(ret.message, 5000);
                    $(that).prop('disabled', false);
                    $(that).text(btnText);
                },
                error: function (err) {
                    alert(err);
                    $(that).removeAttr("disabled");
                    $(that).text(btnText);
                }
            });
        });
        return false;
    }

    deleteItem = function (that, $tablename) {
        $that = $(that);
        $id = $that.data('id');

        //alert($id)

        if (confirm('Warning!!! Are You Sure, you want to delete this item')) {
            $.ajax({
                url: 'submit.php',
                type: 'POST',
                data: ({"table": $tablename, "operation": "delete", "id": $id}),
                dataType: 'json',
                success: function (ret) {
                    Materialize.toast(ret.message, 3000);
                    $that.parents('tr').remove();
                },
                error: function () {
                    Materialize.toast("Ajax Error!!!");
                }
            });
        }
        return false;
    }

    viewItem = function (that, $tablename) {
        var that = $(that),
            id = that.data('id');
        $.ajax({
            url: 'submit.php',
            type: 'POST',
            data: ({"table": $tablename, "operation": "view", "id": id}),
            dataType: 'json',
            success: function (ret) {
                //alert(ret);
                Materialize.toast(ret.message, 3000);
                if (ret.success) {
                    $('#modal').load('viewuser.php');
                }
            },
            error: function () {
                Materialize.toast("Ajax Error!!!", 5000);
            }
        });
    }

    reloadPage = function () {
        document.location.reload(true);
    }
    
    openModal = function (that, e) {
        e.preventDefault();
          //alert("");
          $("#modal").slideDown(300);
    }
    
})(jQuery);