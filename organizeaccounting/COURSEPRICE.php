<?php
include 'include/header.php';
include 'include/config.php';
?>

<?php include 'include/sidebar.php'; ?>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Dashboard</h2>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center>
                                <h1>Course Pricing</h1>
                            </center>
                        </div>
                        <div class="card-body">
                            <table id="tblCoursePrice" class="table table-condensed table-bordered cell-border table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Sub Code</th>
                                        <th scope="col">Subject Price</th>
                                        <th scope="col">Subject Detail/s</th>
                                        <th scope="col">School Year</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Course Fee  Modal Start-->
    <div class="modal fade" id="updatecourseprice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="" action="#" method="post" id="updatepriceform">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Course and Fee</h5>
                    </div>
                    <div class="modal-body" id="courseprice_update">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="updatecpricebtn" name="btnupdate" class="btn btn-primary pull-right">Update</Button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal Course Fee  End -->

<?php include 'include/footer.php'; ?>

<script>
    $(document).ready(function() {

        $('#tblCoursePrice').DataTable({
            'serverside': true,
            'processing': true,
            'paging': true,
            "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                },

            ],

            'ajax': {

                'url': 'table-courseprice.php',
                'type': 'post',

            },
            'fnCreateRow': function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
        });
        // Closing Tag Document Function Ready Below this Comment
    });

    //update view
    $(document).on('click', '.updateCourseprice', function() {
        var update_id = $(this).attr('id');
        $.ajax({
            url: "updatecoursepricedetails.php",
            type: "post",
            data: {
                update_id: update_id
            },
            success: function(data) {
                $("#courseprice_update").html(data);
                $("#updatecourseprice").modal('show');
            }
        });
        //update button
        $(document).on('click', '#updatecpricebtn', function() {
            $.ajax({
                url: "updatecourseprice.php",
                type: "post",
                data: $("#updatepriceform").serialize(),
                success: function(data) {
                    $("#updatecourseprice").modal("hide");
                    //location.reload();
                    var a = $('#tblCoursePrice').DataTable().ajax.reload();
                    var b = $('#coursefeelist').DataTable().ajax.reload();
                }
            });
        });
    });
</script>