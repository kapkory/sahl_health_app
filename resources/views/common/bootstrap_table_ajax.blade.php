<?php

if(isset($table_class)){
    $table_classes = ['table','condensed'];
    $table_class = array_merge($table_classes,$table_class);
}
else
    $table_class = ['table','condensed'];
if(!isset($table_actions))
    $table_actions = [];
if(!isset($search_form))
    $search_form = true;
if(!isset($status_fields))
    $status_fields = [];
if(!isset($filters)){
    $filters = $table_headers;
    if(isset($filters['action'])){
        unset($filters['action']);
    }
}
$ajax_headers = [];
$search_keys = [];
foreach($table_headers as $key=>$header){
    $arr = explode('.',$header);
    $ajax_headers[] = $arr[count($arr)-1];
    if(is_numeric($key)){
        $search_keys[] = $arr[count($arr)-1];
    }else{
        $search_keys[] = $key;
    }

}
$rand_id = str_random(15);
$random_select_id = str_random();
if(request('per_page')){
    $per_page = request('per_page');
}elseif(!isset($per_page)){
    $per_page = 10;
}
?>
@if($is_mobile)
    <br/>
    <hr/>
    <div class="row"></div>
@endif

<div class="bootstrap_table" >
    <form class="search-form form-horizontal" style="max-width: 400px !important;" onsubmit="return startBootstrapSearch();" method="get" action="{{ url($data_url) }}" role="form" _lpchecked="1">
        <div class="">
            <input type="hidden" name="order_by" value="{{ Request::input('order_by') }}">
            <input type="hidden" name="per_page" value="{{  $per_page }}">
            <input type="hidden" name="order_method" value="{{ Request::input('order_method') }}">
            <input type="hidden" name="tab" value="{{ Request::input('tab') }}">
            <input type="hidden" name="base_table" value="{{ isset($base_tbl) ? $base_tbl:'' }}">
            @foreach($search_keys as $key)
                @if($key != 'action')
                    <input type="hidden" name="keys[]" value="{{ $key }}">
                @endif
            @endforeach
            @if($search_form)
                <div class="form-group">
                    <label class="control-label">Search</label>
                    <input onkeyup="startBootstrapSearch();" value="{{ Request::input('filter_value') }}" type="text" class="form-control input-sm filter-value" id="" name="filter_value" placeholder="">
                </div>
            @endif
        </div>
    </form>
    @if(isset($multi_actions))
        <div class="row">
            <form id="multi_select_form_{{ $random_select_id }}" class="ajax-post model_form_id" method="post" action="{{ url($multi_actions[0]) }}">
                <input name="ids[]" value="" type="hidden">
                {{ csrf_field() }}
                <div class="form-group with_selected">
                    <div class="fg-line">
                        <label class="fg-label control-label label_with_selected">With Selected</label>
                        <select name="selected_action">
                            @foreach($multi_actions[1] as $action)
                                <option value="{{ $action }}">{{ ucwords(str_replace('_',' ',$action)) }}</option>
                            @endforeach
                        </select>
                        <div class="select_elements_{{ $random_select_id }}">

                        </div>
                        <button type="button" onclick="return doMultiSelectAction();" class="btn btn-sm btn-primary">Go</button>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            function doMultiSelectAction(){
                var values = $('.select_val_{{ $random_select_id }}:checked');
                $(".select_elements_{{ $random_select_id }}").html('');
                for(var i=0;i<values.length;i++){
                    $(".select_elements_{{ $random_select_id }}").append('<input type="hidden" name="selected_ids[]" value="'+values[i].value+'">');
                }
                var url = $("#multi_select_form_{{ $random_select_id }}").attr('action');
                var data = $("#multi_select_form_{{ $random_select_id }}").serialize();
                var full_url = url+'?'+data;
                runSilentAction(full_url);
            }
        </script>
    @endif
    @if($is_mobile)
        <div class="main_table_bdy"></div>
    @elseif(@$is_responsive)
    @else
        <div class="table-responsive">
            <table class="{{ implode(' ',$table_class) }} boots-table main_search_table">
                <thead>
                <tr>
                    @if(isset($multi_actions))
                        <th>
                            <input onclick="toggleSelectInTable();" type="checkbox" name="select_{{ $random_select_id }}">All
                        </th>
                    @endif
                    @foreach($table_headers as $key=>$header)
                        <?php
                        $arr = explode('.',$header);
                        $h_key = $header;
                        if(!is_numeric($key))
                            $h_key = $key;
                        $head = $arr[count($arr)-1];
                        $head =str_replace('->',' ',$head) ;
                        $head =str_replace('_',' ',$head) ;

                        ?>
                        <th scope="col" onclick="setOrderBy('{{ $h_key }}');" style="cursor: pointer;">
                            @if(Request::input('order_by') == $h_key)
                                <i class="fa fa-{{ Request::input('order_method') }}"></i>
                            @endif
                            <i class="th_{{ $h_key }} order_cols"></i>
                            <span>{{ ucwords($head) }}</span>
                        </th>
                    @endforeach
                    @if(count($table_actions)>0)
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>
                <tbody class="main_table_bdy" id="{{ $rand_id }}">

                </tbody>
            </table>
        </div>
    @endif


    {{--<div class="col-md-4">--}}
    {{--<div class="form-group">--}}

    <div class="">
        Show
        <select onchange="setBootPages(this.value)">
            <option {{ $per_page == 10 ? 'selected':'' }} value="10">10</option>
            <option {{ $per_page == 25 ? 'selected':'' }} value="25">25</option>
            <option {{ $per_page == 50 ? 'selected':'' }} value="50">50</option>
            <option {{ $per_page == 100 ? 'selected':'' }} value="100">100</option>
            <option {{ $per_page == 200 ? 'selected':'' }} value="200">200</option>
        </select>

    </div>
    <div class="aj-pagination">

    </div>
    {{--</div>--}}
    {{--</div>--}}
