<section class="content-header">
    <h1>Users /<small><a href="home.php"><i class="fa fa-home"></i> Home</a></small></h1>

</section>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=users" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="true" data-export-types='["txt","csv"]' data-export-options='{
                        "fileName": "sfis_userlist-<?= date('d-m-Y') ?>",
                        "ignoreColumn": ["operate"] 
                    }'>
                        <thead>
                            <tr>
                                
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="first_name" data-sortable="true">Name</th>
                                <th data-field="mobile" data-sortable="true">Mobile Number</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="city" data-sortable="true">City</th>
                                <th data-field="pincode" data-sortable="true">Pincode</th>
                                <th data-field="state" data-sortable="true">State</th>
                                <th data-field="referred_by" data-sortable="true">Referred By</th>
                                <th data-field="joined_date" data-sortable="true">Joined Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="separator">
        </div>
    </div>
    <!-- /.row (main row) -->
</section>


<script>
    $('#seller_id').on('change', function() {
        $('#products_table').bootstrapTable('refresh');
    });
    $('#community').on('change', function() {
        $('#users_table').bootstrapTable('refresh');
    });

    function queryParams(p) {
        return {
            "seller_id": $('#seller_id').val(),
            "community": $('#community').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>

