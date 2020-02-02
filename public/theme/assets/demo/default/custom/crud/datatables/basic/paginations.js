var DatatablesBasicPaginations = {
    init: function () {
        $("#m_table_1").DataTable({
            "aaSorting": []
        })
    }
};
jQuery(document).ready(function () {
    DatatablesBasicPaginations.init()
});