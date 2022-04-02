<script>
    $(document).ready(function() {
    $('.searchable-field').select2({
        minimumInputLength: 3,
        ajax: {
            url: '{{ route(MODULE  . ".globalSearch") }}',
            dataType: 'json',
            type: 'GET',
            delay: 200,
            data: function (term) {
                return {
                    search: term
                };
            },
            results: function (data) {
                return {
                    data
                };
            }
        },
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatItem,
        templateSelection: formatItemSelection,
        placeholder : '{{ trans('global.search') }}...',
        language: {
            inputTooShort: function(args) {
                var remainingChars = args.minimum - args.input.length;
                var translation = '{{ trans('global.search_input_too_short') }}';

                return translation.replace(':count', remainingChars);
            },
            errorLoading: function() {
                return '{{ trans('global.results_could_not_be_loaded') }}';
            },
            searching: function() {
                return '{{ trans('global.searching') }}';
            },
            noResults: function() {
                return '{{ trans('global.no_results') }}';
            },
        }

    });
    function formatItem (item) {
        if (item.loading) {
            return '{{ trans('global.searching') }}...';
        }
        var markup = "<div class='searchable-link' href='" + item.url + "'>";
        markup += "<div class='searchable-title'>" + item.model + "</div>";
        $.each(item.fields, function(key, field) {
            markup += "<div class='searchable-fields'>" + item.fields_formated[field] + " : " + item[field] + "</div>";
        });
        markup += "</div>";

        return markup;
    }

    function formatItemSelection (item) {
        if (!item.model) {
            return '{{ trans('global.search') }}...';
        }
        return item.model;
    }
    $(document).delegate('.searchable-link', 'click', function() {
        var url = $(this).attr('href');
        window.location = url;
    });
});
</script>