</div>

<script type="text/javascript">
    //        function ajShowPagination(current,total){
    //            if(total)
    //        }
    // jQuery(document).on('click','.aj-pagination > ul > li > a',function(){
    //     console.log("clocked");
    //     var url = $(this).attr('href');
    //     return loadAjaxTableData(url);
    // });

    determinFilterInputType();
    var data_url = '{{ url($data_url) }}';
    var history_url = '{{ session()->get('cur_table_url') }}';
    if(history_url){
        history_url = '{{ html_entity_decode(session()->get('cur_table_url')) }}';
        history_url = decodeHTMLEntities(history_url);
        $("input[name='filter_value']").val('{{ session()->get('cur_search_value') }}');
        loadAjaxTableData(history_url);
    }else{
        console.log('starting');
        startBootstrapSearch();
    }


    function decodeHTMLEntities (text) {
        var entities = {
            'amp': '&',
            'apos': '\'',
            '#x27': '\'',
            '#x2F': '/',
            '#39': '\'',
            '#47': '/',
            'lt': '<',
            'gt': '>',
            'nbsp': ' ',
            'quot': '"'
        }
        return text.replace(/&([^;]+);/gm, function (match, entity) {
            return entities[entity] || match
        })
    }
    var columns = <?php echo json_encode($ajax_headers) ?>;
    function loadAjaxTableData(data_url){
        jQuery(".main_table_bdy").html('<img style="margin-top:2%;margin-left:50%;position:absolute;" src="{{ url('img/ajax-loader.gif') }}">');
        $("input[name='cur_table_url']").val(data_url);
        $("input[name='cur_search_value']").val($("input[name='filter_value']").val());
        $.get(data_url,null,function(response){
            @if($is_mobile)
            setMobileContent(response);
            @else
            setDesktopContent(response);
            @endif
        });
        @if(isset($on_load))
        @foreach($on_load as $load)
        setTimeout(function(){
            {{ $load.'();' }}
        },1500)

        @endforeach
        @endif
            return false;
    }
    function getUrlParams (url) {
        // http://stackoverflow.com/a/23946023/2407309
        if (typeof url == 'undefined') {
            url = window.location.search
        }
        var url = url.split('#')[0] // Discard fragment identifier.
        var urlParams = {}
        var queryString = url.split('?')[1]
        if (!queryString) {
            if (url.search('=') !== false) {
                queryString = url
            }
        }
        if (queryString) {
            var keyValuePairs = queryString.split('&')
            for (var i = 0; i < keyValuePairs.length; i++) {
                var keyValuePair = keyValuePairs[i].split('=')
                var paramName = keyValuePair[0]
                var paramValue = keyValuePair[1] || ''
                urlParams[paramName] = decodeURIComponent(paramValue.replace(/\+/g, ' '))
            }
        }
        return urlParams
    }
    function setDesktopContent(response){
        jQuery(".main_table_bdy").html('');

        var records = response.data;
        if(records.length == 0){
            jQuery(".main_table_bdy").html('<tr><td align="center" colspan="{{ count($ajax_headers) }}"><p class="alert alert-info">{{ isset($no_data_message) ? $no_data_message:'No results found' }}</p></td></tr>');
        }
        for(var i =0;i<records.length;i++){
            var record = records[i];
            var str = '<tr>';
            @if(isset($multi_actions))
                str = str+'<td><input class="select_val_{{ $random_select_id }}" name="selected_values_{{ $random_select_id }}[]" value="'+record.id+'" type="checkbox"> </td>';
                @endif
            for(var l =0;l<columns.length;l++){
                var cell = record[columns[l]];
                str = str+'<td>'+cell+'</td>';
            }
            str = str+'</str>';
            jQuery(".main_table_bdy").append(str);
        }
        jQuery(".aj-pagination").html(response.pagination);
    }

    function setMobileContent(response){
        jQuery(".main_table_bdy").html('');
        var records = response.data;
        if(records.length == 0){
            jQuery(".main_table_bdy").html('<p class="alert alert-info">{{ isset($no_data_message) ? $no_data_message:'No results found' }}<p>');
        }
        console.log(records);
        for(var i =0;i<records.length;i++){
            var record = records[i];
            var str = '<table class="table titlecolumn">';
            for(var l =0;l<columns.length;l++){
                var title = columns[l];
                title = title.replace('_',' ',title);
                var cell = record[columns[l]];
                str = str + '<tr>';
                str = str + '<th>'+title.toUpperCase()+'</th>';
                str = str+'<td>'+cell+'</td>';
                str = str + '</tr>';
            }
            str = str+'</table>';
            jQuery(".main_table_bdy").append(str);
        }
        jQuery(".aj-pagination").html(response.pagination);
    }
    function startBootstrapSearch(){
        var url = jQuery(".search-form").attr('action');
        var data = jQuery('.search-form').serialize();
        var full_url = url+"?"+data;
        loadAjaxTableData(full_url);
        return false;
    }

    function determinFilterInputType(){
        var key = jQuery("select[name='filter_key']").val();
        var value = jQuery(".filter-value").val();
        var status_fields = <?php echo @json_encode($status_fields)  ?>;
        for (field in status_fields){
            if(field == key){
                jQuery(".filter_value_section").html('<select name="filter_value" class="form-control filter-value"></select>');
                var options = status_fields[field];
                for(key in options){
                    if(value == key){
                        jQuery(".filter-value").append('<option selected value="'+key+'">'+options[key]+'</option>');

                    }else{
                        jQuery(".filter-value").append('<option value="'+key+'">'+options[key]+'</option>');
                    }
                }
                return false;
            }
        }
        jQuery(".filter_value_section").html('<input value="'+value+'" type="text" class="form-control filter-value input-sm" name="filter_value">');
        return false;
    }

    function setOrderBy(key){
        jQuery(".order_cols").removeClass('fa-sort-amount-up');
        jQuery(".order_cols").removeClass('fa-sort-amount-down');
        jQuery("input[name='order_by']").val(key);
        var order_method = jQuery("input[name='order_method']").val();
        if(order_method == 'desc'){
            jQuery("input[name='order_method']").val('asc');
            jQuery(".th_"+key).addClass('fa fa-sort-amount-up');
        }else{
            jQuery("input[name='order_method']").val('desc');
            jQuery(".th_"+key).addClass('fa fa-sort-amount-down');
        }
        return startBootstrapSearch();
    }

    function setBootPages(page){
        jQuery("input[name='per_page']").val(page);
        return startBootstrapSearch();
    }

    function toggleSelectInTable(){
        var checked = jQuery("input[name='select_{{ $random_select_id }}']").is(":checked");
        jQuery(".select_val_{{ $random_select_id }}").prop('checked',checked);
    }
</script>
