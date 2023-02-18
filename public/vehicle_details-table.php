<section class="content-header">
    <h1>Vehicle Details /<small><a href="home.php"><i class="fa fa-home"></i> Home</a></small></h1>

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
                    <table id='users_table' class="table table-hover" data-toggle="table" data-url="api-firebase/get-bootstrap-table-data.php?table=vehicle_details" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc" data-show-export="true" data-export-types='["txt","csv"]' data-export-options='{
                        "fileName": "vehicleslist-<?= date('d-m-Y') ?>",
                        "ignoreColumn": ["operate"] 
                    }'>
                        <thead>
                            <tr>
                                
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="registration_number" data-sortable="true">Vehicle Number</th>
                                <th data-field="rc_status" data-sortable="true">RC Status</th>
                                <th data-field="chassis_number" data-sortable="true">Chassis Number</th>
                                <th data-field="engine_number" data-sortable="true">Engine Number</th>
                                <th data-field="owner_name" data-sortable="true">Owner Name</th>
                                <th data-field="father_name" data-sortable="true">Father Name</th>
                                <th data-field="registration_date" data-sortable="true">Registration Date</th>
                                <th data-field="fuel_type" data-sortable="true">Fuel Type</th>
                                <th data-field="norms_type" data-sortable="true">Norms Type</th>
                                <th data-field="vehicle_category" data-sortable="true">Vehicle Category</th>
                                <th data-field="vehicle_class" data-sortable="true">Vehicle Class</th>
                                <th data-field="number_of_cylinder" data-sortable="true">Number of cylinder</th>
                                <th data-field="owner_serial_number" data-sortable="true">Owner Serial Number</th>
                                <th data-field="standing_capacity" data-sortable="true">Standing Capacity</th>
                                <th data-field="sleeper_capacity" data-sortable="true">Sleeper Capacity</th>
                                <th data-field="body_type" data-sortable="true">Body Type</th>
                                <th data-field="owner_mobile_no" data-sortable="true">Owner Mobile Number</th>
                                <th data-field="ownership" data-sortable="true">Ownership</th>
                                <th data-field="colour" data-sortable="true">Colour</th>
                                <th data-field="manufacturer" data-sortable="true">Manufacturer</th>
                                <th data-field="manufacturer_model" data-sortable="true">Manufacturer Model</th>
                                <th data-field="seating_capacity" data-sortable="true">Seating Capacity</th>
                                <th data-field="insurance_policy_no" data-sortable="true">Insurance Policy No.</th>
                                <th data-field="insurance_company_name" data-sortable="true">Insurance Company Name</th>
                                <th data-field="insurance_validity" data-sortable="true">Insurance Validity</th>
                                <th data-field="financer" data-sortable="true">Financer</th>
                                <th data-field="puc_number" data-sortable="true">PUC Number</th>
                                <th data-field="puc_valid_upto" data-sortable="true">PUC Valid Upto</th>
                                <th data-field="current_address" data-sortable="true">Current Address</th>
                                <th data-field="permanent_address" data-sortable="true">Permananent Address</th>
                                <th data-field="rc_registration_location" data-sortable="true">RC Registration Location</th>
                                <th data-field="manufacturingYear" data-sortable="true">Manufact.Year</th>
                                <th data-field="unladden_weight" data-sortable="true">Unladden Weight</th>
                                <th data-field="wheelbase" data-sortable="true">Wheelbase</th>
                                <th data-field="gross_vehicle_weight" data-sortable="true">Gross Vehicle Weight</th>
                                <th data-field="blacklist_status" data-sortable="true">Blacklist Status</th>
                                <th data-field="fitness_upto" data-sortable="true">Fitness Upto</th>
                                <th data-field="mv_tax_upto" data-sortable="true">MV Tax Upto</th>
                                <th data-field="permit_type" data-sortable="true">Permit Type</th>
                                <th data-field="permit_no" data-sortable="true">Permit Number</th>
                                <th data-field="permit_validity_upto" data-sortable="true">Permit Validity Upto</th>
                                <th data-field="npermit_no" data-sortable="true">NPermit Number</th>
                                <th data-field="npermit_upto" data-sortable="true">NPermit Upto</th>
                                <th data-field="npermit_issued_by" data-sortable="true">NPermit Issued By</th>
                                <th data-field="noc_valid_upto" data-sortable="true">NOC Valid Upto</th>
                                <th data-field="noc_details" data-sortable="true">NOC Details</th>
                                <th data-field="noc_status" data-sortable="true">NOC Status</th>
                                <th data-field="noc_issue_date" data-sortable="true">NOC Issue Date</th>

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

