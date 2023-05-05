<?php
include 'includes/header.php';
include 'dbcon.php';
?>


  <div class="d-flex" id="wrapper">

    <?php include 'includes/sidebar.php' ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Admin Dashboard</h2>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="card ">
                <div class="card-header">
                  <center><h1>News Management</h1></center>
                </div>
                  <div class="card-body">

        <!-- button for creating news start-->
        <button type="button" class="btn btn-primary float-start m-2" data-bs-toggle="modal" data-bs-target="#createnewsbtn">Create News</button>
        <!-- button for creating news end-->
        <!-- Table News List Start -->
        <table id="newstable" class="table table-bordered table-hover cell-border">
          <thead>
            <tr>
              <th hidden scope="col">#</th>
              <th scope="col">Author</th>
              <th scope="col">Title</th>
              <th hidden scope="col">Content</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Create News Query PHP -->
            <?php
            $query = "SELECT * FROM uccp_news_tbl ORDER BY id DESC";
            $query_run = mysqli_query($con, $query);
            $output = "hello";
            if (mysqli_num_rows($query_run)>0) {
              while($news = mysqli_fetch_array($query_run)) {
                ?>
                <tr>
                  <td hidden><?= $news['id']; ?></td>
                  <td><?= $news['author']; ?></td>
                  <td><?= $news['title']; ?></td>
                  <td hidden><?= $news['body']; ?></td>
                  <td><img class="image" height="200" width="200" src="imgnews/<?= $news['imgdir']?>" alt=""></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <!-- View News -->
                      <button data-id="<?= $news['id']; ?>" type="button" class="btn btn-info btnviewing" data-bs-toggle="modal" data-bs-target="#viewnews" name="btnviewing"><i class="fa-solid fa-eye"></i></button>
                      <!-- Edit or Update News -->
                      <button href="#" data-role="update" id="<?= $news['id']; ?>" type="button" class="edit_data btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo "#editnewsData" . $news['id']; ?>" name="btnedit"><i class="fa-solid fa-pen-to-square"></i></button>
                      <!-- Modal -->
                      <div class="modal fade" id="<?php echo "editnewsData" . $news['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit News</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="editnews_data.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="editnewsid" value="<?= $news['id'] ?>" hidden>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Edit News Author</label>
                                  <input type="text" class="form-control" name="editnewsauthor" value="<?= $news['author'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Edit News Title</label>
                                  <input type="text" class="form-control" name="editnewstitle" value="<?= $news['title'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="message-text" class="col-form-label">Edit News Content</label>
                                  <textarea class="form-control" name="editnewscontent"><?= $news['body'] ?></textarea>
                                </div>
                                <div class="form-group m-4">
                                  <label for="message-text" class="col-form-label">Edit News Image</label>
                                  <input type="file" accept=".jpg, .png, .gif" name="editnewsimage" class="btn btn-light m-3"></input>
                                  <img src="<?= 'imgnews/' . $news['imgdir'] ?>" class="img-thumbnail" alt="">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="btneditnews" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- Removing Button -->
                      <button type="button" class="btn btn-danger newsremovedata" id="<?= $news['id'] ?>" name="btnremovenews"><i class="fa-solid fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
                <?php
              }
            } else {
              
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
  
        <!-- Modal for Creating News Start -->
      <div class="modal fade" id="createnewsbtn" tabindex="-1" role="dialog" aria-labelledby="newscreate" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <?php include('alertmessage.php'); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addnewstitle">Add News</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="create-modal-body m-3">
              <form id="newsform" action="add_news.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">News Title</label>
                  <input type="text" class="form-control" name="newstitle">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Author</label>
                  <input type="text" class="form-control" name="newsauthor">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">News Content</label>
                  <textarea class="form-control" name="newscontent"></textarea>
                </div>
                <div class="form-group m-4">
                  <label for="message-text" class="col-form-label">Add News Image</label>
                  <input type="file" accept=".jpg, .png, .gif" name="imgreceiver" class="btn btn-light m-3"></input>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnpostnews">Post News</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal for Creating News End -->

      <!-- Modal for Viewing News Start -->
      <div class="modal fade" id="viewnews"  tabindex="-1" role="dialog" aria-labelledby="viewnews" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <?php include('alertmessage.php'); ?>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addnewstitle">Viewing News</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="view-modal-body m-3">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Viewing News End -->

  <!-- Table News List End -->
  <?php include 'includes/footer.php' ?>
    <script type="text/javascript">
  $(document).ready(function () {
    $('#newstable').DataTable();
  });
  </script>
