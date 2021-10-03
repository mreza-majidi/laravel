$(document).ready(function () {
    var to, from;
    to = $(".range-to-example").persianDatepicker({
        inline:false,
        altField: '.range-to-example-alt',
        format: 'L',
        initialValue: false,
        onSelect: function (unix) {
            to.touched = true;
            if (from && from.options && from.options.maxDate != unix) {
                var cachedValue = from.getState().selected.unixDate;
                from.options = {maxDate: unix};
                if (from.touched) {
                    from.setDate(cachedValue);
                }
            }
        }
    });
    from = $(".range-from-example").persianDatepicker({
        inline:false,
        altField: '.range-from-example-alt',
        format: 'L',
        initialValue: false,
        onSelect: function (unix) {
            from.touched = true;
            if (to && to.options && to.options.minDate != unix) {
                var cachedValue = to.getState().selected.unixDate;
                to.options = {minDate: unix};
                if (to.touched) {
                    to.setDate(cachedValue);
                }
            }
        }
    });
});
