var AppTesteVaga = function () {


    var confirmDelete = function () {
        jQuery(".removeItem").click(function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            if ( confirm("Remover registro?") ) {
                window.location.href = "/testevaga/delete/"+id
            }
        });
    };

    return {
        init: function () {
            console.log("construct");

            confirmDelete()

            console.log("destruct");
        }
    }
}();

AppTesteVaga.init();