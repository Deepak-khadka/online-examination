<div>
    <div class="row py-3" style="background: #fafafa;">
        <div class="col-sm-12">
            <form method="post" action="subjects.php">
                <div class="card border border-danger">
                    <div class="card-header alert-danger">
                        <h5><i class="fa fa-book"></i> Add New Subject</h5>
                    </div>
                    <div class="card-body  " >
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Course :</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="course" required="">
                                    <option value="">Select Course</option>
                                    {{-- <?php if(!empty($result)){ ?>
                                     <?php while($row = mysqli_fetch_array($result)){ ?>
                                     <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                     <?php } ?>
                                     <?php } ?>--}}
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Subject Name :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="" name="name" placeholder="Subject Name" required="" autocomplete="off">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary mt-auto" type="submit" name="submit">Add Subject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="row pb-5" style="background: #fafafa;">
        <div class="col-sm-12">
            <div class="card border border-danger">
                <div class="card-header alert-danger">
                    <h5><i class="fa fa-book"></i> Subject Lists</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped">
                        <thead>
                        <th>Course Name</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        {{-- <?php if(!empty($fetchsubject)){ ?>
                         <?php while($row = mysqli_fetch_array($fetchsubject)){ ?>
                         <?php
                         $course_id = $row['course_id'];
                         $fetchcourse = mysqli_query($conn, "SELECT name FROM course WHERE id = '$course_id'");
                         $coursename = mysqli_fetch_array($fetchcourse);
                         ?>--}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                            </td>
                        </tr>
                        {{--   <?php } ?>
                           <?php } ?>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
